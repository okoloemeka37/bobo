@extends('layout.side')


@section('main')

<style>
   @media screen and (max-width: 767px) {
    .index-post{
      display: none;
    }
   }
</style>

<div class="index-post">
@foreach ($posts as $post) 
    <div class="grid-item ml-2">

    <div class="comment card shadow-lg p-4 mb-4 bg-white" style="width:300px;"> 
    @if(strlen($post->image)>7)
    <img src="{{asset($post->image)}}"  class="card-img-top" style="height:20vh ;" alt="">
    @else

    @endif
    <div class=" card-body">
      <h4 class="card-title"><a href="{{route('post_show',$post)}}">{{$post->title}}</a></h4>
      <p class="card-text"><?php echo substr($post->content,0,50)?>...</p> </div>
      <div class="action d-flex  justify-content-between">
          <p class= "btn btn-dark"><a href="{{route('edit_form',$post)}}">Edit</a></p>
    <form action="{{route('delete.post',$post)}}" method="post">
        @method('DELETE')
        @csrf
         <button class="btn btn-default">Delete</button>
    </form>
      </div>
      <p><a href="{{route('preview',$post)}}">{{$post->comment->count()}}  {{ Str::plural('comment',$post->comment->count()) }}</a> </p>
      
    </div>
    </div>
@endforeach
      </div> 






@endsection
