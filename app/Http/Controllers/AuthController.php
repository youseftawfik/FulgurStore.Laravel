<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator,Response,Crypt;;
use Session;
use DB;

class AuthController extends Controller
{
    public function register(Request $req){
        try {
            
            $data = array();
            $data['user_name'] = $req->name;
            $data['email'] = $req->email;
            $data['password'] = Crypt::encrypt($req->password);
    
            DB::table('users')->insert($data);
            Session::put('message','You have registered Successfully');
            return redirect::to('/dashboard');
            
        } catch (\Exception $e) {
            Session::put('error', $e->getMessage());
            return redirect::to('/registration');
        }
    }

    public function login(Request $req){
        // try {
        //     $user = DB::table('users')->where('email',$req->email)->get();
        //     if (Crypt::decrypt($user[0]->password)==$req->password) {
                Session::put('message1', 'Hi, Welcome Back !');
                return redirect::to('/dashboard');
        //     }
        // } catch (\Exception $e) {
        //     Session::put('error', $e->getMessage());
        //     return redirect::to('/login');
        // }
    }
}
