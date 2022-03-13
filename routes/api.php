<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Api\UserController; 
//use App\Http\Controllers\Api\EventController; 


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Route::get('/getcategory', 'App\Http\Controllers\Admin\CategoryController@getcategory');
//test files
Route::post('signup', 'App\Http\Controllers\Api\UserController@signup');
Route::post('signin', 'App\Http\Controllers\Api\UserController@signin');
Route::post('signout', 'App\Http\Controllers\Api\UserController@signout');
Route::post('forgotpassword', 'App\Http\Controllers\Api\UserController@forgotpassword');
Route::post('eventbooking', 'App\Http\Controllers\Api\UserController@eventbooking');
Route::post('profileupdate', 'App\Http\Controllers\Api\UserController@profileupdate');

Route::post('addusertag', 'App\Http\Controllers\Api\UserController@addusertag');
Route::post('userdetails', 'App\Http\Controllers\Api\UserController@index');
Route::get('getallevent', 'App\Http\Controllers\Api\EventController@index');

Route::post('getspeakerbyeventid', 'App\Http\Controllers\Api\EventController@getspeakerbyeventid');
Route::post('getsponsorbyeventid', 'App\Http\Controllers\Api\EventController@getsponsorbyeventid');
Route::post('getagendabyeventid', 'App\Http\Controllers\Api\EventController@getagendabyeventid');
Route::post('getattendeesbyeventid', 'App\Http\Controllers\Api\EventController@getattendeesbyeventid');
Route::get('getallattendees', 'App\Http\Controllers\Api\UserController@getallattendees');
Route::post('getexhibitorbyeventid', 'App\Http\Controllers\Api\EventController@getexhibitorbyeventid');
