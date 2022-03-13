<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PollHashtag;
use App\Models\Admin\Event;
use Illuminate\Support\Facades\DB;
class PollHashtagController extends Controller
{
    public function index()
    {
    	$result['data']= PollHashtag::join('polls','polls.pollId','pollhashtags.pollhashtagPoll_id')->get();
    	return view('admin.pollhashtag',$result);
    }

    public function manage_pollhashtag(Request $request,$id='')
    {
    	if($id > 0)
    	{
    		$arr = PollHashtag::where(['eventhashtagId'=>$id])->get();
    		$result['pollhashtagPoll_id'] = $arr['0']->pollhashtagPoll_id;
    		$result['pollhashtagTitle'] = $arr['0']->pollhashtagTitle;
    		$result['pollhashtagId'] = $arr['0']->pollhashtagId;


    	}else{
         
            $result['pollhashtagPoll_id'] ='';
            $result['pollhashtagTitle'] ='';
            $result['pollhashtagId'] ='';
            $result['pollhashtag'] = DB::table('pollhashtags')->where(['pollhashtagStatus'=>1])->get();

    	}

    	  $result['poll'] = DB::table('polls')->where(['pollStatus'=>1])->get();
    	  return view('admin.manage_pollhashtag',$result);
	

    }

    public function store(Request $request){
     
        $request->validate([
            'pollhashtagPoll_id' =>'required',
            'addmore.*.pollhashtagTitle' => 'required',
        ]);
      
       
         $data = array();

	    for ($i = 0; $i < count($request->addmore); $i++) {
	 
	        $data[] = array(
	            'pollhashtagPoll_id'=>$request->post('pollhashtagPoll_id'),
	            'pollhashtagTitle'=>$request->addmore[$i]['pollhashtagTitle'],
	           
	        );
	    }

             $result=   PollHashtag::insert($data);

       
        if($result !=''){
             $request->session()->flash('message','Poll hash tag add successfully');
              return redirect('admin/pollhashtag');
        }
    }

     public function delete(Request $request,$id='')
    {
             
        $model = PollHashtag::find($id);
        $model->delete();
        $request->session()->flash('message','Poll hash tag delete successfully');
          return redirect('admin/pollhashtag');
    }

   public function status(Request $request,$status,$id=''){
    
        $model=PollHashtag::find($id);
        $model->pollhashtagStatus=$status;
        $model->status;
        $model->save();
        $request->session()->flash('message','Poll hash tag status updated');
        return redirect('admin/pollhashtag');
    }

}
 