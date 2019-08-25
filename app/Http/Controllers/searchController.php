<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Brand;
use App\Generic;
use App\Manufacturer;
use App\Peopls;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class searchController extends Controller
{
    public function user(Request $r){
        $user = $r->user;
        if($user){
            $user_detail = Peopls::where('user_name', $user)->first();
            if(!$user_detail){
                Session::put('message','user not found!!');
                Return Redirect::to('/list-medicine') ;
            }
            $user_id = $user_detail->user_id;           
            if($user_id){
                $shows = Brand::where('user_id', $user_id)->orderBy('brand_name')->get();
                $count = Brand::where('user_id', $user_id)->count();
                return view('medicine.list', ['shows'=>$shows, 'count'=>$count]);
            }  
        }
        Session::put('messege','user not found!!');
        Return Redirect::to('/list-medicine') ;

    }
    
    public function manufacturer(Request $r){
        $man = $r->manufacturer;
        if($man){
            $man_detail = Manufacturer::where('man_name', $man)->first();
            if(!$man_detail){
                Session::put('message','Manufactuer not found!!');
                Return Redirect::to('/list-medicine') ;
            }
            $man_id = $man_detail->man_id;           
            if($man_id){
                $shows = Brand::where('man_id', $man_id)->orderBy('brand_name')->get();
                $count = Brand::where('man_id', $man_id)->count();
                return view('medicine.list', ['shows'=>$shows, 'count'=>$count]);
            }  
        }
        Session::put('messege','Brand not found!!');
        Return Redirect::to('/list-medicine') ;

    }
    public function generic(Request $r){
        $generic = $r->generic;
        if($generic){
            $generic_detail = Generic::where('generic_name', $generic)->first();
            if(!$generic_detail){
                Session::put('message','Generic not found!!');
                Return Redirect::to('/list-medicine') ;
            }
            $generic_id = $generic_detail->generic_id;           
            if($generic_id){
                $shows = Brand::where('generic_id', $generic_id)->orderBy('brand_name')->get();
                $count = Brand::where('generic_id', $generic_id)->count();
                return view('medicine.list', ['shows'=>$shows, 'count'=>$count]);
            } 
        }
        Session::put('messege','Brand not found!!');
        Return Redirect::to('/list-medicine') ;

    }
}
