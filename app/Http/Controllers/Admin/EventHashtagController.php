<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\EventHashtag;
use App\Models\Admin\Event;
use Illuminate\Support\Facades\DB;

class EventHashtagController extends Controller
{ 
    public function index()
    {
    	$result['data']= EventHashtag::join('events','events.eventId','eventhashtags.eventhashtagEvent_id')->get();
    	return view('admin.eventhashtag',$result);
    }

    public function manage_eventhashtag(Request $request,$id='')
    {
    	if($id > 0)
    	{
    		$arr = EventHashtag::where(['eventhashtagId'=>$id])->get();
    		$result['eventhashtagEvent_id'] = $arr['0']->eventhashtagEvent_id;
    		$result['eventhashtagTitle'] = $arr['0']->eventhashtagTitle;
    		$result['eventhashtagId'] = $arr['0']->eventhashtagId;


    	}else{
         
            $result['eventhashtagEvent_id'] ='';
            $result['eventhashtagTitle'] ='';
            $result['eventhashtagId'] ='';
            $result['eventhashtag'] = DB::table('eventhashtags')->where(['eventhashtagStatus'=>1])->get();

    	}

    	  $result['event'] = DB::table('events')->where(['eventStatus'=>1])->get();
    	  return view('admin.manage_eventhashtag',$result);
	

    }

    public function store(Request $request){
     
        $request->validate([
            'eventhashtagEvent_id' =>'required',
            'addmore.*.eventhashtagTitle' => 'required',
        ]);
      
       
         $data = array();

	    for ($i = 0; $i < count($request->addmore); $i++) {
	 
	        $data[] = array(
	            'eventhashtagEvent_id'=>$request->post('eventhashtagEvent_id'),
	            'eventhashtagTitle'=>$request->addmore[$i]['eventhashtagTitle'],
	           
	        );
	    }

             $result=   EventHashtag::insert($data);

       
        if($result !=''){
             $request->session()->flash('message','Event hash tag add successfully');
              return redirect('admin/eventhashtag');
        }
    }

     public function delete(Request $request,$id='')
    {
             
        $model = EventHashtag::find($id);
        $model->delete();
        $request->session()->flash('message','Event hash tag delete successfully');
          return redirect('admin/eventhashtag');
    }

   public function status(Request $request,$status,$id=''){
    
        $model=EventHashtag::find($id);
        $model->eventhashtagStatus=$status;
        $model->status;
        $model->save();
        $request->session()->flash('message','Event hash tag status updated');
        return redirect('admin/eventhashtag');
    }


}
