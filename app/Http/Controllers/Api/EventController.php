<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Event;
use App\Models\Admin\Category;
use App\Models\Admin\Speaker;
use App\Models\Admin\Sponsor;
use App\Models\Admin\Agenda;
use App\Models\Admin\Booking;
use App\Models\Admin\Exhibitor;

use Illuminate\Support\Facades\DB;
use CodeItNow\BarcodeBundle\Utils\QrCode;

use File;
class EventController extends Controller
{
   
   public function index(Request $request)
   {
   	 $events = Event::join('categories','categories.categoryId','=','events.eventCategory_id')->get();
     
      return response()->json(['status'=>"true","message"=>"All event list " ,'data'=>$events ],200);

   }

   public function getspeakerbyeventid(Request $request)
   {
        
        $speaker = New Speaker;
        $checkSp = Speaker::where('speakerEvent_id','=',$request->post('eventId'))->get();

        if(count($checkSp) > 0) 
        {

           $speaker = Speaker::where('speakerEvent_id','=',$request->post('eventId'))->get();
              return response()->json(['status'=>"true","message"=>"All Speaker list " ,'data'=>$speaker ],200);

        }else
        {
             return response()->json(['status'=>"true","message"=>"Data not found" ],200);
        }

   }

    public function getsponsorbyeventid(Request $request)
    {
        
        $sponsor = New Sponsor;
        $checkSp = Sponsor::where('sponsorEvent_id','=',$request->post('eventId'))->get();

        if(count($checkSp) > 0) 
        {

           $sponsor = Sponsor::where('sponsorEvent_id','=',$request->post('eventId'))->get();
              return response()->json(['status'=>"true","message"=>"All sponsor list " ,'data'=>$sponsor ],200);

        }else
        {
             return response()->json(['status'=>"true","message"=>"Data not found" ],200);
        }

   }

    public function getagendabyeventid(Request $request)
    {
        
        $agenda = New Agenda;
        $checkSp = Agenda::where('agendaEvent_id','=',$request->post('eventId'))->get();

        if(count($checkSp) > 0) 
        {

           $agenda = Agenda::where('agendaEvent_id','=',$request->post('eventId'))->get();
            $i=0;
           foreach ($agenda as $key => $ads) {
            $ids = explode(',',$ads->agendaSpeaker_id);
         
              for($j=0; $j<count( $ids); $j++){
            
            $speakerd =  DB::table('speakers')->where(['speakerId'=>$ids[$j]])->get();
            $speakerss[$i][$j] = array();
            $speakerss[$i][$j] = array(
                     'speakerId'=>$speakerd[0]->speakerId,
                     'speakerFirstname'=>$speakerd[0]->speakerFirstname,
                     'speakerLastname'=>$speakerd[0]->speakerLastname,
                     'speakerEmail'=>$speakerd[0]->speakerEmail,
                     'speakerPhone'=>$speakerd[0]->speakerPhone,
                     'speakerProfilepic'=>asset('/speaker/'.$speakerd[0]->speakerProfilepic),
                     'speakerLocation'=>$speakerd[0]->speakerLocation,
                     'speakerDesignation'=>$speakerd[0]->speakerDesignation,
                     'speakerAboutus'=>$speakerd[0]->speakerAboutus,
                     'speakerLinkedin'=>$speakerd[0]->speakerLinkedin,
                     'speakerTopic'=>$speakerd[0]->speakerTopic,
                     'speakerDesignation'=>$speakerd[0]->speakerDesignation
                    );
            
                   
              } 
          $i++; 
         
             
           }


           $k = 0;
          foreach ($agenda as $amd)
          {
              
              
               $agendsm[] = array(
                  'agendaId'=>$amd->agendaId,
                  'agendaEvent_id'=>$amd->agendaEvent_id,
                  'agendaSpeaker_id'=>$amd->agendaSpeaker_id,
                  'agendaDate'=>$amd->agendaDate,
                  'agendaStarttime'=>$amd->agendaStarttime,
                  'agendaEndtime'=>$amd->agendaEndtime,
                  'agendaVenue'=>$amd->agendaVenue,
                  'agendaDescription'=>$amd->agendaDescription,
                  'Speakers'=>$speakerss[$k] ,
                
        
        
                );
                
                $k++;
             
          }
              return response()->json(['status'=>"true","message"=>"All agenda list " ,'data'=>$agendsm ],200);

        }else
        {
             return response()->json(['status'=>"true","message"=>"Data not found" ],200);
        }

   }


   public function getattendeesbyeventid(Request $request)
   {
       
       $booking = New Booking;

       $checkBk =  Booking::where('bookingEventid','=',$request->post('eventId'))->get();
        if(count($checkBk) > 0) 
        {

       $bookinglist =  Booking::join('users','users.userId', 'bookings.bookingUserid')->where('bookingEventid','=',$request->post('eventId'))->get();

            return response()->json(['status'=>"true","message"=>"All booking list " ,'data'=>$bookinglist ],200);


        }else{
                       return response()->json(['status'=>"true","message"=>"Data not found" ],200);

        } 


   }

    public function getexhibitorbyeventid(Request $request)
    {
       
       $exhibitor = New Exhibitor;

       $checkEx =  Exhibitor::where('exhibitorEvent_id','=',$request->post('eventId'))->get();
        if(count($checkEx) > 0) 
        {

       $exhibitor =  Exhibitor::where('exhibitorEvent_id','=',$request->post('eventId'))->get();

            return response()->json(['status'=>"true","message"=>"All booking list " ,'data'=>$exhibitor ],200);


        }else{
                       return response()->json(['status'=>"true","message"=>"Data not found" ],200);

        } 


   }
}
