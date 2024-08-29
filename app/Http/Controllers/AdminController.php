<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session,Cache;

class AdminController extends Controller
{
    public function index(Request $request){
        return view("admin.pages.index");
    }

    public function signin(Request $request){

        if(session('ADMIN_LOGIN_NOW')){
            return redirect()->route('dashboard');
        }
        else{
            return view("admin.pages.auth.signin");
        }
        

        // return redirect()->route('profile');
    }


    public function media(Request $request){
        return view("admin.pages.media.view");
    }


    public function logout(Request $request)
    {
        Session::flush();
        Cache::flush();          
        return redirect('sign-in');  
    }  

}
