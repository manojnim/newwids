<?php
   
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Agenda;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{ 
    public function index(Request $request)
    {
 
            $result['data'] = Agenda::join('events', 'events.eventId', '=', 'agendas.agendaEvent_id')
                              ->join('speakers', 'speakers.speakerId', '=', 'agendas.agendaSpeaker_id')->get();
           
              
       return view('admin.agenda',$result);
         
    }

    public function manage_agenda(Request $request, $id=''){
          
           if($id > 0){
               $arr = Agenda::where(['agendaId'=>$id])->get();
              $result['agendaTitle']=$arr['0']->agendaTitle;
              $result['agendaEvent_id'] = $arr['0']->agendaEvent_id;
              $result['agendaSpeaker_id'] = $arr['0']->agendaSpeaker_id;
              $result['agendaDate'] = $arr['0']->agendaDate;
              $result['agendaStarttime'] = $arr['0']->agendaStarttime;
              $result['agendaEndtime'] = $arr['0']->agendaEndtime;
              $result['agendaVenue'] = $arr['0']->agendaVenue;
              $result['agendaDescription'] = $arr['0']->agendaDescription;
              $result['agendaId'] = $arr['0']->agendaId;

        }else{
             
              $result['agendaTitle']='';
              $result['agendaEvent_id'] = '';
              $result['agendaSpeaker_id'] = '';
              $result['agendaDate'] = '';
              $result['agendaStarttime'] = '';
              $result['agendaEndtime'] = '';
              $result['agendaVenue'] = '';
              $result['agendaDescription'] = '';
              $result['agendaId'] = '';
              $result['agenda'] = DB::table('agendas')->where(['agendaStatus'=>1])->get();


        }



    	  $result['event'] = DB::table('events')->where(['eventStatus'=>1])->get();
    	   $result['speaker'] = DB::table('speakers')->where(['speakerStatus'=>1])->get();
    	       return view('admin.manage_agenda',$result);

    }

    public function store(Request $request, $id=''){
     
        $request->validate([
             'agendaTitle' =>'required',
             'agendaEvent_id' =>'required',
             'agendaSpeaker_id'=>'required',
             'agendaDate'=>'required',
             'agendaStarttime' => 'required',
             'agendaEndtime' => 'required',
             'agendaVenue' => 'required',
             'agendaDescription' => 'required'
        ]);


        if($request->post('id') >0)
         {
            $agenda = Agenda::find($request->post('id'));
            $msg ='Agenda updated successfully';
         }else{
            $agenda = new Agenda;
            $msg ='Agenda added successfully';

         }
           
            $agendaSpeaker_id = implode(',', $request->agendaSpeaker_id);
             $agenda->agendaTitle = $request->agendaTitle;
             $agenda->agendaEvent_id = $request->agendaEvent_id;
             $agenda->agendaSpeaker_id = $agendaSpeaker_id;
             $agenda->agendaDate = $request->agendaDate;
             $agenda->agendaStarttime = $request->agendaStarttime;
             $agenda->agendaEndtime = $request->agendaEndtime;
             $agenda->agendaVenue = $request->agendaVenue;
             $agenda->agendaDescription = $request->agendaDescription;
             $agenda->agendaCreated_at = date('Y-m-d H:i:s');
             $agenda->save(); 

       
         $request->session()->flash('message',$msg);
          return redirect('admin/agenda');
    }

    

    public function delete(Request $request,$id='')
    {
             
        $model = Agenda::find($id);
        $model->delete();
        $request->session()->flash('message','Agenda delete successfully');
          return redirect('admin/agenda');
    }

   public function status(Request $request,$status,$id=''){
    
        $model=Agenda::find($id);
        $model->agendaStatus=$status;
        $model->status;
        $model->save();
        $request->session()->flash('message','Agenda status updated');
        return redirect('admin/agenda');
    }
 

}
