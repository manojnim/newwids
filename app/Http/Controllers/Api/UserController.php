<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use App\Models\Admin\Booking;
use App\Models\Admin\Userhashtag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use CodeItNow\BarcodeBundle\Utils\QrCode;
use File;
use Mail;

class UserController extends Controller
{
     public  $downloadqrs;
     public  $datas = "data:";
     public $bases = ";base64,";


  public function index(Request $request)
  {

      $usertags = Userhashtag::where(['userhashtagUserid'=>$request->post('userId')])->get();
      if(count($usertags) != 0)
      {
         $user = User::join('userhashtags','userhashtags.userhashtagUserid','users.userId')->where(['userId'=>$request->post('userId')])->get();
      }else{
       $user = User::where(['userId'=>$request->post('userId')])->get();  
      }
   
      return response()->json(['status'=>"true","message"=>"User all details" ,'data'=>$user ],200);

  }
    
	public function signin(Request $request)
	{
            $user = New User;
        $email = $request->post('userEmail');
        $password = $request->post('userPassword');
        $result = User::where(['userEmail'=>$email])->first();
            
         if($result){

             if(Hash::check($request->post('userPassword'),$result->userPassword))
             {
                           
                   $user = User::find($result['userId']);
                   $user->userFcm_token = $request->post('userFcm_token');
                   $user->save();

              return response()->json(['status'=>"true","message"=>"Login successfully" ,'data'=>$result ],200);

               
             }else{
             
              return response()->json(['status'=>"true","message"=>"Please enter valid password"],200);

             }   
               
         }else{
         	return response()->json(['status'=>"true","message"=>"User not found, please signup"],401);

         }

		
	}


	public function signout(Request $request)
	{
		 $user = New User;
		 $user = User::find($request->post('userId'));
         $user->userFcm_token = NULL;
         $user->save();
         return response()->json(['status'=>"true","message"=>"Logout successfully"],200);
	}


	public function signup(Request $request)
	{
      
      $user = New User;

    // echo $request->post('userEmail');
      $checkUser = DB::table('users')->where(['userEmail'=>$request->post('userEmail')])->get();

      
      if(count($checkUser) != 1)
      {
         $code = random_int(100000, 999999);
            
          $user->userFirstname = $request->post('userFirstname');
          $user->userLastname = $request->post('userLastname');
          $user->userEmail = $request->post('userEmail');
          $user->userCode = $code;
          $user->userFcm_token = $request->post('userFcm_token');
          $user->userPassword = Hash::make($request->post('userPassword'));
          $user->userCreated_at = date('d-m-y h:i a');

           $userQrcode1 = array(
              'userFirstname'=>$request->post('userFirstname'),
              'userLastname'=>$request->post('userLastname'),
              'userEmail'=>$request->post('userEmail'),
              'userCode'=> $code,
            );

           
            $Arrevent = json_encode($userQrcode1);
            $qrCode = new QrCode();
            $qrCode->setText($Arrevent)
              ->setSize(300)
              ->setPadding(10)
              ->setErrorCorrection('high')
              ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
              ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
              ->setLabel($code)
              ->setLabelFontSize(25)
              ->setImageType(QrCode::IMAGE_TYPE_PNG);
          $user->userQrcode = $this->datas.''.$qrCode->getContentType().''.$this->bases.''.$qrCode->generate();
          $user->save();
          $msg = "Register successfully";

      }else{
           $msg = "User already exists";
           $user = $request->post('userEmail');
      }

        return response()->json(['status'=>"true","message"=>$msg ,'data'=>$user ],200);
       

		
	}



	public function forgotpassword(Request $request)
	{
        $checkUser = DB::table('users')->where(['userEmail'=>$request->post('userEmail')])->get();
      
        
       
      if(count($checkUser) != 0)
      {
		    $data = ['name'=>"Demo Mail"]; 
    	  $user['to'] = $request->post('userEmail');
        Mail::send('forgotpassword',$data, function($messages) use ($user){
       	$messages->to($user['to']);
       	$messages->subject('Forgot password');
       });

       $msg ="Email with password reset link has been sent";	

     }else{
         $msg ="User with this email does not exist";
     }
	 return response()->json(['status'=>"true","message"=>$msg ],200);
	
	}


