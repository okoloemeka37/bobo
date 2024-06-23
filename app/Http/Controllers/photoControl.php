<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;

class photoControl extends Controller
{
    
  public function up_form(Request $request)
  {
  dd($request->image);
  
  }
  public function index()
  {
$image=gallery::orderBy('id','desc')->get();
  return view('admin.gallery',['images'=>$image]);
  }

public function delete(gallery $gallery)
{
  $gallery->delete();
return redirect()->back();
}

public function upload(Request $request)
{
$request->validate([
  'image'=>'required|array'
]);
$images=$request->image;
foreach ($images as $image) {
   $imageName = time() . '.' . $image->extension();
               $path = $image->move(public_path('files/'), $imageName);   
               gallery::create([
                'image'=>"files/".$imageName
               ]) ;
    }
    return back();
  }

 
}
