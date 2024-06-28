<?php

namespace App\Http\Controllers;

use App\Services\GitHubServices;

use App\Mail\post_mail;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class postControl extends Controller
{
  protected $gitHubService;

    public function __construct(GitHubServices $gitHubService)
    {
        $this->gitHubService = $gitHubService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forms.post_maker');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$request->validate([
    'title'=>'required',
    'content'=>'required',
    'image'=>['nullable','mimes:png,jpg,jpeg']
]);
  $imageName='' ;
if ($request->image != null) {
    $imageName = time() . '.' . $request->image->extension();
    $file=$request->file('image');
    $content = file_get_contents($file->getPathname());
    $this->gitHubService->uploadFile($imageName,$content);
}
          
 
$c_p=post::create([
'title'=>$request->title,
'content'=>$request->content,

'user_id'=>auth()->user()->id,
'image'=>$imageName
]);

//send mail to subcribers

$users=User::where("sub",'=','no')->get();

 return redirect()->route('dashboard');
}


public function show(post $post )
{
$sides=  post::orderBy('id','desc')->limit('5')->get();
$downs=post::offset('15')->limit('5')->orderBy('id','desc')->get();
return view('single_post',['post'=>$post,'sides'=>$sides,'downs'=>$downs]);
}

public function all()
{
   $posts=post::orderBy('id','desc')->get();
   dd($posts);
 //  return view('admin.posts_tem',['posts'=>$posts]);
}


//edit

public function edit_form(post $post){
    return view('forms.edit',['post'=>$post]);
}

//update

public function update(Request $request,$post)
{
  echo $post;
  $plt=POST::find($post);
    $request->validate([
        'title'=>'required',
        'content'=>'required',
        'image'=>'nullable'
    ]);
    $imageName="";
if ($request->image != null) {
    $imageName = time() . '.' . $request->image->extension();
          $file=$request->file('image');
    $content = file_get_contents($file->getPathname());
    $this->gitHubService->uploadFile($imageName,$content);
}else{
  $imageName=$request->oldImage;
}
 $plt->update([
   'title'=>$request->title,
   'content'=>$request->content,
   'image'=>$imageName
 ]);
return redirect()->route('dashboard');
}

//delete
public function del(post $post)
{
  $post->delete();
  return redirect()->route('dashboard');
}



public function ck(Request $request)
{
if($request->hasFile('upload')) {
$originName = $request->file('upload')->getClientOriginalName();
$fileName = pathinfo($originName, PATHINFO_FILENAME);

$extension = $request->file('upload')->getClientOriginalExtension();
$fileName = $fileName.'_'.time().'.'.$extension;


$file=$request->file('upload');


$content = file_get_contents($file->getPathname());
$this->gitHubService->uploadFile($fileName,$content);

$funcNum = $request->input('CKEditorFuncNum');

$message = 'File misloaded successfully';


$url= "https://raw.githubusercontent.com/okoloemeka37/ImageHolder/main/".$fileName; 

echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message')</script>";


}
}

}

