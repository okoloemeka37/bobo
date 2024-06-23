<?php





namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\comment;
use App\Models\commenter;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class commentControl extends Controller
{
    public function store(Request $request )
    {

        $request->validate([
        'user_name'=>'required',
      'email'=>'required|email',
      'comment'=>'required',
     ]);


$id=0;

   if (auth()->user()) {
  $id=auth()->user()->name; 
  get_come($request);
   }else {
      $email=$request->email;
$name=$request->user_name;

      $check_user=User::where('email','=',$email)->orWhere('name','=',$name)->get();
//checking if user exist
if (count($check_user) !=0) {

foreach ($check_user as $user) {
   //if name and email are equal sign user in
if ($user->name === $name && $user->email === $email) {
      auth()->attempt($request->only('email','password'),true);
  get_come($request); 
   }
 //esle print error
 else{
   return "Email Or Name Taken";
 }
}
}  else {
  User::create([
'name'=>$name,
'email'=>$email,
'password'=>Hash::make($request->password),
'sub'=>' ',
"image"=>" "
  ]);
      auth()->attempt($request->only('email','password'),true);
  get_come($request); 
      }
   }

if ($request->sub=='yes') {
User::where('id','=',auth()->user()->id)->update([
'sub'=>'yes'
]);
}



}

  
}































function get_come($request)
{
     $post_id=$request->id;
comment::create([
'user_id'=>auth()->user()->id,
'post_id'=>$post_id,
'content'=>$request->comment,
'parent_id'=>$request->parent_id,
'parent_user'=>$request->parent_real_id
]);
// sending replies to commenter
if ($request->parent_id !=0) {

 $fake_email=$request->fake_email;
 
 $data=['email'=>$fake_email,'name'=>$request->user_name,'id'=>$post_id,'subject'=>"SomeOne Replied TO Ur Comment",'body'=>$request->comment];
        Mail::send('admin.emails.comment_to_user',$data,function($message)use($data)        {
        
            $message->to($data['email'])
            ->subject($data["subject"]);
            $message->from('okoloemeka37@gmail.com');
        });
}
//end
// send comment report to admin email

 $data=['email'=>"okoloemeka47@gmail.com",'name'=>$request->user_name,'id'=>$post_id,'subject'=>"You Have A New Comment To See",'body'=>$request->comment];
        Mail::send('admin.emails.comment_to_admin',$data,function($message)use($data)        {
        
            $message->to($data['email'])
            ->subject($data["subject"]);
            $message->from('okoloemeka37@gmail.com');
        });
//end
 
    $comments=comment::where('post_id','=',$post_id)->where('parent_id','=',0)->orderBy('id','desc')->get();
foreach ($comments as $comment) {
     $btn='';
    if (auth()->user()) {
      # code...

  if ($comment->user_id === auth()->user()->id) {
  $btn='<a class="btn btn-danger" href="'.route('del_comment',$comment).'">Delete</a>
<button class="btn btn-success" id="edit-btn">Edit</button>
  ';
}    } 
echo '
<div class="comment">
  <p class="h4"><a href="'.route('user_activity',$comment->user_id).'"> '.$comment->user->name.'</a></p>
    <span class="d-block small">'.$comment->created_at->diffForHumans().'</span>
  <p class="card-text ml-5 comment-content">'.$comment->content.'</p>
     <p class="btn btn-info reply-btn" id="'.$comment->id.'" to="'.$comment->user->name.'"  user="'.$comment->user_id.'" to_email="'. $comment->user->email.'">reply</p>

'.$btn.'
     </div>';
get_replies($comment->id);

}
}


//get replies along





function get_replies($parent_id ,$ml=20)
 {
    $comments=comment::where('parent_id','=',$parent_id)->orderBy('id','desc')->get();
  
foreach ($comments as $comment) {
     $btn='';
    if (auth()->user()) {
      # code...

  if ($comment->user_id === auth()->user()->id) {
  $btn='<a class="btn btn-danger" href="'.route('del_comment',$comment).'">Delete</a>
<button class="btn btn-success" id="edit-btn"  >Edit</button>
  ';
}    } 
    echo '
<div class="comment replies" style="margin-left:'.$ml.'%" >
  <p class="h4"><a href="'.route('user_activity',$comment->user_id).'"> '.$comment->user->name.'</a></p>
    <span class="d-block small">'.$comment->created_at->diffForHumans().'</span>
    <span class="text-success">replied to <a href="'.route('user_activity',$comment->user_id).'">  '.reply_To($comment->parent_user).'</a></span>
  <p class="card-text ml-5 comment-content">'.$comment->content.'</p>
     <p class="btn btn-info reply-btn" id="'.$comment->id.'" to="'.$comment->user->name.'" user="'.$comment->user_id.'">reply</p>
'.$btn.'
     </div>';
get_replies($comment->id);
}
 }


 function reply_To($id)
 {
$user=User::where('id','=',$id)->get();
foreach ($user as $key) {
   return $key->name;
}
 }
?>