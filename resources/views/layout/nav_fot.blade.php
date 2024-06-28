<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('mine/lol.png')}}" type="image/x-icon">

    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="stylesheet" href="{{asset('css/foot.css')}}">
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />
        <script src="{{asset('script/jquery.js')}}" defer></script> 
        <script src="{{asset('script/index.js')}}" defer></script> 
    <script src="{{asset('script/more.js')}}" defer></script> 

</head>
<body>
  <div class="d-flex justify-content-between sticky-top bg-light shadow-lg pl-1 pl-2 ">
   
  <div class="mt-3"><a class="" href="{{route('blog_index')}}"><p>BoBo And Bae</p></a></div> 
    <ul class=" nav mt-1 show " id="nav">
        <li class="nav-item "><a href="{{route('about_show')}}" class="nav-link">About</a></li>
        <li class="nav-item text-primary"><a href="{{route('contact_show')}}" class="nav-link">Contact</a></li>
        <li class="nav-item text-primary" ><a href="{{route('blog_index')}}" class="nav-link">Blog</a></li>
        @guest
        <li class="nav-item text-primary"><a href="{{route('login.show')}}" class="nav-link">Login</a></li>

       @endguest
       @auth
      
        <li class="nav-item text-primary"><a href="{{route('dashboard')}}" class="nav-link">{{auth()->user()->name}}</a></li>
          
       <li class="nav-item text-primary">
          <form action="http://zylerblog.com.cleverapps.io/logout" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class=" my-btn  text-primary">Logout</button>
          </form>    
          </li>     
            @endauth

           
      </ul>
  <div class="tri-line" id="toggle-nav">
              <div class="line"></div>
              <div class="line"></div>
              <div class="line"></div>
                   
            </div>
    </div>
  @yield('content')





 

</body>
</html>