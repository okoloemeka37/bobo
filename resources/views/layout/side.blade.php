@extends('layout.nav_fot')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<body class="">






    <div class="user_con">
        <div class="profile p-3">
            <div class="name">

                <h2>{{auth()->user()->name}}</h2>
                <?php if (strlen(auth()->user()->image) !=0 ) {?>
              <div><img src="https://raw.githubusercontent.com/okoloemeka37/ImageHolder/main/{{auth()->user()->image}}" class="rounded-circle same" alt=""></div>
                <?php } ?>
                <small>{{auth()->user()->email}}</small>
            </div>
<div class="user_items" id="post-page"><a href="{{route('post_page')}}"><p>Post</p></a> </div>
<div class="user_items" id="post-maker"><a href="{{route('post_create')}}"><p>Post Maker</p></a> </div>

<div class="user_items" id="email-page"><a href="{{route('email_user')}}" ><p>Email</p></a> </div>
<div class="user_items" id="history-page"><a href="{{route('history.index')}}"><p>History</p></a> </div>
<div class="user_items" id="users-page"><a href="{{route('user_index')}}"><p>Users</p></a> </div>



<div class="user_items" id="settings-page"><a href="{{route('show_set')}}"><p>Settings</p></a> </div>
</div>

@yield('main')


    </div>


    @endsection


