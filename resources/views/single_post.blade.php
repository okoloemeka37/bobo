@extends('layout.pub_nav')

@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v15.0" nonce="DxReFQIG"></script>
<div class="d-f">
<div class="to-comment  shadow-lg p-1 bg-white  mb-4 "><a href="#comment" class="text-dark">Write A Comment</a></div>
    <div class="post_single card shadow-lg p-4 mb-4  mfl " >


    <div class="clearfix">
  <span class="float-left">By Bobo An Babe</span>
  <span class="float-right">{{$post->created_at->diffForHumans()}}</span>
</div>

    <img src="https://raw.githubusercontent.com/okoloemeka37/ImageHolder/main/{{$post->image}}"  class="card-img-top" style="height:40vh ;" alt="">
    <div class=" card-body">
      <h4 class="card-title text-center">{{$post->title}}</h4>
      <div class="card-text content">
    <?php echo $post->content ?></div>

    <div class="fb-share-button" data-href="http://zylerblog.com.cleverapps.io/{{$post->id}}"
    data-layout="button" data-size="large">

      <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
       class="fb-xfbml-parse-ignore">Share</a></div>

    </div>

    </div>




<!--more post section-->

<div class="single-more">
  <p>More To Read</p>
  @foreach ($sides as $side)
    <div class="single_side mt-4">
<p><a href="{{route('post_show',$side)}}">{{$side->title}}</a></p>

    </div>
@endforeach
</div>

    </div>
     <div class="blogs down gnm">
      @foreach($downs as $down)
 <div class="ml-3 card shadow-lg p-4 mb-4 bg-white" style="width:250px;">
    <img src="https://raw.githubusercontent.com/okoloemeka37/ImageHolder/main/$down->image}}" width="20%"  class="card-img-top" style="height:15vh ;" alt="">
        <div class=" card-body">
      <h4 class="card-title"><a href="{{route('post_show',$down)}}">{{$down->title}}</a></h4>

    </div>

         </div>
     @endforeach
     </div>

     <div class="comments_section mt-3">
<p class="display-4">Comments</p>

<div class="comments_holder w-50"></div>
<p class="add">Add Comment</p>


<div class="btn btn-danger w-50"style="display:none" id="u_message"></div>
<div class="surt">
<p class="reply_to"></p>
<span class="text-danger" id="cancel_reply">X</span>
</div>
     <form class="comment-create" id="comment" method="POST" action="http://zylerblog.com.cleverapps.io//comment">
      <input type="hidden" id="parent_id" value="0">
<input type="text" name="user_name" class="form-control mb-2 w-50" id='name' placeholder="Name" @auth value="{{auth()->user()->name}}" @endauth >
<input type="hidden" name="password" class="form-control mb-2 w-50" id='pass' placeholder="Name" value="password">
<input type="hidden" name="" id="parent_real_id"  value=0>
<input type="hidden" id="fake_email" value=''>
<p class="text-danger" id="nameErr"></p>

<input type="email" name="email" id="email"  class="form-control mb-2 w-50" id="email" placeholder="Email"  @auth value="{{auth()->user()->email}}" @endauth>

<p class="text-danger" id="emailErr"></p>

<textarea name="comment" id="" cols="30" rows="5" class="form-control mb-2 w-50 user_comment"  placeholder="Comment"></textarea>

<p class="text-danger" id="commentErr"></p>

@auth
@if(auth()->user()->sub ==='yes')

<input type="checkbox" name="subscribe" id="sub" checked value="Subscribe">Subscribe For Our Daily Message
@else

<input type="checkbox" name="subscribe" id="sub"  value="Subscribe">Subscribe For Our Daily Message
@endif
@endauth

@guest
<input type="checkbox" name="subscribe" id="sub"  value="Subscribe">Subscribe For Our Daily Message
@endguest

<br>
<button type="submit" class=" btn btn-success w-25 ml-5" id="comment_btn">Post</button>
</form>

     </div>
@endsection
        <script src="{{asset('script/jquery.js')}}"></script>
<script>
   $(document).ready(function() {
     $('#comment_btn').on('click', function(s) {
        s.preventDefault()
         let sub=document.querySelector("#sub").checked
         console.log(sub)
if (sub) {
 sub='yes';
}
         let name = $('#name').val();
         let email = $('#email').val();
         let comment = $('.user_comment').val()
         let parent_id=$("#parent_id").val();

              let fake_email=$("#fake_email").val();

    let parent_real_id=$("#parent_real_id").val()
         $.ajax({
             url: "http://zylerblog.com.cleverapps.io/comment",
             type: "get",
             data: {
                 "_token": "{{csrf_token()}}",
                 id:"{{$post->id}}",
                 user_name: name,
                 email: email,
                 comment: comment,
                 password:$('#pass').val(),
                 parent_id:parent_id,
                 parent_real_id:parent_real_id,
                 sub:sub,
fake_email:fake_email
                },
             success: function(response) {
$("#comment").trigger('reset');
                if (response == "Email Or Name Taken") {
              $("#u_message").show();
                   $("#u_message").text(response);
                }else{
             $("#u_message").hide();
        $(".comments_holder").html(response)
                $("#nameErr").text('')
                 $("#emailErr").text('');
                 $("#commentErr").text('');
                   $('#name').val(name);
          $('#email').val( email);
             }},
             error: function(response) {
                    if(response.responseJSON.errors.user_name) $("#nameErr").text("This Field Is Required");
              if(response.responseJSON.errors.email)   $("#emailErr").text("Enter A Valid Email");
              if(response.responseJSON.errors.comment) $("#commentErr").text("This Field Is Required");

             }

         })
     })

//getting comment
get_comment();
function get_comment() {
 $.ajax({
    url: "http://zylerblog.com.cleverapps.io/getComment",
             type: "GET",
             data: {
                 "_token": "{{csrf_token()}}",

                 id:"{{$post->id}}",

             },
             success:function(respo){
   $(".comments_holder").html(respo)

             }
 })
}






let replies=$(document).on('click','.reply-btn',function(params) {
    $('#name').focus();

      $("#fake_email").val(this.getAttribute("to_email"));
$('#parent_id').val(this.id)
    let real_id= this.getAttribute('user');
        $('.surt').show()
$(".reply_to").text('replying to '+this.getAttribute("to") +"...");

$("#cancel_reply").show()

$("#parent_id").value=parent_id;
$("#parent_real_id").val(real_id);
})

//cancel reply

   $(document).on('click','#cancel_reply',function() {
    $("#parent_id").val(0);
    $('.surt').hide()
   })

   let edit=$(document).on('click','#edit-btn',function(params) {
    this.style.display="none";
let parent=this.parentElement;
parent.querySelector(".comment-content").style.display="none"
parent.querySelector(".comment_edit").style.display="block"

parent.querySelector(".Edit_comment").style.display="block"
parent.querySelector(".comment_edit").focus()



})
$(document).on('click','.Edit_comment',function(params) {
  let parent=this.parentElement;
let input=parent.querySelector(".comment_edit").value;
let come_id=this.getAttribute("come_id");
$.ajax({
    url: "https://zylerblog.com.cleverapps.io/editComment",
             type: "GET",
             data: {
                 "_token": "{{csrf_token()}}",
                id:come_id,
                 value:input,

             },
             success:function(respo){
   parent.querySelector(".comment-content").style.display="block"
   parent.querySelector(".comment-content").innerHTML=input;
parent.querySelector(".comment_edit").style.display="none"
parent.querySelector("#edit-btn").style.display="inline-block"
             }
 })

this.style.display="none"
   })


 })
</script>
