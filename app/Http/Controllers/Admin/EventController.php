<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Event;
use Illuminate\Support\Facades\DB;
use CodeItNow\BarcodeBundle\Utils\QrCode;

use File;
class EventController extends Controller
{

     public  $downloadqrs;
     public  $datas = "data:";
     public $bases = ";base64,";
    public function index(Request $request)
    {
         
        $result['data'] = Event::join('users','users.userId','=','events.eventOrganizer_id')
          ->join('categories','categories.categoryId','=','events.eventCategory_id')->get();
        // $result['data'] = Event::all();
       
       
       return view('admin.event',$result);
         
    }
 
    public function manage_event(Request $request,$id='')
    {

         if($id > 0){
            $arr = Event::where(['eventId'=>$id])->get();
              $result['eventName'] = $arr['0']->eventName;
              $result['eventCategory_id'] = $arr['0']->eventCategory_id;
              $result['eventExhibitor_id'] = $arr['0']->eventExhibitor_id;
              $result['eventOrganizer_id'] = $arr['0']->eventOrganizer_id;
              $result['eventDescription'] = $arr['0']->eventDescription;
              $result['eventStarttime'] = $arr['0']->eventStarttime;
              $result['eventEndtime'] = $arr['0']->eventEndtime;
              $result['eventStartdate'] = $arr['0']->eventStartdate;
              $result['eventEnddate'] = $arr['0']->eventEnddate;
              $result['eventBanneroneimg'] = $arr['0']->eventBanneroneimg;
              $result['eventType'] = $arr['0']->eventType;
              $result['eventAmount'] = $arr['0']->eventAmount;
              $result['eventBannertwoimg'] = $arr['0']->eventBannertwoimg;
              $result['eventQrcode'] = $arr['0']->eventQrcode;
              $result['eventLocation'] = $arr['0']->eventLocation;
              $result['eventTwitter'] = $arr['0']->eventTwitter;
              $result['eventFacebook'] = $arr['0']->eventFacebook;
              $result['eventLinkedin'] = $arr['0']->eventLinkedin;
              $result['eventInstragram'] = $arr['0']->eventInstragram;
              $result['eventYoutube'] = $arr['0']->eventYoutube;
              $result['eventSkype'] = $arr['0']->eventSkype;
              $result['eventWechat'] = $arr['0']->eventWechat;

              $result['eventId'] = $arr['0']->eventId;
                 $result['event'] = DB::table('events')->where('eventId','!=',$id)->get();

        }else{ 
                 $result['eventName']='';
                 $result['eventCategory_id'] ='';
                 $result['eventOrganizer_id'] ='';
                 $result['eventExhibitor_id'] ='';
                 $result['eventDescription'] ='';
                 $result['eventStarttime'] ='';
                 $result['eventEndtime'] ='';
                 $result['eventStartdate'] ='';
                 $result['eventEnddate'] ='';
                 $result['eventBanneroneimg'] = '';
                 $result['eventType'] = '';
                 $result['eventAmount'] ='';
                 $result['eventBannertwoimg'] ='';
                 $result['eventQrcode'] ='';
                 $result['eventLocation']='';
                 $result['eventTwitter'] = '';
                 $result['eventFacebook'] = '';
                 $result['eventLinkedin'] = '';
                 $result['eventInstragram'] = '';
                 $result['eventYoutube'] = '';
                 $result['eventSkype'] = '';
                 $result['eventWechat'] = '';
                 $result['eventId'] ='';
                 
            $result['event'] = DB::table('events')->where(['eventStatus'=>1])->get();
           

        }
             $result['exhibitor']=DB::table('exhibitors')->where(['exhibitorStatus'=>1])->get();
            $result['category']=DB::table('categories')->where(['categoryStatus'=>1,'categoryFor'=>1])->get();
            $result['organizer']=DB::table('users')->where(['userType'=>2])->get();
           
        return view('admin.manage_event', $result);
    }

