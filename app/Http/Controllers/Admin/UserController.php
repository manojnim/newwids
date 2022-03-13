<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use App\Models\Admin\Userrole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use File;
class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        return view('admin.login');
       

    }

    public function auth(Request $request)
    {
    	$request->validate([
              'userEmail'=>'required',
              'userPassword'=>'required'
             ]);


    	 $email = $request->post('userEmail');
        $password = $request->post('userPassword');
        
        $result = User::where(['userEmail'=>$email])->first();
  
         if($result){

             if(Hash::check($request->post('userPassword'),$result->userPassword))
             {
               $request->session()->put('ADMIN_LOGIN',true);
               $request->session()->put('ADMIN_ID',$result->userId);
               $request->session()->put('ADMIN_TYPE',$result->userType);
               $request->session()->put('ADMIN_PIC',$result->userProfilepic);
               $request->session()->put('ADMIN_NAME',$result->userFirstname);

               return redirect('admin/dashboard');
             }else{
               $request->session()->flash('error','Please enter valid login details');
               return redirect('admin');
             }   
               
         }else{
              $request->session()->flash('error','Please enter valid login details');
              return redirect('admin');
         }

    }
 
  public function indexu(Request $request)
  {
        $result['data'] = User::join('userroles', 'userroles.roleId', 'users.userType')->where('users.userType' ,'!=',0)->get();

        return view('admin.user',$result);
       

  }


    public function manage_user(Request $request, $id='')
    {    
           if($id > 0 )
           {
               $arr = User::where(['userId'=>$id])->get();
              $result['userFirstname'] = $arr['0']->userFirstname;
              $result['userLastname'] = $arr['0']->userLastname;
              $result['userEmail'] = $arr['0']->userEmail;
              $result['userProfilepic'] = $arr['0']->userProfilepic;
              $result['userPhone'] = $arr['0']->userPhone;
              $result['userPosition'] = $arr['0']->userPosition;
              $result['userType'] = $arr['0']->userType;
              $result['userPassword'] = $arr['0']->userPassword;
              $result['userId'] = $arr['0']->userId;
              $result['user'] = DB::table('users')->where('userId','!=',$id)->get();
           }else{
              $result['userFirstname']='';
              $result['userLastname']='';
              $result['userEmail']='';
              $result['userProfilepic']='';
              $result['userPhone']='';
              $result['userPosition']='';
              $result['userType']='';
              $result['userPassword']='';
              $result['userId']='';
              $result['user'] = DB::table('users')->where(['userStatus'=>1])->get();
           }
          $result['type'] = DB::table('userroles')->where('roleStatus','=','1')->get();

        return view('admin.manage_user', $result);
    } 

    public function store(Request $request, $id='')
    {

       if($request->post('id') > 0)
       {
        $imgs = 'mimes:jpeg,jpg,png|max:2048';
        $ps ='';
        
       }else{
         $imgs = 'required|mimes:jpeg,jpg,png|max:2048';
          $ps ='required';
         
       }
          
        
           $request->validate([
         'userFirstname'=>'required',
         'userLastname'=>'required',
         'userEmail'=>'required',
         'userProfilepic'=> $imgs,
         'userPhone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
         'userPosition'=>'required',
         'userPassword'=>$ps,
         'userType'=>'required'
         

        ]);

       

       
       

        if($request->post('id') >0)
         {
            $user = User::find($request->post('id'));
            $msg ='User updated successfully';
         }else{
            $user = new User;
            $msg ='User added successfully';

         }

          if($request->hasfile('userProfilepic'))
          {
            if($request->post('id') >0)
            {
              $arrImage = DB::table('users')->where(['userId'=>$request->post('id')])->get();
              if(File::exists(public_path().'/user/'.$arrImage[0]->userProfilepic)){
                  File::delete(public_path().'/user/'.$arrImage[0]->userProfilepic);

              }

            }
                $image = $request->file('userProfilepic');
                $ext = $image->extension();
                $image_name = time().'.'.$ext;
               
               $image->move(public_path().'/user/',$image_name); 
                $user->userProfilepic=$image_name;


          }  
            

          $user->userFirstname=$request->post('userFirstname');
          $user->userLastname=$request->post('userLastname');
          $user->userEmail =$request->post('userEmail');
          $user->userPhone=$request->post('userPhone');
          $user->userPosition=$request->post('userPosition');
          $user->userType=$request->post('userType');
          $user->userPassword=Hash::make($request->post('userPassword'));
          $user->userCreated_at = date('Y-m-d H:i:s');
          $user->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/user');

    }

     public function delete(Request $request,$id)
    {
        $model = User::find($id);

        if(File::exists(public_path().'/user/'.$model['userProfilepic'])){
          File::delete(public_path().'/user/'.$model['userProfilepic']);

        }

        

        $model->delete();
        $request->session()->flash('message','User delete successfully');
          return redirect('admin/user');
    }

  
    public function status(Request $request,$status,$id){
        $model=User::find($id);
        $model->userStatus=$status;
        $model->save();
        $request->session()->flash('message','User status updated');
        return redirect('admin/user');
    }


    public function dashboard(Request $request)
    {
    	return view('admin.dashboard'); 
    }







    // public function updatepassword(Request $request)
    // {
    //   $request = DB::table('users')->where(['userId'=>1])->get();
    //    User::where('userId', 1)
    //    ->update([
    //        'userPassword' => Hash::make('123123')
    //     ]);
     
    // }

   
}
