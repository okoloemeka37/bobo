@extends('layout.pub_nav')

@section('content')
<h4 class="text-center">We Are Here To Help</h4>
<small class="text-center">take the following steps to recover your account</small>
<h5 class="text-center pt-4 head" style="display:none;">We Have Sent You A Security Token To Your  Email Address</h5>
<div class="check_email">
  <h5 class="text-center"><i>Step 1</i></h5>
  <form action="" method="post" class="check centered mb-5 mt-5">
 @csrf

     <label for="">Enter Email</label>
 <input type="email"class="form-control w-50 "  id="email" placeholder="Email" required>

 <p class="text-danger" id="email_err"></p>

  <button type="submit" class="btn btn-primary" id="email_check">Continue</button>
</form>

</div>













<form action="" method="post" class="centered login mt-5" id="token_form">
  <h5><i>Step 2... Almost there!!!</i></h5>
@csrf

    <label for="">Enter Token</label>
 <input type="text"class="form-control w-50 token" name="token">
  
  <p class="text-danger " id="token_err"></p>
  
<input type="hidden" name="" class="email">

    <button type="submit" class="btn btn-primary mt-3" id="token_btn">Continue</button>
<br>
  <a href="" class="">send again</a>
</form>


<form action="" method="post" class="centered login mt-5 c_pass" style="display: none;">
  <h5 class="text-center"><i>Final Step</i></h5>
@csrf

<h4>Change Password</h4>

@if(session('status'))

<div class="btn btn-danger w-50">{{session('status')}}</div>
@endif
<br>


    <label for="">Enter New Password</label>
 <input type="password"class="form-control w-50 password" placeholder="Password"> 
<label for="">Confirm Password</label>
  <input type="password"class="form-control w-50 con_pass"  placeholder="Confirm password"> 
 
 
  <p class="text-danger " id="change_err"></p>

<input type="hidden" name="email" class="email">

    <button type="submit" class="btn btn-primary mt-3"  >Done</button>

</form>



        <script src="{{asset('script/jquery.js')}}"></script> 
<script> 
document.querySelector("#token_form").style.display="none"
$('#email_check').on('click',function (e) {
 e.preventDefault() 
let email=$("#email").val()
if (email.length !=0 ) {
  
 $.ajax({
             url: "{{url('/check_email')}}",
             type: "get",
             data: {
                 "_token": "{{csrf_token()}}",
                
                 email: email,
              
             },
             success: function(response) {
 if (response == "Email Not Found") {
  $("#email_err").html(response)
}else{
$(".email").val(email) 
document.querySelector(".check_email").style.display="none"
document.querySelector("#token_form").style.display="block"

document.querySelector(".head").style.display="block"
} 
    
             },
            

         }) 
}else{    $("#email_err").html("Enter Email")}
 
         })

   $("#token_form").on('submit',function (e) {
    e.preventDefault();
    let token=$(".token").val();
    let email=$(".email").val();
    if (token.length !=0) {
      

   $.ajax({
             url: "{{url('/check_token')}}",
             type: "get",
             data: {
                 "_token": "{{csrf_token()}}",
               token:token, 
                 email: email,
              
             },
           success:function(response){
      
 if (response == "Invalid Token") {
  $("#token_err").html(response)
}else{
 
document.querySelector(".check_email").style.display="none"
document.querySelector("#token_form").style.display="none"

document.querySelector(".head").style.display="none"

document.querySelector(".c_pass").style.display="block"
}  
           }
   })

    }else{
  $("#token_err").html("Enter Token")
    }

   })      




//change password




 $(".c_pass").on('submit',function (e) {
    e.preventDefault();
     $("#change_err").hide()
    let password=$(".password").val();
let c_pass=$(".con_pass").val()
    let email=$(".email").val();
    if (password.length < 8) {
  $("#change_err").html("Password length must be greater than or equal 8 characters")

    }else{


   $.ajax({

             url: "{{url('/new_password')}}",
             type: "get",
             data: {
                 "_token": "{{csrf_token()}}",
              password:password,
              password_confirm:c_pass,
                 email: email,
              
             },
           success:function(response){
      $("#change_err").show() 
if(response !="not"){
       $("#change_err").text(response);
}else{
window.location.replace("/");   
    
}
 
           },
            
   })
    }

   })      


         </script>

@endsection