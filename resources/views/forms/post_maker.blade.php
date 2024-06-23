@extends('layout.nav_fot')

@section('content')

<h2 class="text-center text-dark font-italic mt-4">Create Post</h2>

<form action="{{route('post_store')}}" method="post" class="centered login mt-5" enctype="multipart/form-data">
 <input type="hidden" name="_token" value=" {{csrf_token()}} ">


<label for="">Title:</label>
<input type="text" name="title" id="" class="form-control w-50">
@error('title')
<p class="text-danger">This Field Is Required</p>
@enderror 
    <label for="" class="mt-5">Content</label>
    <div class="content-area w-50">
  <textarea name="content" id="" cols="20" rows="10" class="form-control w-50"></textarea>

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
 <br> 
    <button type="submit" class="btn btn-success w-50">Post</button>
</form>

<script>
         CKEDITOR.replace('content',{
filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
filebrowserUploadMethod: 'form'
         })
</script>
@endsection