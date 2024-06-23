@extends('layout.pub_nav')

@section('content')

<div class="text-center mb-4">
<h3>Contact Us</h3>
<small class="mt-5">Hit Us Up</small>
<div class="container w-75 d-sm-flex mt-4 justify-content-between">
<div class="location">
<h6 class="pl-5">Shop Address: UnKnown,Lagos,Nigeria</h6>
<h6>Phone: 00000000000000</h6>
<h6>Email: gmail@mail.com</h6>
<div class="stay_connected ml-5 mt-4">
<h5>Reach Us On Our Social Handles</h5>


 <div class="fb rounded"><a href="" class="text-white">FACEBOOK </a></div>
  <div class="tw rounded"><a href="" class="text-white">TWITTER</a></div>
   <div class="yt rounded"><a href="" class="text-white">YOUTUBE</a></div>
</div>


</div>

<div class="message_form">
    <p class="h4">send us a message</p>
    <form action="{{route('message')}}" method="post">
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