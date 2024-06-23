@extends('layout.pub_nav')

@section('content')

<div class="body">
<div class="holder" style="background-image: url('../mine/wedding_couple.jpg');">
    <h1 class="text-light ml-10 pt-10 word">Let's Make You Beautiful</h1>
</div>
<div class="wwa  text-center mt-4 text-grey">
   <h1>Who we Are</h1>
  
   <p class="w-100">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus facere iusto pariatur similique ipsum,laborum non, dolorem reprehenderit itaque perspiciatis, esse
     aspernatur. Dolorem quia distinctio  dolore accusantium provident doloremque exercitationem more on <a class="text-success" href="{{route('about_show')}}">About Us</a>.
   </p>
  
</div>
<div class="gallery">

<h3 class="ml-4 text-primary mb-5 w-f"><a href="{{route('gallery_index')}}" class="nav-link">Our Gallery</a></h3>
<div class="g-img">

        <img src="{{asset('mine/wedding_couple.jpg')}}" alt="" class="try img_scroll1 anim "id="active1">

        <img src="{{asset('mine/wedding_couple.jpg')}}" alt="" class=" try2 img_scroll2 anim"id="active2">
        
        <img src="{{asset('mine/wedding_couple.jpg')}}" alt="" class="m img_scroll3 anim"id="active3">
</div>
</div>



 
  <h2>Blog Post</h2>
    <div class="blogs  d-sm-flex mr-5"> 
     @foreach($posts as $post)
 <div class="ml-3 card shadow-lg p-4 mb-4 bg-white" style="width:250px;"> 
    <img src="{{asset('mine/avatar1.png')}}" width="20%"  class="card-img-top" style="height:15vh ;" alt="">
        <div class=" card-body">
      <h4 class="card-title"><a href="{{route('post_show',$post)}}">{{$post->title}}</a></h4>
      
    </div>
      
         </div>

@endforeach
 </div>
</div>

@endsection