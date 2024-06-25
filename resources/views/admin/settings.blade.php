 
@extends('layout.side')


@section('main')
   <style>
@media screen and (max-width: 767px) {
   .profile{
    display:none ;
   }
   }
</style>
 <p class="page_type" id="settings-page"></p>
 <div class="w-75"> 
         <div class="change_set">
      
<h2 class="btn btn-primary ">Personality Settings</h2>
   
         <form action="{{route('up_person')}}" method="post" enctype="multipart/form-data">

        <div> 

<label for="">Name:</label>
            <input type="text" name="name" placeholder="Name"class="form-control w-75" value="{{auth()->user()->name}}">
@error('name')
         <p class="text-danger">This Field Is Required</p>
@enderror

            <label for="">Email:</label> 
           <input type="email" name="email" placeholder="Email"class="form-control w-75" value="{{auth()->user()->email}}">
@error('email')
         <p class="text-danger">This Field Is Required And Must Be A Valid Email</p>
@enderror

 <input type="file" name="image" id="" class="file hide"> <br>
<p class="btn btn-warning" id="fake-btn">Upload Image</p>
 <input type="hidden" name="fake_img" value="{{auth()->user()->image}}">


  <img src="" alt="" class="show_img w-5 none">        
</div>
    <button type="submit" class="btn" name="person">Save</button> 
      </form> 

    </div>    
    <hr>
      <h2 class="btn btn-primary mt-3" id="c_password">Change Password</h2>
      <br>
              @if(session('success_password'))
<div class="bg-success pl-3 mb-3 d-flex w-75 justify-content-between pr-5">{{session('success_password')}}
    <span id="close" class="close text-light ">X</span></div>
      @endif  

<div class="change_pass play">
   <form action="{{route('up_password')}}" method="post">
 
 


      @csrf
      <label for="">Enter Old Password</label>
      <input type="password" name="old_password" id="" class="form-control w-75" placeholder="Old Password">
      @error('old_password')
         <p class="text-danger">This Field Is Required</p>
@enderror

      <label for="">Enter New Password</label>
      <input type="password" name="password" id="" class="form-control w-75"  placeholder="New Password">
      @error('password')
         <p class="text-danger">Password Must Be Greater Than 8 Character</p>
@enderror
<label for="">Confirm Password</label>
  <input type="password" name="password_confirmation" id="" class="form-control w-75"  placeholder="Confirm Password">
      @error('password')
         <p class="text-danger">Password And Confirm Password Do Not Match</p>
@enderror
 <p class="d-inline"><a href="{{route('forgot_show')}}">forgot password</a></p>
 <br>
      <button type="submit" class="btn btn-dark mt-3">Save</button>
   </form>
  
</div>
<br>
    <p class="btn btn-primary mt-3"><a href="" class="text-light">Add Author User</a></p> 
   </div>
   
    @endsection

  
 
 
 

   
