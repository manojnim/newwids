<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Poll;

class PollController extends Controller
{
    public function index()
    {
    	$result['data'] = Poll::join('events','eventId','polls.pollEvent_id')
    	                 ->join('agendas','agendas.agendaId', 'polls.pollAgenda_id')->get();

    	     return view('admin.poll',$result);            
    }



    public function manage_poll(Request $request,$id='')
    {
            
             if($id > 0){
            $arr = Poll::where(['pollId'=>$id])->get();
              $result['pollEvent_id'] = $arr['0']->pollEvent_id;
              $result['pollAgenda_id'] = $arr['0']->pollAgenda_id;
              $result['pollTitle'] = $arr['0']->pollTitle;
              $result['pollA'] = $arr['0']->pollA;
              $result['pollB'] = $arr['0']->pollB;
              $result['pollC'] = $arr['0']->pollC;
              $result['pollD'] = $arr['0']->pollD;
              // $result['pollAns'] = $arr['0']->pollAns;
              $result['pollId'] = $arr['0']->pollId;
                 $result['poll'] = DB::table('polls')->where(['pollStatus'=>1])->where('pollId','!=',$id)->get();

        }else{ 
                 $result['pollEvent_id']='';
                 $result['pollAgenda_id'] ='';
                 $result['pollTitle'] ='';
                 $result['pollA'] ='';
                 $result['pollB'] ='';
                 $result['pollC'] ='';
                 $result['pollD'] = '';
                 // $result['pollAns'] = '';
                 $result['pollId'] ='';
            $result['poll'] = DB::table('polls')->where(['pollStatus'=>1])->get();
           

        }
            $result['event'] = DB::table('events')->where(['eventStatus'=>1])->get();
            $result['agenda'] = DB::table('agendas')->where(['agendaStatus'=>1])->get();

        return view('admin.manage_poll', $result);


    }

    public function store(Request $request,$id='')
    {
         
          $request->validate([
           'pollEvent_id'=>'required',
           'pollAgenda_id'=>'required',
           'pollTitle'=>'required',
           'pollA'=>'required',
           'pollB'=>'required'
          
          
        ]);

         if($request->post('id') > 0)
         {
            $poll = Poll::find($request->post('id'));
            $msg ='Poll edit successfully';
         }else{
            $poll = new Poll;
            $msg ='Poll add successfully';

         }


          
                
          $poll->pollEvent_id=$request->post('pollEvent_id');
          $poll->pollAgenda_id=$request->post('pollAgenda_id');
          $poll->pollTitle=$request->post('pollTitle');
          $poll->pollA=$request->post('pollA');
          $poll->pollB=$request->post('pollB');
          $poll->pollC=$request->post('pollC');
          $poll->pollD=$request->post('pollD');
          // $poll->pollAns=$request->post('pollAns');
          $poll->pollCreated_at = date('Y-m-d H:i:s');
          $poll->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/poll');
    }

    public function delete(Request $request,$id)
    {
        $model = Poll::find($id);
        $model->delete();
        $request->session()->flash('message','Poll delete successfully');
          return redirect('admin/poll');
    }

  
    public function status(Request $request,$status,$id){
        $model=Poll::find($id);
        $model->pollStatus=$status;
        $model->save();
        $request->session()->flash('message','Poll status updated');
        return redirect('admin/poll');
    }

    public function firepoll(Request $request,$id)
    {
         $arr = Poll::where(['pollId'=>$id])->get();

           $event = DB::table('events')->where(['eventId'=>$arr['0']->pollEvent_id])->get('eventName');
            $agenda = DB::table('agendas')->where(['agendaId'=>$arr['0']->pollAgenda_id])->get('agendaTitle');
           $firebaseToken = Db::table('users')->pluck('userFcm_token')->all();

                    $data = [
                      "registration_ids" => $firebaseToken,
                      "notification" => [
                      "Event Name" => $event['0']->eventName,   
                      "Session Name" => $agenda['0']->agendaTitle,
                      "Poll Title"=>$arr['0']->pollTitle,
                      "A" => $arr['0']->pollA,  
                      "B" => $arr['0']->pollB, 
                      "C" => $arr['0']->pollC, 
                      "D" => $arr['0']->pollD
                      ]
                  ];

                  

                $SERVER_API_KEY = 'AAAAguLRWAM:APA91bGqx-B57e4YBG_L-DOVXEvKpa6S9Zns_-113abaCJo4eFeoXd7o48Fit3Cv8dDE1iWY9UjNn9PmlVhIZCV7y_2T15p25LsY6qOcwoamyaN95JkY30pHLRCr83hMFrmE5KPF-3PY';
  
                
                $dataString = json_encode($data);
            
                $headers = [
                    'Authorization: key=' . $SERVER_API_KEY,
                    'Content-Type: application/json',
                ];
            
                $ch = curl_init();
              
                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                       
                $response = curl_exec($ch);

             if($response)
            {
              $request->session()->flash('message','Fire Poll successfully');


                return redirect('admin/poll');   
            }

    }

}
