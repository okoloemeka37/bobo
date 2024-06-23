<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class settingsControl extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }
    public function update_person(Request $request)
    {
    
        $request->validate([
    'name'=>'required',
    'email'=>'required|email',
    'image'=>['nullable','mimes:png,jpg,jpeg']
]);
     $imageName='';
if ($request->image !=null) {
    $imageName = time() . '.' . $request->image->extension();
                //remove image before upload

               $path = $request->image->move(public_path('files/'), $imageName);    
}else {
    $imageName= $request->fake_img;
}

        User::where('is_admin','=',true)->update([
'name'=>$request->name,
'email'=>$request->email,
'image'=>"files/".$imageName
        ]);
        return redirect()->route('show_set');
    }

    // change_password
    public function update_password(Request $request)
    {

$request->validate([
    'old_password'=>'required',
    'password'=>'required|min:8|confirmed'
]);

$status =Hash::check($request->old_password,auth()->user()->password);
if ($status) {
 User::find(auth()->user()->id)->update([
'password'=>Hash::make($request->password)
 ]) ;
 return back()->with(['success_password'=>"Password Changed"]);
}else {
  return back()->with(['success_password'=>"Current Password Do Not Match"]);
}

    }

//forgot pass 

public function forgot_show()
{
   

    return view('admin.forgotPassword');
}

public function check_email(Request $request)
{
    $request->validate([
    'email'=>'required|email'
]);
$check=DB::select("SELECT * FROM users WHERE email = ? AND is_admin = ?",[$request->email,1]);
if (count($check) != 0) {
 foreach ($check as $user) {
  
  $token_arr=[];
   while (count($token_arr) != 5) {
    array_push($token_arr,rand(0,9));
   }
   $token=implode("",$token_arr);
   $email=$request->email;
   DB::insert('INSERT INTO password_resets(email,token)  VALUES (?,?)',[$email,$token]);

    $data=['email'=>$email,'subject'=>"Your Pass Token Is ",'token'=>$token,];
        Mail::send('admin.emails.forgot_password',$data,function($message)use($data)        {
        
            $message->to($data['email'])
            ->subject($data["subject"]);
            $message->from('okoloemeka37@gmail.com');
        });

 }
}else{
    echo "Email Not Found";
   
} 
}


//checking token

public function check_token(Request $request)
{
 $token=$request->token;
 $email=$request->email;

 $check=DB::select("SELECT * FROM password_resets WHERE email = ? AND token = ? LIMIT 1",[$email,$token]);
 if (count($check) != 0) {
Db::delete("DELETE FROM password_resets WHERE email = ? AND token =? ",[$email,$token]);
}else{
    echo "Invalid Token";
}
 
}

//new password
public function n_pass(Request $request)
{
    $email=$request->email;
    $password=$request->password;
$c_pass=$request->password_confirm;

if ($password != $c_pass) {
    echo "Passwords Do Not Match";
}else {
    

$h_pass=Hash::make($password);
    $insert=DB::insert('UPDATE users SET  password= ? WHERE email = ?',[$h_pass,$email]);
if ($insert) {
   if (auth()->attempt($request->only('email','password'),true)) {
    echo "not";
   }else{
auth()->attempt($request->only('email','password'),true);
  echo "eot";
   }
}

}
}

}

