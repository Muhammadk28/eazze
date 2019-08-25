<?php

namespace App\Http\Controllers;
use App\Generic;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class genericController extends Controller
{
// create page show--------------------------------------------------------
    public function index(){
        $this->authcheck();
        return view('generic.add');
    }
// create ---------------------------------------------------------------
    public function insert(Request $r){
        $this->validate($r,[
            'generic_name' => 'required|unique:generics|min:3',
        ]);
        $data = Generic::create([
            'generic_name' => $r->generic_name
        ]);
        Session::put('messege', 'Generic name  added successfully!!');
        return Redirect::to('/add-generic-name');
    }
// read-----------------------------------------------------------------
    public function show(){
        $this->authcheck();
        $shows = Generic::all();
        return view('generic.list', ['shows'=> $shows]);
    }
// edit page show-----------------------------------------------------------
    public function edit($generic_id){
        $this->authcheck();
        
        $show = Generic::where('generic_id',$generic_id)->first();
        return view('generic.edit', compact('show'));
    }
// update---------------------------------------------------------------------
    public function update(Request $r,$generic_id){
        Generic::where('generic_id',$generic_id)->update([
            'generic_name'=>$r->generic_name,
        ]);

        Session::put('messege','Generic updated successfully!!');
        return Redirect::to('/list-generic-name');
    }
// delete--------------------------------------------------------------------
    public function delete($generic_id){
        $this->authcheck();
        Generic::where('generic_id',$generic_id)->delete();
        Session::put('messege', 'Generic deleted successfully!!!');
        return Redirect::to('/list-generic-name');
    }
// authentication cheack-------------------------------------------------------
    public function authcheck(){
        $session = Session::get('user_id');
        if($session){
            return;
        }else{
            return Redirect::to('/login')->send();
        }
    }
}
