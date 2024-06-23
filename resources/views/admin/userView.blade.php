@extends('layout.side')


@section('main')

  <style>
@media screen and (max-width: 767px) {
   .profile{
    display:none ;
   }
   }
</style>

<p class="page_type" id="users-page"></p>
<div>
    <table class="table table-hover w-100">
<thead>
    <tr>
        <th class="h4">Name</th>
        <th class="h4">Email</th>
        <th class="h4">Date Joined</th>
        <th class="text-danger">Action</th>
    </tr>
</thead>
<tbody>
    @foreach($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td><a href="{{route('remove_user',$user)}}">Block</a></td>
</tr>


    @endforeach
</tbody>
    </table>
</div>

@endsection