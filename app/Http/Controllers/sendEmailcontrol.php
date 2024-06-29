<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class sendEmailcontrol extends Controller
{

function index()
{
    $users=User::where('is_admin','=',0)->orderBy('id','desc')->get();
    return view('admin.send_email',['users'=>$users]);
}
public function send_email(Request $request)
{
    $request->validate([
'subject'=>'required',
'content'=>'required'
    ]);

    $spl_id=explode(',',$request->id);
    foreach ($spl_id as $id) {
       $user=User::find($id);
         $data=['email'=>$user->email,'name'=>$user->name,'subject'=>$request->subject,'body'=>$request->content];
        Mail::send('admin.emails.user_email',$data,function($message)use($data)        {

            $message->to($data['email'])
            ->subject($data["subject"]);
            $message->from('okoloemeka37@gmail.com');
        });


    }

 return redirect()->route("email_user");

}

}
