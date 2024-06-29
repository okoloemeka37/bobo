@extends('layout.pub_nav')

@section('content')

<div class="text-center mb-4">
<h3>Contact Us</h3>
<small class="mt-5">Hit Us Up</small>
<div class="container w-75 d-sm-flex mt-4 justify-content-between">
<div class="location">
<h6 class="pl-5">Address:Lagos,Nigeria</h6>
<h6>Phone:09017251972</h6>
<h6>Email:okoloemeka37@gmail.com</h6>
<div class="stay_connected ml-5 mt-4">
<h5>Reach Us On Our Social Handles</h5>


 <div class="fb rounded"><a href="https://web.facebook.com/emeka.okolo.5201" class="text-white">FACEBOOK </a></div>
  <div class="tw rounded"><a href="https://x.com/zylercodes?t=wb2Ah1UrbAUgYASqkIwZsQ&s=09&mx=2" class="text-white">TWITTER</a></div>
   <div class="yt rounded"><a href="https://github.com/okoloemeka37/bobo" class="text-white">Github</a></div>
</div>


</div>

<div class="message_form">
    <p class="h4">send us a message</p>
    <form action="http://zylerblog.com.cleverapps.io/message" method="post">
        @csrf
    <input type="text" name="name" id="" class="form-control w-100" placeholder="Name" required>
<input type="email" name="email" id="" class="form-control mt-3 mb-3" placeholder="Email" required>
<textarea name="message" id="" cols="30" rows="4" class="form-control" placeholder="Message" required></textarea>

<button type="submit" class="btn btn-primary mb-5 mt-2">Send</button>
</form>
</div>
</div>
</div>


@endsection
