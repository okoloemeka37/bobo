@extends('layout.nav_fot')

@section('content')

<h2 class="text-center text-dark font-italic mt-4">Create Post</h2>

<form action="https://app-37c9113d-6af0-447c-b7e8-acf4bdb4aaa1.cleverapps.io/admin/create_post" method="post" class="centered login mt-5" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">


  <div class="col-12 col-sm-6">
<label for="">Title:</label>
<input type="text" name="title" id="" class="form-control">
@error('title')
<p class="text-danger">This Field Is Required</p>
@enderror
  </div>

  <div class="col-12 col-sm-6">
  <textarea name="content" id="content" cols="20" rows="10" class="form-control"></textarea>
  @error('content')
<p class="text-danger">This Field Is Required</p>
@enderror
</div>


  <input type="file" name="image" id="" class="file hide"> <br>

  <img src="" alt="" class="show_img w-5 none">
  <br>
<p class="btn btn-primary" id="fake-btn">Upload Image</p>
@error('image')
<p class="text-danger">File Must Be In Any Of The Following Format (png, jpg, jpeg)</p>
@enderror
<div class="col-12 col-sm-6">

    <button type="submit" class="btn btn-success w-50">Post</button>

</div>
</form>



         <script>
        CKEDITOR.replace('content',{
filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
filebrowserUploadMethod: 'form'
         })
      </script>


@endsection
