<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\post;
use App\Models\user;
use Illuminate\Http\Request;

class dashController extends Controller
{
    public function admin()
    {
        $posts=post::with('comment')->orderBy('id','desc')->get();
        return view('admin.dashboard',['posts'=>$posts]);
    }

     public function post_page()
    {
        $posts=post::with('comment')->orderBy('id','desc')->get();
        return view('admin.post_page',['posts'=>$posts]);
    }

public function comments(post $post)
{
 $comments=$post->comment;
 return view('admin.post_comment',['comments'=>$comments,'post'=>$post]);
} 

public function remove_comment(comment $comment)
{
$comment->delete();
comment::where('parent_id','=',$comment->id)->delete();
  return redirect()->route('preview',$comment->post_id); 
}
}
