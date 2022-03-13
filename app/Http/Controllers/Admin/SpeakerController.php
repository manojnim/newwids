<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Speaker;
use Illuminate\Support\Facades\DB;
use File; 
class SpeakerController extends Controller
{
    public function index(Request $request)
    {
         
       
            $result['data'] =  Speaker::join('events', 'events.eventId', '=', 'speakers.speakerEvent_id')->get();
      

       return view('admin.speaker',$result);
         
    }
    public function manage_speaker(Request $request,$id='')
    {
            
             if($id > 0){
            $arr = Speaker::where(['speakerId'=>$id])->get();
              $result['speakerEvent_id'] = $arr['0']->speakerEvent_id;
              $result['speakerFirstname'] = $arr['0']->speakerFirstname;
              $result['speakerLastname'] = $arr['0']->speakerLastname;
              $result['speakerHighest_education_qualification'] = $arr['0']->speakerHighest_education_qualification;
              $result['speakerCompanyname'] = $arr['0']->speakerCompanyname;
              $result['speakerEmail'] = $arr['0']->speakerEmail;
              $result['speakerPhone'] = $arr['0']->speakerPhone;
              $result['speakerLocation'] = $arr['0']->speakerLocation;
              $result['speakerDesignation'] = $arr['0']->speakerDesignation;
              $result['speakerAboutus'] = $arr['0']->speakerAboutus;
              $result['speakerLinkedin'] = $arr['0']->speakerLinkedin;
              $result['speakerTopic'] = $arr['0']->speakerTopic;
              $result['speakerProfilepic'] = $arr['0']->speakerProfilepic;
              $result['speakerId'] = $arr['0']->speakerId;
                 $result['speaker'] = DB::table('speakers')->where(['speakerStatus'=>1])->where('speakerId','!=',$id)->get();

        }else{ 
                 $result['speakerEvent_id']='';
                 $result['speakerFirstname'] ='';
                 $result['speakerLastname'] ='';
                 $result['speakerHighest_education_qualification'] ='';
                 $result['speakerCompanyname'] ='';
                 $result['speakerEmail'] ='';
                 $result['speakerPhone'] ='';
                 $result['speakerLocation'] ='';
                 $result['speakerDesignation'] = '';
                 $result['speakerAboutus'] = '';
                 $result['speakerLinkedin'] ='';
                 $result['speakerTopic'] ='';
                 $result['speakerProfilepic'] ='';
                 $result['speakerId'] ='';
            $result['speaker'] = DB::table('speakers')->where(['speakerStatus'=>1])->get();
           

        }
            $result['event'] = DB::table('events')->where(['eventStatus'=>1])->get();
        return view('admin.manage_speaker', $result);


    }

    public function store(Request $request,$id='')
    {
         if($request->post('id') > 0)
         {
          $imgs = 'mimes:jpeg,jpg,png|max:2048';
         }else{
           $imgs = 'required|mimes:jpeg,jpg,png|max:2048';
         }
    	 
          $request->validate([
           'speakerEvent_id'=>'required',
           'speakerFirstname'=>'required',
           'speakerLastname'=>'required',
           'speakerCompanyname'=>'required',
           'speakerEmail'=>'required',
           'speakerPhone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
           'speakerLocation'=>'required',
           'speakerDesignation'=>'required',
           'speakerAboutus'=>'required',
           'speakerProfilepic'=> $imgs,
        ]);

         if($request->post('id') > 0)
         {
            $speaker = Speaker::find($request->post('id'));
            $msg ='Speaker edit successfully';
         }else{
            $speaker = new Speaker;
            $msg ='Speaker add successfully';

         }

          if($request->hasfile('speakerProfilepic'))
          {
            if($request->post('id') >0)
            {
              $arrImage = DB::table('speakers')->where(['speakerId'=>$request->post('id')])->get();
              if(File::exists(public_path().'/speaker/'.$arrImage[0]->speakerProfilepic)){
                  File::delete(public_path().'/speaker/'.$arrImage[0]->speakerProfilepic);

              }

            }
                 $image = $request->file('speakerProfilepic');

                $ext = $image->extension();
                $image_name = time().'.'.$ext;
               $image->move(public_path().'/speaker/',$image_name);
                $speaker->speakerProfilepic=$image_name;

          }  


          
                
          $speaker->speakerEvent_id=$request->post('speakerEvent_id');
          $speaker->speakerFirstname=$request->post('speakerFirstname');
          $speaker->speakerLastname=$request->post('speakerLastname');
          $speaker->speakerHighest_education_qualification=$request->post('speakerHighest_education_qualification');
          $speaker->speakerCompanyname=$request->post('speakerCompanyname');
          $speaker->speakerEmail=$request->post('speakerEmail');
          $speaker->speakerPhone=$request->post('speakerPhone');
          $speaker->speakerLocation=$request->post('speakerLocation');
          $speaker->speakerDesignation=$request->post('speakerDesignation');
          $speaker->speakerAboutus=$request->post('speakerAboutus');
          $speaker->speakerLinkedin=$request->post('speakerLinkedin');
          $speaker->speakerTopic=$request->post('speakerTopic');
          $speaker->speakerCreated_at = date('Y-m-d H:i:s');
          $speaker->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/speaker');
    }

    public function delete(Request $request,$id)
    {
        $model = Speaker::find($id);

        if(File::exists(public_path().'/speaker/'.$model['speakerProfilepic'])){
          File::delete(public_path().'/speaker/'.$model['speakerProfilepic']);

        }

        $model->delete();
        $request->session()->flash('message','Speaker delete successfully');
          return redirect('admin/speaker');
    }

  
    public function status(Request $request,$status,$id){
        $model=Speaker::find($id);
        $model->speakerStatus=$status;
        $model->save();
        $request->session()->flash('message','Speaker status updated');
        return redirect('admin/speaker');
    }

} 
