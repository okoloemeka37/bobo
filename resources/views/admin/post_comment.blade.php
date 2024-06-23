@extends('layout/nav_fot')
@section('content')



<div>
<h2 class="text-center mt-4 mb-4"><a href="{{route('post_show',$post->id)}}">{{$post->title}}</a> <span class="h6"> comment</span></h2>
<table class="table table-hover w-100">
<thead>
    <tr>
        <th class="h4">Name</th>
        <th class="h4">Comment</th>
        <th class="h4">Date Commented</th>
        <th class="text-danger">Action</th>
    </tr>
</thead>
<tbody>
    @foreach($comments as $comment)
    <tr>
        <td><a href="{{route('user_activity',$comment->user_id)}}"> {{$comment->user->name}}</a></td>
        <td>{{$comment->content}}</td>
        <td>{{$comment->created_at->diffForHumans()}}</td>
        <td><a href="{{route('remove_comment',$comment)}}">Remove</a></td>
</tr>
 @endforeach
</tbody>
    </table>
</div>

@endsection