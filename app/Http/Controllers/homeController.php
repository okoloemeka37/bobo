<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function home_index()
    {
        $posts=post::orderBy('id','desc')->limit('5')->get();
        return view('index',['posts'=>$posts]);
    }
}
