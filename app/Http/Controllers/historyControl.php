<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class historyControl extends Controller
{
    //
    public function index()
    {
        $posts=post::onlyTrashed()->orderBy('id','desc')->get();
        $users=User::onlyTrashed()->orderBy('id','desc')->get();
        return view('admin.history',['posts'=>$posts,'users'=>$users]);
    }

    public function restore_post($post)
    {

//$now=post::onlyTrashed()->find($post);
 post::onlyTrashed()->where('id','=',$post)->update([
    'deleted_at'=>null
    
 ]);
 return redirect()->route('dashboard');
    }


    public function remove($post)
    {
      post::onlyTrashed()->find($post)->forceDelete();

 return redirect()->route('dashboard');
    }



    //restore user
     public function restore_user($user)
 {
    User::onlyTrashed()->where('id','=',$user)->update([
    'deleted_at'=>null
    
 ]);
 return redirect()->route('dashboard');
 }

public function del_user($user)
{
     User::onlyTrashed()->find($user)->forceDelete();

 return redirect()->route('user_index');
}}

