<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class aboutControl extends Controller
{
    public function show()
    {
    return view('about');
    }
        public function contact_show()
    {
    return view('contact');
    }

public function message(Request $request)
{
$request->validate([
    'name'=>"required",
    'email'=>"required|email",
    'message'=>'required',
]);
$name=$request->name;
 $data=['email'=>"okoloemeka37@gmail.com",'subject'=>$name. "send you an email",'body'=>$request->message];
        Mail::send('user_message',$data,function($message)use($data)        {
        
            $message->to($data['email'])
            ->subject($data["subject"]);
            $message->from('okoloemeka37@gmail.com');
        });
}

}
