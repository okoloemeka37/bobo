<?php

use App\Http\Controllers\aboutControl;
use App\Http\Controllers\auth;
use App\Http\Controllers\blogControl;
use App\Http\Controllers\commentControl;
use App\Http\Controllers\comments_userControl;
use App\Http\Controllers\dashController;
use App\Http\Controllers\galleryControl;
use App\Http\Controllers\get_commentControl;
use App\Http\Controllers\historyControl;
use App\Http\Controllers\homeController;
use App\Http\Controllers\photoControl;
use App\Http\Controllers\postControl;
use App\Http\Controllers\sendEmailcontrol;
use App\Http\Controllers\settingsControl;
use App\Http\Controllers\user_controller;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[blogControl::class,'index'])->name('home');
 Route::get('/post{post}',[postControl::class,'show'])->name('post_show');


 
                     //comment section

      Route::get('/comment',[commentControl::class,'store'])->name('cs'); 
Route::get('/getComment',[get_commentControl::class,'get_come']);
// deleting comment
Route::get("/deleteComment/{comment}",[get_commentControl::class,'del_comment'])->name('del_comment');
//editing comment
Route::get("/editComment",[get_commentControl::class,'edit_comment'])->name('edit_comment');



Route::get('/user{user}',[comments_userControl::class,'user_activity'])->name('user_activity');
Route::middleware('guest')->group(function()
{
    Route::get('/login',[auth::class,'login_index'])->name('login.show');
      Route::post('/loginPost',[auth::class,'login_store'])->name('login.store');

});
//blog page
 Route::post('/logout',[auth::class,'logout'])->name('logout');
   
Route::get('/',[blogControl::class,'index'])->name('blog_index');

Route::group(['middleware'=>['is_admin']],function (){


   
  Route::get('/admin/create_post',[postControl::class,'index'])->name('post_create');
    Route::post('/admin/create_post',[postControl::class,'store'])->name('post_store');



  Route::get('/admin/posts_tem',[postControl::class,'all'])->name('all_post');
//delete post
    Route::delete('/admin/post/{post}',[postControl::class,'del'])->name('delete.post');
 
       


    //getting history
        Route::get('/admin/history',[historyControl::class,'index'])->name('history.index');

        //edit post
             Route::get('/admin/post/{post}',[postControl::class,'edit_form'])->name('edit_form');

                     Route::put('/admin/post/{post}',[postControl::class,'update'])->name('update');
    //restoring deleted post   
Route::get('/admin/post_restore/{post}',[historyControl::class,'restore_post'])->name('restore_post');

//removing deleted post from history

Route::get('/admin/del_user/{user}',[historyControl::class,'del_user'])->name('del_user');

Route::get('/admin/post_remove/{post}',[historyControl::class,'remove'])->name('remove_history');

//dashboard area
//getting all post
 Route::get('/boboAndBaeAdmin',[dashController::class,'admin'])->name('dashboard');
 Route::get('/admin/post_page',[dashController::class,'post_page'])->name('post_page');
 //getting each post comment
Route::get('/admin/post/comment/{post}',[dashController::class,'comments'])->name('preview');
//removing post comment
Route::get('/admin/post/remove_comment/{comment}',[dashController::class,'remove_comment'])->name('remove_comment');



// users_operate

Route::get('/admin/users',[user_controller::class,'index'])->name('user_index');

Route::get('/admin/remove_user/{user}',[user_controller::class,'remove'])->name('remove_user');

Route::get('/admin/restore_user/{user}',[historyControl::class,'restore_user'])->name('restore_user');



//send email to user
Route::get('/boboandbabe/useremail',[sendEmailcontrol::class,'index'])->name('email_user');

Route::post('/boboandbabe/sendemail',[sendEmailcontrol::class,'send_email'])->name('send_email');

// settings page
Route::get('/boboandbabe/settings',[settingsControl::class,'index'])->name('show_set');

Route::post('/boboandbabe/update_person',[settingsControl::class,'update_person'])->name('up_person');

Route::post('/boboandbabe/update_password',[settingsControl::class,'update_password'])->name('up_password');



Route::post("/admin/postmaker",[postControl::class,'ck'])->name('ckeditor.upload');
});

//about And Contact 
Route::get("/AboutUs",[aboutControl::class,'show'])->name('about_show');


Route::get("/contactUs",[aboutControl::class,'contact_show'])->name('contact_show');

//message
Route::post("/message",[aboutControl::class,'message'])->name('message');

//check_email


//forgot password

Route::get("/boboandbabe/forgot_password",[settingsControl::class,'forgot_show'])->name('forgot_show');
Route::post("/boboandbabe/forgot_password",[settingsControl::class,'forgot_password'])->name('forgot_password');
Route::get('/check_email',[settingsControl::class,'check_email']);

Route::get('/check_token',[settingsControl::class,'check_token']);

Route::get("/new_password",[settingsControl::class,'n_pass']);


//life-search
Route::get("/life-search",[blogControl::class,'life_search'])->name('ds');