  public function eventbooking(Request $request)
  {
      
          $user = New User;
          $user = User::find($request->post('userId'));
          $user->userFirstname = $request->post('userFirstname');
          $user->userLastname = $request->post('userLastname');
          $user->userEmail  = $request->post('userEmail');
          $user->userPhone = $request->post('userPhone');
          $user->userPosition = $request->post('userPosition');
          $user->userWhatsappno = $request->post('userWhatsappno');
          $user->userGender = $request->post('userGender');
          $user->userAge = $request->post('userAge');
          $user->userPincode = $request->post('userPincode');
          $user->userOrganization = $request->post('userOrganization');
          $user->userTotalexp = $request->post('userTotalexp');
          $user->userTotalexpaimlds = $request->post('userTotalexpaimlds');
          $user->userVaccinationstatus = $request->post('userVaccinationstatus');
          $user->userVaccination = $request->post('userVaccination');
          $user->userQuestion = $request->post('userQuestion');
          $user->userTicketcat = $request->post('userTicketcat');
          $user->userIpaddress = request()->ip();
          $user->save();
          $msg = "Booking event successfully";


           $bookingevent = array(
              'userid'=>$request->post('userId'),
              'eventid'=>$request->post('eventId')
            );

           $booking = New Booking;
           $Arrevent = json_encode($bookingevent);
          $qrCode = new QrCode();
          $qrCode->setText($Arrevent)
              ->setSize(300)
              ->setPadding(10)
              ->setErrorCorrection('high')
              ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
              ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
              ->setLabel('Scan Qr Code')
              ->setLabelFontSize(25)
              ->setImageType(QrCode::IMAGE_TYPE_PNG);

            preg_match_all('!\d+!', $request->post('userTicketcat'), $matches);
            $number = implode(' ', $matches[0]);
            $booking->bookingAmount = $number;
            $booking->bookingUserid = $request->post('userId');
            $booking->bookingEventid = $request->post('eventId');
            $booking->bookingQrcode = $this->datas.''.$qrCode->getContentType().''.$this->bases.''.$qrCode->generate();
            $booking->save();   
           
        return response()->json(['status'=>"true","message"=>$msg ,'data'=>$user ],200);
       

    
  }

  public function profileupdate(Request $request)
  {
     
            $user = New User;
            $user = User::find($request->post('userId'));
            $rand_val = date('ymdhis') . rand(11111, 99999);

          if($request->hasfile('userProfilepic'))
          {
            // if($request->post('userId') > 0)
            // {
              $arrImage = DB::table('users')->where(['userId'=>$request->post('userId')])->get();

              if(File::exists(public_path().'/user/'.$arrImage[0]->userProfilepic)){
                   File::delete(public_path().'/user/'.$arrImage[0]->userProfilepic);

              }

            //}
                 $image = $request->file('userProfilepic');

                $ext = $image->extension();
                $image_name = $rand_val.'.'.$ext;
                $image->move(public_path().'/user/',$image_name);
                $user->userProfilepic=$image_name;

          }  

       

          $user->userFirstname = $request->post('userFirstname');
          $user->userLastname = $request->post('userLastname');
          $user->userEmail  = $request->post('userEmail');
          $user->userPhone = $request->post('userPhone');
          $user->save();
        
        return response()->json(['status'=>"true","message"=>"Profile update successfully" ,'data'=>$user ],200);


  }


  public function addusertag(Request $request)
  {
    $userhashtag = New Userhashtag;

     $userhashtag->userhashtagUserid  = $request->post('userId');
     $userhashtag->userhashtagTag = $request->post('userTag');
     $userhashtag->userhashtagCreated_at = date('d-m-y h:i a');
     $userhashtag->save();
      return response()->json(['status'=>"true","message"=>"Add tags successfully" ,'data'=>$userhashtag ],200);

  }


  public function getallattendees()
  {
      $users = DB::table('users')->where(['userType'=>0])->get();
       return response()->json(['status'=>"true","message"=>"All attendees successfully" ,'data'=>$users ],200);
  }



	
    
}
