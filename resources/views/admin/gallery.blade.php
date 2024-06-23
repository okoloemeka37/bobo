@extends('layout.side')
@section('main')




<p class="page_type" id="gallery-page"></p>
<div>
<div class="grid-post mr-5 hold_img "></div>
<form action="{{route('upload_img')}}" class="centered"  method="post" enctype="multipart/form-data">
  @csrf
   <button type="submit" class="btn btn-info" id="c_u" style="display:none;"> Click To Upload</button> 
  <input type="file" name="image[]" id="" multiple class="file-multiple hide"> <br>
<p class="text-warning" id="image_err"></p>

  <br>
<p class="btn btn-primary" id="fake-btn">Upload Image</p>

@error('image')
<p class="text-danger">{{$message}}</p>
@enderror
</form>
<div class="grid-post mr-5">

@foreach($images as $image)
<div class="mb-4 mr-4 up_img">

<img src="{{asset($image->image)}}" width="100%" style="height:30vh ;" alt="">

<div class="dots hide">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
</div>
<div class="opts">
<p class="save btn btn-dark"><a href="{{asset($image->image)}}" class="text-light" download>Save</a></p>
<p class="btn btn-danger"><a href="{{route('del_img',$image)}}" class="text-light">Delete</a></p>
</div>

<p class="ml-5 d " > {{$image->created_at->diffForHumans()}}</p>
</div>

@endforeach

</div>
</div>

@endsection