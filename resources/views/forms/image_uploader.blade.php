@extends('layout.nav_fot')
@section('content')
<form action="" class="centered"  method="post" enctype="multipart/form-data">
    
  <input type="file" name="image" id="" multiple class="file hide"> <br>

  <img src="" alt="" class="show_img w-5 none">
  <br>
<p class="btn btn-primary" id="fake-btn">Upload Image</p>
@error('image')
<p class="text-danger">{{$message}}</p>
@enderror
</form>

@endsection
