@extends('layout.side')


@section('main')

  <style>
@media screen and (max-width: 767px) {
   .profile{
    display:none ;
   }
   }
</style>


<p class="page_type" id="history-page"></p>

<div>
  <div class="d-flex justify-content-between">

      <p class="btn btn-dark" style="height: fit-content;" id="show_deleted_post">Posts</p>
   <p class="btn btn-light" style="height: fit-content;" id="show_deleted_user">Users</p>
</div>
  <div class="history-post" id="deleted_post">
@if($posts->count() != 0)
  @foreach ($posts as $post) 

    <div class="grid-item m-3"  >

    <div class="card shadow-lg p-4 mb-4 bg-white" style="width:250px;"> 
    <img src="{{asset('mine/avatar1.png')}}"  class="card-img-top" style="height:20vh ;" alt="">
    <div class=" card-body">
      <h4 class="card-title">{{$post->title}}</h4>
      <p class="card-text"><?php echo substr($post->content,0,50)?>...</p> </div>
      <div class="action d-flex  justify-content-between ">
          <p class= "btn btn-dark"><a href="{{route('remove_history',$post)}}">Remove</a></p>
   
         <p class="btn btn-primary"><a class="text-white" href="{{route('restore_post',$post)}}">Restore</a></p>
       </div>
    </div>
    </div>
@endforeach
    @else
    <div class="h4">No Deleted Post</div>
    @endif

</div> 




      
<div id="deleted_user">
  @if($users->count() != 0)
    <table class="table table-hover w-100">
<thead>
    <tr>
        <th class="h4">Name</th>
        <th class="h4">Email</th>
        <th class="h4">Date Deleted</th>
        <th class="text-danger">Action</th>
        <th class="">Remove</th>
    </tr>
</thead>
<tbody>
    @foreach($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->deleted_at->diffForHumans()}}</td>
        <td><a href="{{route('restore_user',$user)}}">UnBlock</a></td>
                <td><a href="{{route('del_user',$user)}}">Remove</a></td>
</tr>


    @endforeach
</tbody>
    </table>

    @else
    <div class="h4">No Deleted User</div>
    @endif
  </div>


</div>

@endsection