      public function store(Request $request,$id='')
    {

    	   if($request->post('id') > 0)
         {
          $imgs = 'mimes:jpeg,jpg,png|max:2048';
           $imgs1 = 'mimes:jpeg,jpg,png|max:2048';
         }else{
           $imgs = 'required|mimes:jpeg,jpg,png|max:2048';
           $imgs1 = 'required|mimes:jpeg,jpg,png|max:2048';
         }

         
          $request->validate([
           'eventName'=>'required',
           'eventBanneroneimg'=>$imgs,
           'eventCategory_id'=>'required',
           'eventOrganizer_id'=>'required',
           'eventDescription'=>'required',
           'eventStarttime'=>'required',
           'eventEndtime'=>'required',
           'eventStartdate'=>'required',
           'eventEnddate'=>'required',
           'eventType'=>'required',
           'eventLocation'=>'required',
           'eventBannertwoimg'=>$imgs1,
        ]);

         $code = random_int(100000, 999999);

         if($request->post('id') > 0)
         {
            $event = Event::find($request->post('id'));
            $msg ='Event edit successfully';
         }else{
            $event = new Event;
            $msg ='Event add successfully';

         } 
           $rand_val = date('ymdhis') . rand(11111, 99999);

          if($request->hasfile('eventBanneroneimg'))
          {
            if($request->post('id') >0)
            {
              $arrImage = DB::table('events')->where(['eventId'=>$request->post('id')])->get();

              if(File::exists(public_path().'/event/'.$arrImage[0]->eventBanneroneimg)){
                   File::delete(public_path().'/event/'.$arrImage[0]->eventBanneroneimg);

              }

            }
                 $image = $request->file('eventBanneroneimg');

                $ext = $image->extension();
                $image_name = $rand_val.'.'.$ext;
                $image->move(public_path().'/event/',$image_name);
                $event->eventBanneroneimg=$image_name;

          }  

            $rand_val2 = date('ymdhis') . rand(11111, 99999);
          if($request->hasfile('eventBannertwoimg'))
          {
            if($request->post('id') >0)
            {
              $arrImage1 = DB::table('events')->where(['eventId'=>$request->post('id')])->get();

              if(File::exists(public_path().'/event/'.$arrImage1[0]->eventBannertwoimg)){
                   File::delete(public_path().'/event/'.$arrImage1[0]->eventBannertwoimg);

              }

            }
                $image1= $request->file('eventBannertwoimg');
                $ext1 = $image1->extension();
                $image_name1 = $rand_val2.'.'.$ext1;
                $image1->move(public_path().'/event/',$image_name1);
                $event->eventBannertwoimg=$image_name1;


          }  
                
          $event->eventName = $request->post('eventName');
          $event->eventCategory_id =  $request->post('eventCategory_id');
          $event->eventOrganizer_id = $request->post('eventOrganizer_id');
          $event->eventExhibitor_id = $request->post('eventExhibitor_id');
          $event->eventDescription = $request->post('eventDescription');
          $event->eventStarttime = $request->post('eventStarttime');
          $event->eventEndtime = $request->post('eventEndtime');
          $event->eventStartdate = $request->post('eventStartdate');
          $event->eventEnddate = $request->post('eventEnddate');
          $event->eventType = $request->post('eventType');
          $event->eventAmount = $request->post('eventAmount');
          $event->eventLocation = $request->post('eventLocation');
          $event->eventTwitter = $request->post('eventTwitter');
          $event->eventFacebook = $request->post('eventFacebook');
          $event->eventLinkedin =$request->post('eventLinkedin');
          $event->eventInstragram = $request->post('eventInstragram');
          $event->eventSkype = $request->post('eventSkype');
          $event->eventYoutube = $request->post('eventYoutube');
          $event->eventWechat = $request->post('eventWechat');
          $event->eventCode   = $code;
          $event->eventCreated_at = date('Y-m-d H:i:s');
          // if($request->post('id') >0)
          //   {
          //     $newId = $request->post('id');
          //   }else{
          //     $oldid =  DB::table('events')->last()->pluck('eventId ');
          //     $newId = $oldid+1;
          //   }
          $event1 = array(
              'EventId'=>$request->post('id'),
              'eventCode'=>$code,
             'eventName'=>$request->post('eventName'),
             'eventCategory_id'=>$request->post('eventCategory_id'),
             'eventOrganizer_id'=>$request->post('eventOrganizer_id'),
             'eventDescription'=>$request->post('eventDescription'),
             'eventStartdate'=>$request->post('eventStartdate'),
             'eventEnddate'=>$request->post('eventEnddate'),
             'eventStarttime'=>$request->post('eventStarttime'),
             'eventEndtime'=>$request->post('eventEndtime'),
             'eventType'=>$request->post('eventType'),
             'eventAmount'=>$request->post('eventAmount'),
             'eventLocation'=>$request->post('eventLocation')
             
          );
        
         
          $Arrevent = json_encode($event1);
          $qrCode = new QrCode();
          $qrCode->setText($Arrevent)
              ->setSize(300)
              ->setPadding(10)
              ->setErrorCorrection('high')
              ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
              ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
              ->setLabel('Scan Qr Code '.$code)
              ->setLabelFontSize(16)
              ->setImageType(QrCode::IMAGE_TYPE_PNG);

           $event->eventQrcode = $this->datas.''.$qrCode->getContentType().''.$this->bases.''.$qrCode->generate(); 
    
         
    
          $event->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/event');
    }


     public function delete(Request $request,$id)
    {
             
        $model = Event::find($id);

        if(File::exists(public_path().'/event/'.$model['eventBanneroneimg'])){
                   File::delete(public_path().'/event/'.$model['eventBanneroneimg']);

        }

         if(File::exists(public_path().'/event/'.$model['eventBannertwoimg'])){
                   File::delete(public_path().'/event/'.$model['eventBannertwoimg']);

        }
        $model->delete();
        $request->session()->flash('message','Event delete successfully');
          return redirect('admin/event');
    }
 
   public function status(Request $request,$status,$id){
        $model=Event::find($id);
        $model->eventStatus=$status;
        $model->save();
        $request->session()->flash('message','Event status updated');
        return redirect('admin/event');
    }

    public function downloadqrcode(Request $request,$id)
    {
       $result['data'] = Event::find($id)->get('eventQrcode','eventCode');
       return view('admin.downloadqr',$result);


    }


    //  public function attendee($id)
    // {
         
    //     $result['data'] = DB::table('customers')->where(['customerEvent_id'=>$id])
    //      ->leftJoin('users','users.id','=','customers.customerUserid')->get();
       
    //    return view('admin.attendee',$result);
         
    // }


}
