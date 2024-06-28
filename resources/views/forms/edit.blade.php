@extends('layout.nav_fot')

@section('content')

<h2 class="text-center text-dark font-italic mt-4">Editing Post {{$post->title}}</h2>

<form action="http://zylerblog.com.cleverapps.io/admin/post/{{$post->id}}" method="post" class="centered login mt-2" enctype="multipart/form-data">
    @method('PUT')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


   
      
  </div>


 <div class="col-12 col-sm-6">
<label for="">Title:</label>
<input type="text" name="title" id="" class="form-control" value="{{$post->title}}">
</div>
@error('title')
<p class="text-danger">{{$message}}</p>
@enderror 
<div class="col-12 col-sm-6">
    <label for="" class="mt-5">Content</label>
  <textarea name="content" id="" cols="20" rows="10" class="form-control">{{$post->content}}</textarea>
</div>
  @error('content')
<p class="text-danger">{{$message}}</p>
@enderror
</div>

<input type="hidden" name="oldImage" value="{{$post->image}}">
  <input type="file" name="image" id="" class="file hide"> <br>
@if($post->image != null)
  <img src="https://raw.githubusercontent.com/okoloemeka37/ImageHolder/main/{{$post->image}}" alt="" class="show_img w-5 ">
  @else 
   <img src="" alt="" class="show_img w-5 none">
   
  @endif
  <br>
<p class="btn btn-primary" id="fake-btn">Upload Image</p>
@error('image')
<p class="text-danger">{{$message}}</p>
@enderror

 <div class="col-12 col-sm-6">
    <button type="submit" class="btn btn-success w-50">Save</button>
 </div>
</form>

<script>
         CKEDITOR.replace('content');
</script>
@endsection