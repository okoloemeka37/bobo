<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\User;
use Illuminate\Http\Request;

class comments_userControl extends Controller
{
    public function user_activity(User $user)
    {
    $comments=comment::where('user_id','=',$user->id)->get();    
    return view('user_act',['act'=>$user,'comment'=>$comments]); 
    }
}
