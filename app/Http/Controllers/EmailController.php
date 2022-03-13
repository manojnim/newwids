<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class EmailController extends Controller
{
    public function index()
    {
    	$data = ['name'=>"jeet kumar", 'data'=>"Hello jeet"]; 
    	$user['to'] ='jeet044@gmail.com';
        Mail::send('email',$data, function($messages) use ($user){
       	$messages->to($user['to']);
       	$messages->subject('Hello Worlds'); 
       });	

        //return view('email');
    }
}
 