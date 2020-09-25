<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Storage;
use Session;
use DB;

class SubcategoryController extends Controller
{
    public function Subcategory(){
        $all_subcategories = DB::table('sub_category')->get();
        $manage_sub = view('admin.all_subcategory')->with('all_subcategories', $all_subcategories);
        return view('layout.appadmin')->with('admin.all_subcategory', $manage_sub);
    }

    public function save_subcategory(Request $req){
        try {
            if ($req->category_name == 'Select Category') {
                Session::put('message1','Please Select Category');
                return redirect::to('/add-subcategory');
            } else {
                $this->validate($req,['subcategory_image' => 'image|nullable|max:1999']);
                if ($req->hasfile('subcategory_image')) {
                    $FileNameWithExt = $req->file('subcategory_image')->getClientOriginalName();
                    $filename = pathinfo($FileNameWithExt,PATHINFO_FILENAME);
                    $extension = $req->file('subcategory_image')->getClientOriginalExtension();
                    $FileNameToStore = $filename.'_'.time().'.'.$extension;
                    $path = $req->file('subcategory_image')->storeAs('public/images',$FileNameToStore);
                } else {
                    $FileNameToStore = 'noimage.jpg';
                }
                $data = array();
                $data['subcategory_name'] = $req->subcategory_name;
                $data['subcategory_image'] = $FileNameToStore;
                $data['category_name'] = $req->category_name;
                $data['status'] = $req->status;
                
                DB::table('sub_category')->insert($data);
                Session::put('message','Success');
                return redirect::to('/add-subcategory');
            }
        } catch (\Exception $e) {
            Session::put('error', $e->getMessage());
            return redirect::to('/add-subcategory');
        }
        
    }

    public function unactivate_subcategory($id){
        $data = array();
        $data['status'] = 0;
        DB::table('sub_category')->where('id',$id)->update($data);
        Session::put('message','Subcategory has been Unactivated');
        return redirect::to('/Subcategory');
    }

    public function activate_subcategory($id){
        $data = array();
        $data['status'] = 1;
        DB::table('sub_category')->where('id',$id)->update($data);
        Session::put('message1','Subcategory has been Activated');
        return redirect::to('/Subcategory');
    }

    public function delete_subcategory($id){
        $select_image_name = DB::table('sub_category')->where('id',$id)->first();
            if ($select_image_name->subcategory_image != 'noimage.jpg') {
                Storage::delete('public/images/'.$select_image_name->subcategory_image);
            }
        DB::table('sub_category')->where('id',$id)->delete();
        Session::put('message2','Subcategory has been Deleted');
        return redirect::to('/Subcategory');
    }

    public function edit_subcategory($id){
        $all_subcategory = DB::table('sub_category')->where('id',$id)->first();
        $manage_subcate = view('admin.edit_subcategory')->with('all_subcategory', $all_subcategory);
        return view('layout.appadmin')->with('admin.edit_subcategory', $manage_subcate);
    }
 
    public function update_subcategory(Request $req){
        try {
            $data = array();
            $data['subcategory_name'] = $req->subcategory_name;
            $data['category_name'] = $req->cat_name;
            $data['status'] = $req->status;

            $this->validate($req,['subcategory_image'=>'image|nullable|max:1999']);
            if ($req->hasfile('subcategory_image')) {
                $FileNameWithExt = $req->file('subcategory_image')->getClientOriginalName();
                $filename = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
                $extention = $req->file('subcategory_image')->getClientOriginalExtension();
                $FileNameToStore = $FileNameWithExt.'_'.time().'.'.$extention;
                $path = $req->file('subcategory_image')->storeAs('public/images',$FileNameToStore);
            }else {
                $FileNameToStore = 'noimage.jpg';
            }

            if ($req->hasfile('subcategory_image')) {
                $select_image_name = DB::table('sub_category')->where('id',$req->id)->first();
                $data['subcategory_image'] = $FileNameToStore;
                if ($select_image_name->subcategory_image != 'noimage.jpg') {
                    Storage::delete('public/images/'.$select_image_name->subcategory_image);
                }
            }

            $subcategories = DB::table('sub_category')->where('id',$req->id)->update($data);
            Session::put('message3','The Subcategory is Updated Successfully');
            return redirect::to('/Subcategory');

        } catch (\Exception $e) {
        Session::put('error', $e->getMessage());
        return redirect::to('/edit_subcategory/{id}');    
        }    
        
    } 

}
