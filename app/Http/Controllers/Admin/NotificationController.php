<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Notification;
use App\Models\Admin\Product;
use App\Models\Admin\User;
use App\Models\Admin\Event;
use Illuminate\Support\Facades\DB;
use File; 
class NotificationController extends Controller
{
    public function index(Request $request)
    {
    	$result['data'] = Notification::all();
       
    	     return view('admin.notification',$result);


    }

    public function manage_notification(Request $request)
    {
    	$result['event'] = DB::table('events')->where('eventStatus','=','1')->get();
       return view('admin.manage_notification',$result); 
    }

    public function store(Request $request)
    {
            if($request->post('notificationType') == "custom")
            {
             $links = 'required'; 
            }else{
              $links = '';
            }

            if($request->post('notificationType') == "event")
            {
             $evts = 'required'; 
            }

            else{
              $evts = '';
            }



        	$request->validate([
             'notificationTitle'=>'required',
             'notificationMessage'=>'required',
             'notificationType'=>'required',
             'notificationId'=>$evts,
             'notificationLink'=>$links,
             'notificationCustom_image'=>'required|mimes:jpeg,jpg,png|max:2048'
        	]);

            
            $notifications = New Notification;
            
            if($request->hasfile('notificationCustom_image'))
            {
	            
	    	    $image = $request->file('notificationCustom_image');
	            $ext = $image->extension();
	            $image_name = time().'.'.$ext;
	            $image->move(public_path().'/notification/',$image_name);
	            $notifications->notificationCustom_image=$image_name;

	        }    

            $notifications->notificationLink=$request->post('notificationLink');
            $notifications->notificationTitle=$request->post('notificationTitle');
            $notifications->notificationMessage =  $request->post('notificationMessage');
            $notifications->notificationType=$request->post('notificationType');
            $notifications->notificationId=$request->post('notificationId');
            $snd = $notifications->save();

      //   if($request->post('notificationId') !='') 
      //   {  
	     //       $firebaseToken = Customer::join('users','users.userId','=','customers.customerUserid')->where('customerEvent_id','=',$request->post('notificationId'))->pluck('userFcm_token')->all();

	     //      $eventname = Event::where('id','=',$request->post('notificationId'))->pluck('eventName')->first();
	     //      $data = [
	     //                "registration_ids" => $firebaseToken,
	     //                "notification" => [
	     //                 "Type" => $request->post('notificationType').'Name'.$eventname,   
	     //                "title" => $request->post('notificationTitle'),
	     //                'image'=>asset('public/notification/'.$image_name),
	     //                "message" => $request->post('notificationMessage'),  
	     //                ]
	     //            ];
      //   }else{

	     //    $firebaseToken = Db::table('users')->pluck('userFCMtoken')->all();

	     //    $data = [
	     //               "registration_ids" => $firebaseToken,
	     //                "notification" => [
	     //                 "Type" => $request->post('notificationType'),
	     //                "title" => $request->post('notificationTitle'),
	     //                'image'=>asset('public/notification/'.$image_name),
	     //                "Link" => $request->post('notificationLink'), 
	     //                "message" => $request->post('notificationMessage'), 
	     //                ]
	     //            ];

      // }

      //      $SERVER_API_KEY = 'AAAAguLRWAM:APA91bGqx-B57e4YBG_L-DOVXEvKpa6S9Zns_-113abaCJo4eFeoXd7o48Fit3Cv8dDE1iWY9UjNn9PmlVhIZCV7y_2T15p25LsY6qOcwoamyaN95JkY30pHLRCr83hMFrmE5KPF-3PY';
  
                
      //           $dataString = json_encode($data);
            
      //           $headers = [
      //               'Authorization: key=' . $SERVER_API_KEY,
      //               'Content-Type: application/json',
      //           ];
            
      //           $ch = curl_init();
              
      //           curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
      //           curl_setopt($ch, CURLOPT_POST, true);
      //           curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      //           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      //           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //           curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                       
      //           $response = curl_exec($ch);
          
        //dd($response);



            // if($snd == "true")
            // {
              $request->session()->flash('message','Send notification successfully');


                return redirect('admin/notification');   
           // }
          


    	

    }  


}
