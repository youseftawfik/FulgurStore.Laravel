<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function registration(){
        return view('admin.registration');
    } 

    public function login(){
        return view('admin.login');
    } 
    
    public function admin(){
        return view('admin.dashboard');
    }

    public function addcategory(){
        return view('admin.add_category');
    }

    public function addsubcategory(){
        return view('admin.add_subcategory');
    }

    public function addproducttype(){
        return view('admin.add_producttype');
    }

}
