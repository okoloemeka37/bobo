<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\User;
use Illuminate\Http\Request;

class get_commentControl extends Controller
{
  
    public function get_come(Request $request)
    {
        $post_id=$request->id;
   
    $comments=comment::where('post_id','=',$post_id)->where('parent_id','=',0)->orderBy('id','desc')->get();
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
<div class="comment">
  <p class="h4"><a href="'.route('user_activity',$comment->user_id).'"> '.$comment->user->name.'</a></p>
  <span class="d-block small">'.$comment->created_at->diffForHumans().'</span>
  <p class="card-text ml-5 comment-content">'.$comment->content.'</p>
  <input class="comment_edit  form-control" value="'.$comment->content.'" style="display:none;">
  <button class="Edit_comment btn btn-primary"style="display:none;" come_id="'.$comment->id.'">Done</button>
     <p class="btn btn-info reply-btn" id="'.$comment->id.'" to="'.$comment->user->name.'" to_email="'. $comment->user->email.'"  user="'.$comment->user_id.'">reply</p>
'.$btn.'
     </div>';
get_replies($comment->id);
}

}

 

public function del_comment(comment $comment)
{
 $comment->delete();
 return back();
}

public function edit_comment( Request $request)
{
  $id=$request->id;
comment::where('id','=',$id)->update([
 'content'=>$request->value 
]);
}



}


function get_replies($parent_id ,$ml=0)
 {
    $comments=comment::where('parent_id','=',$parent_id)->orderBy('id','desc')->get();
  
foreach ($comments as $comment) {
    $btn='';
  if (auth()->user()) {
      # code...

  if ($comment->user_id === auth()->user()->id) {
  $btn='<a class="btn btn-danger" href="'.route('del_comment',$comment).'">Delete</a>
<button class="btn btn-success" id="edit-btn">Edit</button>
  ';
}    } 
  $ml =20;
    echo '
<div class="comment replies" style="margin-left:'.$ml.'%" >
  <p class="h4"><a href="'.route('user_activity',$comment->user_id).'"> '.$comment->user->name.'</a></p>
    <span class="d-block small">'.$comment->created_at->diffForHumans().'</span>
    <span class="text-success">replied to <a href="'.route('user_activity',$comment->user_id).'"> '.reply_To($comment->parent_user).'</a></span>
  <p class="card-text ml-5 comment-content">'.$comment->content.'</p>
    <input class="comment_edit form-control" value="'.$comment->content.'" style="display:none;">
      <button class="Edit_comment btn btn-primary"style="display:none;">Done</button>
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