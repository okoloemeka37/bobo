@extends('layout.pub_nav')

@section('content')



<form action="https://zylerblog.com.cleverapps.io/loginPost" method="post" class="centered login mt-5">
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
@if(session('status'))

<div class="btn btn-danger w-50">{{session('status')}}</div>
@endif
<br>
    <label for="">Email:</label>
    <input type="email" name="email" class="form-control w-50 @error('email') border border-danger @enderror" id="" value="{{old('email')}}">
     @error('email')
 <p class="text-danger">This Field Is Required</p>
  @enderror
    <label for="">Password</label>
    <input type="password"class="form-control w-50 @error('password') border border-danger @enderror" name="password">
    @error('password')
 <p> <p class="text-danger">Password Must Not Be Greater Than 8 Digit</p></p>
  @enderror
 <input type="checkbox" name="remember" id="" checked >
 <label for="">remember me</label>
 <br> 
    <button type="submit" class="btn btn-primary">Login</button>
    <br> <p class="d-inline"><a href="{{route('forgot_show')}}">forgot password</a></p>
</form>


@endsection