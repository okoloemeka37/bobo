@extends('layout.pub_nav')

@section('content')

<div class="text-center">
<p class="h3">{{$act->name}}</p>
<span>{{$act->name}} has {{count($comment)}} {{Str::plural('comment',count($comment))}}</span>
</div>

<div class="">
    <p class="h4">Post(s) Commented</p>
    <div class="acts mt-5 w-50">
<div class="d-flex  justify-content-between"> 
<h4>Post</h4>
<h4>Comment(s)</h4>
 <h4>Date</h4>
</div>

   @foreach($comment as $come)
<div class="d-flex  justify-content-between">
 <p><a href="{{route('post_show',$come->post)}}">{{$come->post->title}}</a></p>   
    <p>{{$come->content}}</p>
    <p>{{$come->created_at->diffForHumans()}}</p>
</div>
<hr>
   @endforeach
</div>
</div>
</div>




@endsection