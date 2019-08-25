<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Peopls;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class userController extends Controller
{
// page show----------------------------------------------
    public function index(){
        return view('user.add');
    }
// insert-----------------------------------------------------
    public function insert(Request $r){

        $name = $r->user_name;
        $email = $r->user_email;
        $phone = $r->user_phone;
        $password = $r->user_password;

        $this->validate($r,[
           'user_name' => 'required|min:3',
           'user_email' => 'required|unique:peopls',
           'user_phone' => 'required|unique:peopls|min:11|regex:/(01)[0-9]{9}/',
           'user_password' => 'required|min:8'           
        ]);
        $data = Peopls::create([
            'user_name' => $name,
            'user_email' => $email,
            'user_password' => $password,
            'user_type' => "user",
            'user_phone' => $phone,

        ]);      
        Session::put('messege', 'User  added successfully!!');
        return Redirect::to('/add-user');
    }
// read-------------------------------------------------------------------
    public function show(){
        $shows = Peopls::all();
        return view('user.list', ['shows'=>$shows]);
    }
    // edit  details------------------------------------------------

    public function edit($user_id){
        
        $show = Peopls::where('user_id',$user_id)->first();
        return view('user.edit', compact('show'));
    }
// update  details---------------------------------------------------
    public function update(Request $r,$user_id){
        $name = $r->user_name;
        $email = $r->user_email;
        $phone = $r->user_phone;
        $password = $r->user_password;
        Peopls::where('user_id',$user_id)->update([
            'user_name' => $name,
            'user_email' => $email,
            'user_password' => $password,
            'user_phone' => $phone,
        ]);

        Session::put('messege','User updated successfully!!');
        return Redirect::to('/list-user');
    }
 
    //delete brand info------------------------------

    public function delete($user_id){
      
        Peopls::where('user_id',$user_id)->delete();
        Session::put('messege', 'User deleted successfully!!!');
        return Redirect::to('/list-user');
    }
}
