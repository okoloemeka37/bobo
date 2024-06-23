@extends('layout.side')
@section('main')

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