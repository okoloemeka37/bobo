@extends('layout.pub_nav')
@section('content')


<div class="top">
<form action="{{route('ds')}}" method="post" class="ml-5 mr-5 mt-3">
  @csrf
  <input type="text" name="input" class="form-control w-100 text-center" placeholder="Search Topic" id="life-search">
</form>

<div class="ans"></div>
</div>
<div id="blog-page">

 <div class=" mt-5 mb-4"id="blog_img">
    <span class="hol" id="left_btn"><i class="arr left" ></i></span>
 @foreach($f_posts as $post)
 <div class="board ">

 <picture class="blog_img" ><img src="{{$post->image}}"  height="300 "  alt="">
  <p class="title h1 text-dark"><a href="{{route('post_show',$post)}}"> {{$post->title}}</a></p></picture>


</div>

@endforeach

<span class="ho" id='right_btn'><i class="arr right" ></i></span>
</div>



@foreach($row_posts as $row)
     <div class=" row_posts" style=" border:none;"> 
    <img src="https://raw.githubusercontent.com/okoloemeka37/ImageHolder/main/{{$row->image}}" class="card-img-top"style="height:20vh ;" alt="">
    <div class=" card-body">
      <h4 class="card-title chg"><a href="{{route('post_show',$row)}}"> {{$row->title}}</a></h4>

         </div>
     </div>
 @endforeach 


<div class="row_post">


</div>
<div class="d-lg-flex">
<div class="more_blog ">
    <h2 class="h3">More Post</h2>
    <div class="black-line mb-3 w-100">    <span class="red-line"></span></div>

    <div class="m_ps">
        @foreach($more_posts as $post)

 <div class="m_p  pl-3 pt-3">

 <img src="https://raw.githubusercontent.com/okoloemeka37/ImageHolder/main/{{$post->image}}" class="m_p_img " height="200 "  alt="">


 <span class="d-block pl-3">{{$post->created_at->format('M,d,Y')}}</span>
  <p class="h4 text-dark "><a class="" href="{{route('post_show',$post)}}">{{$post->title}}</a></p>
</div>

        @endforeach
    </div>
    {{$more_posts->links()}}
</div>


<div class="latest-post  w-75">
    <h2 class="h3">Latest Post</h2>
    <div class="black-line mb-3 w-75">    <span class="red-line"></span></div>
 <div class="m_p w-100 pl-3 pt-3">

 <img src="{{$latest[0]->image}}" class="m_p_img w-75" height="200 "  alt="">


 <span class="d-block pl-3">{{$latest[0]->created_at->format('M,d,Y')}}</span>
  <p class="h4 text-dark"><a class="" href="{{route('post_show',$latest[0])}}">{{$latest[0]->title}}</a></p>
  <div class="text-grey mb-2"><?php echo substr($latest[0]->content,0,100)?></div>
<a class="read_more " href="{{route('post_show',$latest[0])}}">Read More</a>
</div>
<div>
@foreach($latest as $post)
<div class="m_p w-75 pl-3 pt-3 d-flex w-100">
<div class="w-50">
 <img src="https://raw.githubusercontent.com/okoloemeka37/ImageHolder/main/{{$post->image}}" class="w-100" height="120"  alt="">
</div>
<div class="ml-4 mt-4">
 <span class="d-block ">{{$post->created_at->format('M,d,Y')}}</span>
 
<p class="h6 text-dark "><a class="" href="{{route('post_show',$post)}}">{{$post->title}}</a></p>
</div>
</div>
<hr>
@endforeach
</div>

<!-- stay connected -->
<div class="stay_connected">
  <h2 class="h3 mt-5">Stay Connected</h2>
    <div class="black-line mb-3 w-100 mt-3">    <span class="red-line"></span></div>
 <div class="fb">FACEBOOK<span class="sum"> | 123 {{Str::plural('Fan',12)}} </span> | <a href="" class="text-white">Like</a></div>
  <div class="tw">TWITTER<span class="sum"> | 123 {{Str::plural('Follower',12)}} </span> | <a href="" class="text-white">Follow</a></div>
   <div class="yt">YOUTUBE<span class="sum"> | 123 {{Str::plural('Subscriber',12)}} </span> | <a href="" class="text-white">Subscribe</a></div>
</div>




<!--subscibe -->
<div class="card shadow-lg p-5 mt-5 mr-4 mb-5">
   <p class="h5">Get Daily Fashion And Style News Daily</p>
  <form action="" method="post" class="d-sm-flex mt-4">
    <input class="form-control w-100 mr-3 mb-4"  type="text" name="subscribe" placeholder="email">

    <button type="submit" class="btn btn-primary">Subscribe</button>
  </form>
</div>


</div>

</div>



</div>
  <script src="{{asset('script/jquery.js')}}"></script> 
<script>
   let input = document.querySelector("#life-search");
    input.addEventListener("input", function() {
        let value = input.value;
   
        $.ajax({
            url: "https://app-0d3eca8e-2da3-4430-869e-7c3cf274cbb1.cleverapps.io/life-search",
            type: "get",
            data: {
                "_token": "{{csrf_token()}}",
                input: value
            },
            success: function(response) {
     
 $(".ans").empty();   
        

 $(".ans").append(response)           
}
        })
      
    })
</script>
@endsection