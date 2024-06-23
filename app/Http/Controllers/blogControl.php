<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class blogControl extends Controller
{
  public function index()
  {
$f_posts=post::orderBy('id','desc')->offset(17)->limit(3)->get();
$row_posts=post::orderBy('id','desc')->offset('6')->limit('16')->get();
$more_post=post::orderBy('id','desc')->offset('20')->limit(100)->paginate(20);
$latests=post::orderBy('id','desc')->limit('5')->get();
return view('blog',['f_posts'=>$f_posts,'row_posts'=>$row_posts,'more_posts'=>$more_post,'latest'=>$latests]);
  }

  public function life_search(Request $request)
  {
    if (strlen($request->input) === 0) {
   echo " ";
    }else{
$posts= post::where('title','Like',"%{$request->input}%")->get();
if (count($posts) != 0) {
 foreach ($posts as $post) {
echo "<p clas='h6 result'> <a class='text-dark' href= " .route('post_show',$post->id) .">". $post->title ."</a> </p>
<hr>
";
}
}else {
  echo "<p result>Search matches No Post </p>";
}
    }

  }
}
