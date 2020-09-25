<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('client.home');
    }

    public function clothes(){
        return view('client.products');
    }
}
