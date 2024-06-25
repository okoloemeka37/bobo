@extends('layout.nav_fot')

@section('content')

<h2 class="text-center text-dark font-italic mt-4">Editing Post {{$post->title}}</h2>

<form action="{{route('update',$post)}}" method="post" class="centered login mt-5" enctype="multipart/form-data">
    @method('PUT')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    


<label for="">Title:</label>
<input type="text" name="title" id="" class="form-control w-50" value="{{$post->title}}">
@error('title')
<p class="text-danger">{{$message}}</p>
@enderror 
    <label for="" class="mt-5">Content</label>
    <div class="content-area w-50">
  <textarea name="content" id="" cols="20" rows="10" class="form-control w-50">{{$post->content}}</textarea>

  @error('content')
<p class="text-danger">{{$message}}</p>
@enderror
</div>

  <input type="file" name="image" id="" class="file hide"> <br>
@if($post->image != null)
  <img src="{{asset($post->image)}}" alt="" class="show_img w-5 ">
  @else 
   <img src="" alt="" class="show_img w-5 none">
   
  @endif
  <br>
<p class="btn btn-primary" id="fake-btn">Upload Image</p>
@error('image')
<p class="text-danger">{{$message}}</p>
@enderror
 <br> 
    <button type="submit" class="btn btn-success w-50">Save</button>
</form>

<script>
         CKEDITOR.replace('content');
</script>
@endsection