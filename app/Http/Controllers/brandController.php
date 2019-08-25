<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Brand;
use App\Generic;
use App\Manufacturer;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class brandController extends Controller
{
    public function insert(Request $r){
        $this->authcheck();
        $this->validate($r,[
            'brand_name' => 'required|unique:brands|min:1',
            'generic_id' => 'required',
            'man_id' => 'required',
            'price' => 'required',
            'user_id' => 'required',
        ]);

        for ($item = 0; $item < count($r->brand_name); $item++) {
            $answers[] = [
                'brand_name'=>$r->brand_name[$item],
                'generic_id'=>$r->generic_id[$item],
                'man_id'=>$r->man_id[$item],
                'price'=>$r->price[$item],
                'user_id' => $r->user_id[$item],
            ];
        }
        
        Brand::insert($answers); 
        Session::put('messege', 'Brand added successfully !!');
        return Redirect::to('/');
     
    }

    public function show(){
        $this->authcheck();
        $count = DB::table('brands')->count();
       // $shows = $shows =DB::table('brands')
       // ->join('generics','brands.generic_id','=','generics.generic_id')
        //->join('manufacturers','brands.man_id','=','manufacturers.man_id')
        //->join('peopls','brands.user_id','=','peopls.user_id')
        //->select('brands.*','generics.generic_name','manufacturers.man_name','peopls.user_name' )
        $shows= Brand::orderBy('brand_name')->get();
        
        return view('medicine.list', ['shows' => $shows, 'count' => $count]);
    }
// edit brand details------------------------------------------------

    public function edit($brand_id){
        $this->authcheck();
        $generics = Generic::all();
        $mans = Manufacturer::all();
        $show = Brand::where('brand_id',$brand_id)->first();
        return view('medicine.edit', compact('show', 'generics', 'mans'));
    }
// update brand details---------------------------------------------------
    public function update(Request $r,$brand_id){
        Brand::where('brand_id',$brand_id)->update([
            'brand_name'=>$r->brand_name,
                'generic_id'=>$r->generic_id,
                'man_id'=>$r->man_id,
                'price'=>$r->price,
        ]);

        Session::put('messege','Brand updated successfully!!');
        return Redirect::to('/list-medicine');
    }
 
    //delete brand info------------------------------

    public function delete($brand_id){
        $this->authcheck();
        Brand::where('brand_id',$brand_id)->delete();
        Session::put('messege', 'Brand deleted successfully!!!');
        return Redirect::to('/list-medicine');
    }

 // authentication check   
    public function authcheck(){
        $session = Session::get('user_id');
        if($session){
            return;
        }else{
            return Redirect::to('/login')->send();
        }
    }

   

}