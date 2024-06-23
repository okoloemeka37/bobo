<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class auth extends Controller
{
        public function login_index()
    {
        return view('forms.login');
    }


    public function login_store(Request $request)
    {
    $request->validate([
        'email'=>'required',
        'password'=>'required|min:8'
    ]);
    if (!auth()->attempt($request->only('email','password'),$request->remember)) {
return back()->with(['status'=>'Invalid Credentials']);
}else {    
return redirect()->route('dashboard');
}

}

//logout

      public function logout()
    {
      auth()->logout();
     return redirect()->route('home');
        }

}
