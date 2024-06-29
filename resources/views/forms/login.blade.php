@extends('layout.pub_nav')

@section('content')



<form action="{{url('https://zylerblog.com.cleverapps.io/loginPost')}}" method="post" class="centered login mt-5">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(session('status'))
<div class="btn btn-danger w-50">{{session('status')}}</div>
@endif
<br>

<div class="col-12 col-sm-6">
    <label for="">Email:</label>
    <input type="email" name="email" class="form-control  @error('email') border border-danger @enderror" id="" value="{{old('email')}}">
     @error('email')
 <p class="text-danger">This Field Is Required</p>
  @enderror
</div>
<div class="col-12 col-sm-6">
    <label for="">Password</label>
    <input type="password"class="form-control @error('password') border border-danger @enderror" name="password">
    @error('password')
 <p> <p class="text-danger">Password Must Not Be Greater Than 8 Digit</p></p>
  @enderror

</div>
 <input type="checkbox" name="remember" id="" checked >
 <label for="">remember me</label>

 <div class="col-12 col-sm-6">
    <button type="submit" class="btn btn-primary">Login</button>
</div>
     <p class="d-inline"><a href="{{route('forgot_show')}}">forgot password</a></p>
</form>


@endsection
