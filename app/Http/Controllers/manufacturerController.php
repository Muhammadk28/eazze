<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Manufacturer;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class manufacturerController extends Controller
{
    public function index(){
        $this->authcheck();
        return view('manufacture.add');
    }
// insert-----------------------------------------------------------------
    public function insert(Request $r){

        $name = $r->man_name;
        $this->validate($r,[
           'man_name' => 'required|unique:manufacturers|min:3'
        ]);
        $data = Manufacturer::create([
            'man_name' => $name,
        ]); 
        Session::put('messege', 'Manufacturer name  added successfully!!');
        return Redirect::to('/add-manufacturer-name');
    }
// read--------------------------------------------------------------------
    public function show(){
        $this->authcheck();
        $shows = Manufacturer::all();
        return view('manufacture.list', ['shows'=> $shows]);
    }
// edit page show-----------------------------------------------------------
    public function edit($man_id){
        $this->authcheck();
        
        $show = Manufacturer::where('man_id',$man_id)->first();
        return view('manufacture.edit', compact('show'));
    }
// update---------------------------------------------------------------------
    public function update(Request $r,$man_id){
        Manufacturer::where('man_id',$man_id)->update([
            'man_name'=>$r->man_name,
        ]);

        Session::put('messege','Manufacturer updated successfully!!');
        return Redirect::to('/list-manufacture');
    }
// delete--------------------------------------------------------------------
    public function delete($man_id){
        $this->authcheck();
        Manufacturer::where('man_id',$man_id)->delete();
        Session::put('messege', 'Manufacturer deleted successfully!!!');
        return Redirect::to('/list-manufacture');
    }






    public function authcheck(){
        $session = Session::get('user_id');
        if($session){
            return;
        }else{
            return Redirect::to('/login')->send();
        }
    }
}
