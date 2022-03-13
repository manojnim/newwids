<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserroleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ChangePasswordController; 
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\PollController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\BrochureController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\HashtagController;
use App\Http\Controllers\Admin\ExhibitorController;


//use App\Http\Controllers\EmailController;
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

// Route::get('/', 'App\Http\Controllers\EmailController@index');


//Route::post('/updatepassword', [UserController::class, 'updatepassword']);
// Route::get('/updatepassword', 'App\Http\Controllers\Admin\UserController@updatepassword');
Route::get('/', 'App\Http\Controllers\Admin\UserController@index');
Route::get('/admin', 'App\Http\Controllers\Admin\UserController@index');
Route::post('admin/auth', 'App\Http\Controllers\Admin\UserController@auth')->name('admin.auth');
Route::group(['middleware'=>'admin_auth'],function(){
Route::get('admin/dashboard', 'App\Http\Controllers\Admin\UserController@dashboard');

Route::get('admin/category', 'App\Http\Controllers\Admin\CategoryController@index');
Route::get('admin/category/manage_category', 'App\Http\Controllers\Admin\CategoryController@manage_category');
Route::post('admin/category/store', 'App\Http\Controllers\Admin\CategoryController@store')->name('category.insert');
Route::get('admin/category/manage_category/{id}', 'App\Http\Controllers\Admin\CategoryController@manage_category');
Route::get('admin/category/status/{status}/{id}', 'App\Http\Controllers\Admin\CategoryController@status');
Route::get('admin/category/delete/{id}', 'App\Http\Controllers\Admin\CategoryController@delete');

Route::get('admin/exhibitor', 'App\Http\Controllers\Admin\ExhibitorController@index');
Route::get('admin/exhibitor/manage_exhibitor', 'App\Http\Controllers\Admin\ExhibitorController@manage_exhibitor');
Route::post('admin/exhibitor/store', 'App\Http\Controllers\Admin\ExhibitorController@store')->name('exhibitor.insert');
Route::get('admin/exhibitor/manage_exhibitor/{id}', 'App\Http\Controllers\Admin\ExhibitorController@manage_exhibitor');
Route::get('admin/exhibitor/status/{status}/{id}', 'App\Http\Controllers\Admin\ExhibitorController@status');
Route::get('admin/exhibitor/delete/{id}', 'App\Http\Controllers\Admin\ExhibitorController@delete');


Route::get('admin/event', 'App\Http\Controllers\Admin\EventController@index');
Route::get('admin/event/manage_event', 'App\Http\Controllers\Admin\EventController@manage_event');
Route::post('admin/event/store', 'App\Http\Controllers\Admin\EventController@store')->name('event.insert');
Route::get('admin/event/manage_event/{id}', 'App\Http\Controllers\Admin\EventController@manage_event');
Route::get('admin/event/status/{status}/{id}', 'App\Http\Controllers\Admin\EventController@status');
Route::get('admin/event/delete/{id}', 'App\Http\Controllers\Admin\EventController@delete');
Route::get('admin/event/downloadqrcode/{id}', 'App\Http\Controllers\Admin\EventController@downloadqrcode');



Route::get('admin/speaker', 'App\Http\Controllers\Admin\SpeakerController@index');
Route::get('admin/speaker/manage_speaker', 'App\Http\Controllers\Admin\SpeakerController@manage_speaker');
Route::post('admin/speaker/store', 'App\Http\Controllers\Admin\SpeakerController@store')->name('speaker.insert');
Route::get('admin/speaker/manage_speaker/{id}', 'App\Http\Controllers\Admin\SpeakerController@manage_speaker');
Route::get('admin/speaker/status/{status}/{id}', 'App\Http\Controllers\Admin\SpeakerController@status');
Route::get('admin/speaker/delete/{id}', 'App\Http\Controllers\Admin\SpeakerController@delete');



Route::get('admin/agenda', 'App\Http\Controllers\Admin\AgendaController@index');
Route::get('admin/agenda/manage_agenda', 'App\Http\Controllers\Admin\AgendaController@manage_agenda');
Route::post('admin/agenda/store', 'App\Http\Controllers\Admin\AgendaController@store')->name('agenda.insert');
Route::get('admin/agenda/manage_agenda/{id}', 'App\Http\Controllers\Admin\AgendaController@manage_agenda');
Route::get('admin/agenda/status/{status}/{id}', 'App\Http\Controllers\Admin\AgendaController@status');
Route::get('admin/agenda/delete/{id}', 'App\Http\Controllers\Admin\AgendaController@delete');





Route::get('admin/product', 'App\Http\Controllers\Admin\ProductController@index');
Route::get('admin/product/manage_product', 'App\Http\Controllers\Admin\ProductController@manage_product');
Route::post('admin/product/store', 'App\Http\Controllers\Admin\ProductController@store')->name('product.insert');
Route::get('admin/product/manage_product/{id}', 'App\Http\Controllers\Admin\ProductController@manage_product');
Route::get('admin/product/status/{status}/{id}', 'App\Http\Controllers\Admin\ProductController@status');
Route::get('admin/product/delete/{id}', 'App\Http\Controllers\Admin\ProductController@delete');
Route::get('admin/product/productimages/{id}', 'App\Http\Controllers\Admin\ProductController@productimages');
Route::get('admin/product/productidelete/{productid}/{id}', 'App\Http\Controllers\Admin\ProductController@productidelete');
Route::get('admin/product/productistatus/{status}/{productid}/{id}', 'App\Http\Controllers\Admin\ProductController@productistatus');


Route::get('admin/user', 'App\Http\Controllers\Admin\UserController@indexu');
Route::get('admin/user/manage_user', 'App\Http\Controllers\Admin\UserController@manage_user');
Route::post('admin/user/store', 'App\Http\Controllers\Admin\UserController@store')->name('user.insert');
Route::get('admin/user/manage_user/{id}', 'App\Http\Controllers\Admin\UserController@manage_user');
Route::get('admin/user/status/{status}/{id}', 'App\Http\Controllers\Admin\UserController@status');
Route::get('admin/user/delete/{id}', 'App\Http\Controllers\Admin\UserController@delete');


Route::get('admin/userrole', 'App\Http\Controllers\Admin\UserroleController@index');
Route::get('admin/userrole/manage_userrole', 'App\Http\Controllers\Admin\UserroleController@manage_userrole');
Route::post('admin/userrole/store', 'App\Http\Controllers\Admin\UserroleController@store')->name('userrole.insert');
Route::get('admin/userrole/manage_userrole/{id}', 'App\Http\Controllers\Admin\UserroleController@manage_userrole');
Route::get('admin/userrole/status/{status}/{id}', 'App\Http\Controllers\Admin\UserroleController@status');

Route::get('admin/changepassword', 'App\Http\Controllers\Admin\ChangePasswordController@index');
Route::post('admin/changepassword', 'App\Http\Controllers\Admin\ChangePasswordController@changePassword')->name('change.password');



Route::get('admin/sponsor', 'App\Http\Controllers\Admin\SponsorController@index');
Route::get('admin/sponsor/manage_sponsor', 'App\Http\Controllers\Admin\SponsorController@manage_sponsor');
Route::post('admin/sponsor/store', 'App\Http\Controllers\Admin\SponsorController@store')->name('sponsor.insert');
Route::get('admin/sponsor/manage_sponsor/{id}', 'App\Http\Controllers\Admin\SponsorController@manage_sponsor');
Route::get('admin/sponsor/status/{status}/{id}', 'App\Http\Controllers\Admin\SponsorController@status');
Route::get('admin/sponsor/delete/{id}', 'App\Http\Controllers\Admin\SponsorController@delete');

Route::get('admin/poll', 'App\Http\Controllers\Admin\PollController@index');
Route::get('admin/poll/manage_poll', 'App\Http\Controllers\Admin\PollController@manage_poll');
Route::post('admin/poll/store', 'App\Http\Controllers\Admin\PollController@store')->name('poll.insert');
Route::get('admin/poll/manage_poll/{id}', 'App\Http\Controllers\Admin\PollController@manage_poll');
Route::get('admin/poll/status/{status}/{id}', 'App\Http\Controllers\Admin\PollController@status');
Route::get('admin/poll/delete/{id}', 'App\Http\Controllers\Admin\PollController@delete');
Route::get('admin/poll/firepoll/{id}', 'App\Http\Controllers\Admin\PollController@firepoll');

Route::get('admin/brochure', 'App\Http\Controllers\Admin\BrochureController@index');
Route::get('admin/brochure/manage_brochure', 'App\Http\Controllers\Admin\BrochureController@manage_brochure');
Route::post('admin/brochure/store', 'App\Http\Controllers\Admin\BrochureController@store')->name('brochure.insert');
Route::get('admin/brochure/manage_brochure/{id}', 'App\Http\Controllers\Admin\BrochureController@manage_brochure');
Route::get('admin/brochure/status/{status}/{id}', 'App\Http\Controllers\Admin\BrochureController@status');
Route::get('admin/brochure/delete/{id}', 'App\Http\Controllers\Admin\BrochureController@delete');



Route::get('admin/video', 'App\Http\Controllers\Admin\VideoController@index');
Route::get('admin/video/manage_video', 'App\Http\Controllers\Admin\VideoController@manage_video');
Route::post('admin/video/store', 'App\Http\Controllers\Admin\VideoController@store')->name('video.insert');
Route::get('admin/video/manage_video/{id}', 'App\Http\Controllers\Admin\VideoController@manage_video');
Route::get('admin/video/status/{status}/{id}', 'App\Http\Controllers\Admin\VideoController@status');
Route::get('admin/video/delete/{id}', 'App\Http\Controllers\Admin\VideoController@delete');





Route::get('admin/notification','App\Http\Controllers\Admin\NotificationController@index');
Route::get('admin/notification/manage_notification','App\Http\Controllers\Admin\NotificationController@manage_notification');
Route::post('notification/notification/store','App\Http\Controllers\Admin\NotificationController@store')->name('notify.insert');




Route::get('admin/hashtag', 'App\Http\Controllers\Admin\HashtagController@index');
Route::get('admin/hashtag/manage_hashtag', 'App\Http\Controllers\Admin\HashtagController@manage_hashtag');
Route::post('admin/hashtag/store', 'App\Http\Controllers\Admin\HashtagController@store')->name('hashtag.insert');
Route::get('admin/hashtag/manage_hashtag/{id}', 'App\Http\Controllers\Admin\HashtagController@manage_hashtag');
Route::get('admin/hashtag/status/{status}/{id}', 'App\Http\Controllers\Admin\HashtagController@status');
Route::get('admin/hashtag/delete/{id}', 'App\Http\Controllers\Admin\HashtagController@delete');
















 



Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_TYPE'); 
        session()->forget('ADMIN_PIC');   
        session()->forget('ADMIN_NAME');
        session()->flash('error','Logout Successfully');
        return redirect('admin');
});

});
