<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Storage;
use Session;
use DB;

class ProducttypeController extends Controller
{
    public function producttype(){
        $all_producttype = DB::table('product_type')->get();
        $manage_pro = view('admin.all_producttype')->with('all_producttype', $all_producttype);
        return view('layout.appadmin')->with('admin.all_producttype', $manage_pro);
    }

    public function save_producttype(Request $req){
        try {
            if ($req->subcategory_name == 'Select Subcategory') {
                Session::put('message1','Please Select Subcategory');
                return redirect::to('/add-producttype');
            } else {
                $this->validate($req,['producttype_image'=>'image|nullable|max:1999']);
                if ($req->hasfile('producttype_image')) {
                    $FileNameWithExt = $req->file('producttype_image')->getClientOriginalName();
                    $filename = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
                    $extension = $req->file('producttype_image')->getClientOriginalExtension();
                    $FileNameToStore = $filename.'_'.time().'.'.$extension;
                    $path = $req->file('producttype_image')->storeAs('public/images',$FileNameToStore);
                } else {
                    $FileNameToStore = 'noimage.jpg';
                }
                $data = array();
                $data['producttype_name'] = $req->producttype_name;
                $data['producttype_image'] = $FileNameToStore;
                $data['subcategory_name'] = $req->subcategory_name;
                $data['status'] = $req->status;
                
                DB::table('product_type')->insert($data);
                Session::put('message','Success');
                return redirect::to('/add-producttype'); 
            }
        } catch (\Exception $e) {
            Session::put('error',$e->getMessage());
            return redirect::to('/add-producttype');
        }
         
    }
    
    public function activate_producttype($id){
        $data = array();
        $data['status'] = 1;
        DB::table('product_type')->where('id',$id)->update($data);
        Session::put('message1','The Product Type has been Activated Successfully');
        return redirect::to('/producttypes'); 
    }

    public function unactivate_producttype($id){
        $data = array();
        $data['status'] = 0;
        DB::table('product_type')->where('id',$id)->update($data);
        Session::put('message2','The Product Type has been Unactivated Successfully');
        return redirect::to('/producttypes'); 
    }

    public function delete_producttype($id){
        $select_image_name = DB::table('product_type')->where('id',$id)->first();
           if ($select_image_name->producttype_image != 'noimage.jpg') {
                Storage::delete('public/images/'.$select_image_name->producttype_image);
            }
        DB::table('product_type')->where('id',$id)->delete();
        Session::put('message','The Product Type has been Deleted Successfully');
        return redirect::to('/producttypes'); 
    }

    public function edit_producttype($id){
        $all_producttype = DB::table('product_type')->where('id',$id)->first();
        $manage_pro = view('admin.edit_producttype')->with('all_producttype', $all_producttype);
        return view('layout.appadmin')->with('admin.edit_producttype', $manage_pro);
    }

    public function update_producttype(Request $req){
        try {
            $data = array();
            $data['producttype_name'] = $req->producttype_name;
            $data['subcategory_name'] = $req->subcategory_name;
            $data['status'] = $req->status;

            $this->validate($req,['producttype_image'=>'image|nullable|max:1999']);
            if ($req->hasfile('producttype_image')) {
                $FileNameWithExt = $req->file('producttype_image')->getClientOriginalName();
                $filename = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
                $extention = $req->file('producttype_image')->getClientOriginalExtension();
                $FileNameToStore = $FileNameWithExt.'_'.time().'.'.$extention;
                $path = $req->file('producttype_image')->storeAs('public/images',$FileNameToStore);
            }else {
                $FileNameToStore = 'noimage.jpg';
            }

            if ($req->hasfile('producttype_image')) {
                $select_image_name = DB::table('product_type')->where('id',$req->id)->first();
                $data['producttype_image'] = $FileNameToStore;
                if ($select_image_name->producttype_image != 'noimage.jpg') {
                    Storage::delete('public/images/'.$select_image_name->producttype_image);
                }
            }

            $subcategories = DB::table('product_type')->where('id',$req->id)->update($data);
            Session::put('message3','The Product Type is Updated Successfully');
            return redirect::to('/producttypes');

        } catch (\Exception $e) {
            Session::put('error', $e->getMessage());
            return redirect::to('/edit_producttype/{id}');
        }
    }
}
