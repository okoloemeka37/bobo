@extends('layout.side')

 <style>
@media screen and (max-width: 767px) {
   .profile{
    display:none ;
   }
   }
</style>
@section('main')


<p class="page_type" id="email-page"></p>
<div>
<div class="btn btn-primary " id="next" >Next</div>

<div class="btn btn-primary "id="back" >Back</div>
<div class="user-h w-75 ml-5 mr-5">
 <p>Choose Receiver</p>
<?php
$count=0;
foreach ($users as $user) {
$count++ ?>
<div class="d-flex user-list justify-content-between pr-5">
    <p class="ml-4">{{$count}}</p>
    <p  class="ml-4">{{$user->name}}</p>
    <p class="ml-4">{{$user->email}}</p>
    <p class="ml-4 mt-2"><input type="checkbox" class="ind-send" checked value="{{$user->id}}"></p>
</div>

<?php }?>
</div>
<div class="e-form w-75  ">
    <h2 class="text-center text-dark font-italic mt-4">Create Email</h2>

<form action="http://zylerblog.com.cleverapps.io/boboandbabe/sendemail" method="post" class="">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

<input type="hidden" name="id" id="hold_email">
<label for="">Subject:</label>
<input type="text" name="subject" id="" class="form-control w-100">
@error('subject')
<p class="text-danger">{{$message}}</p>
@enderror
    <label for="" class="mt-3">Content</label>
    <div class="content-area w-100">
  <textarea name="content" id="" cols="20" rows="10" class="form-control w-75"></textarea>

  @error('content')
<p class="text-danger">{{$message}}</p>
@enderror
</div>

 <br>
    <button type="submit" class="btn btn-success w-50" id="send-email">send</button>
</form>
</div>
</div>

<script>
         CKEDITOR.replace('content');
</script>
@endsection
