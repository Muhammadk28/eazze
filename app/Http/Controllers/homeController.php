<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Peopls;
use App\Generic;
use App\Manufacturer;
use App\Brand;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class homeController extends Controller
{
    public function index(){
        $this->authcheck();
        $generics = Generic::all();
        $mans = Manufacturer::all();
        return view('index', compact('generics','mans'));
    }

   

    public function login(){
        return view('login');
    }
    public function fack(){
        $generics = Generic::all();
        $mans = Manufacturer::all();
        return view('fack', compact('generics','mans'));
    }

    public function dashboard(Request $r){
        $email = $r->user_email;
        $password = $r->user_password;
        $result = Peopls::where('user_email', $email)
                    ->where('user_password', $password)
                    ->first();
        if($result){

            Session::put('user_name', $result->user_name);
            Session::put('user_id', $result->user_id);
            Session::put('user_type', $result->user_type);
            return Redirect::to('/');
            
        }else{
            Session::put('messege', 'email or password invalid');
            return Redirect::to('/login');

        }
    }

    public function logout(){
        Session::flush();
        return Redirect::to('/login');
    }



    public function authcheck(){
        $session = Session::get('user_id');
        if($session){
            return;
        }else{
            return Redirect::to('/login')->send();
        }
    }

    public function adminCheck(){
        $type = Session::get('user_type');
        if($type == "admin"){
            return;
        }else{
            return Redirect::to('/erorr404');
        }
    }
}
