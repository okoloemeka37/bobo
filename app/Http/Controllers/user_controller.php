<?php

namespace App\Http\Controllers;

use App\Models\commenter;
use App\Models\User;
use Illuminate\Http\Request;

class user_controller extends Controller
{
    public function index()
    {
 $users= User::where("is_admin","=",0)->orderBy("id",'desc')->get();  
        return view('admin.userView',['users'=>$users]);
    }
 public function remove($user)
 {
User::where('id','=',$user)->delete();
  return redirect()->route('user_index');
 }

}
