
@extends('layout.side')


@section('main')
   <style>
@media screen and (max-width: 767px) {
   .profile{
    display:none ;
   }
   }
</style>

<p class="page_type" id="post-page"></p>

<div class="m_ps  w-50">
@foreach ($posts as $post) 
    <div class="ml-3">
     <div class="m_p card  w-100  pl-3 pt-3 shadow-lg p-4 mb-4 bg-white">
    @if(strlen($post->image)>7)
    <img src="{{asset($post->image)}}"  class="card-img-top" style="height:20vh ;" alt="">
    @else

    @endif


 <span class="d-block pl-3">{{$post->created_at->format('M,d,Y')}}</span>
  <p class="h4 text-dark"><a class="link" href="{{route('post_show',$post)}}">{{$post->title}}</a></p>

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
