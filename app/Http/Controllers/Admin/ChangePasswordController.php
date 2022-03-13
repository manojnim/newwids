<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
 
class ChangePasswordController extends Controller
{
       
	  public function index(Request $request)
	  {
	      return view('admin.changepassword');
	  } 

    public function changePassword(Request $request)
    {
        $request->validate([
          'current_password' => 'required',
          'userPassword' => 'required',
          'password_confirmation' => 'required',
        ]);

        $user =  User::find(session()->get('ADMIN_ID'));

        if (!Hash::check($request->current_password, $user->userPassword)) {
            return back()->with('error', 'Current password does not match!');
        }

        $user->userPassword = Hash::make($request->userPassword);
        $user->save();

        return back()->with('success', 'Password successfully changed!');
    }

    
}
