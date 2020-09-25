<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Storage;
use Session;
use DB;

class CategoryController extends Controller
{
    public function categories(){
        return view('admin.all_categories'); 
    }
    
    public function save_category(Request $req){
        try {
            $this->validate($req,['category_image'=>'image|nullable|max:1999']);
            if ($req->hasfile('category_image')) {
                $FileNameWithExt = $req->file('category_image')->getClientOriginalName();
                $filename = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
                $extention = $req->file('category_image')->getClientOriginalExtension();
                $FileNameToStore = $FileNameWithExt.'_'.time().'.'.$extention;
                $path = $req->file('category_image')->storeAs('public/images',$FileNameToStore);
            }else {
                $FileNameToStore = 'noimage.jpg';
            }
            $data = array();
            $data['category_name'] = $req->category_name;
            $data['category_image'] = $FileNameToStore;
            $data['status'] = $req->status;

            DB::table('categories')->insert($data);
            Session::put('message','Success');
            return redirect::to('/add-category');

        } catch (\Exception $e) {
            Session::put('error',$e->getMessage());
            return redirect::to('/add-category');
        }
        
    }

    public function unactivate_category($id){
        $data = array();
        $data['status'] = 0;
        DB::table('categories')->where('id',$id)->update($data);
        Session::put('message','The Category Unactivated Successfully');
        return redirect::to('/categories');
    }

    public function activate_category($id){
        $data = array();
        $data['status'] = 1;
        DB::table('categories')->where('id',$id)->update($data);
        Session::put('message1','The Category Activated Successfully');
        return redirect::to('/categories');
    }

    public function delete_category($id){
        $select_image_name = DB::table('categories')->where('id',$id)->first();
            if ($select_image_name->category_image != 'noimage.jpg') {
                Storage::delete('public/images/'.$select_image_name->category_image);
            }
        DB::table('categories')->where('id',$id)->delete();
        Session::put('message2','The Category Deleted Successfully');
        return redirect::to('/categories');
    }

    public function edit_category($id){
        $categories = DB::table('categories')->where('id',$id)->first();
        $manage_cate = view('admin.edit_categories')->with('categories', $categories);
        return view('layout.appadmin')->with('admin.edit_categories', $manage_cate);
    }

    public function update_category(Request $req){
        $data = array();
        $data['category_name'] = $req->category_name;
        $data['status'] = $req->status;

        $this->validate($req,['category_image'=>'image|nullable|max:1999']);
        if ($req->hasfile('category_image')) {
            $FileNameWithExt = $req->file('category_image')->getClientOriginalName();
            $filename = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
            $extention = $req->file('category_image')->getClientOriginalExtension();
            $FileNameToStore = $FileNameWithExt.'_'.time().'.'.$extention;
            $path = $req->file('category_image')->storeAs('public/images',$FileNameToStore);
        }else {
            $FileNameToStore = 'noimage.jpg';
        }

        if ($req->hasfile('category_image')) {
            $select_image_name = DB::table('categories')->where('id',$req->id)->first();
            $data['category_image'] = $FileNameToStore;
            if ($select_image_name->category_image != 'noimage.jpg') {
                Storage::delete('public/images/'.$select_image_name->category_image);
            }
        }

        $categories = DB::table('categories')->where('id',$req->id)->update($data);
        Session::put('message3','The Category is Updated Successfully');
        return redirect::to('/categories');

    }

}
