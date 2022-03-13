<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Hashtag;
use Illuminate\Support\Facades\DB;
class HashtagController extends Controller
{
    public function index(Request $request)
    {
       $result['data']= Hashtag::all();
        return view('admin.hashtag',$result);
    }

    public function manage_hashtag(Request $request,$id='')
    {

       if($id > 0){
              $arr = Hashtag::where(['hashtagId'=>$id])->get();
              $result['hashtagForevent'] = $arr['0']->hashtagForevent;
              $result['hashtagForpoll'] = $arr['0']->hashtagForpoll;
              $result['hashtagForagenda'] = $arr['0']->hashtagForagenda;
              $result['hashtagId'] = $arr['0']->hashtagId ;
              $result['hashtag'] = DB::table('hashtags')->where(['hashtagStatus'=>1])->where('hashtagId','!=',$id)->get();

        }else{
              $result['hashtagForevent'] =''; 
              $result['hashtagForpoll'] ='';
              $result['hashtagForagenda'] = '';
              $result['hashtagId'] ='';
              $result['hashtag'] = DB::table('hashtags')->where(['hashtagStatus'=>1])->get();

        }

        return view('admin.manage_hashtag', $result);
    }

    public function store(Request $request,$id='')
    {
            
          
          $request->validate([
            'hashtagForagenda'=>'required',
            'hashtagForpoll'=>'required',
            'hashtagForagenda'=>'required'
        ]);

         if($request->post('id') >0)
         {
            $hashtag = Hashtag::find($request->post('id'));
            $msg ='Hashtag updated successfully';
         }else{
            $hashtag = new Hashtag;
            $msg ='Hashtag added successfully';

         }
 
          
          $hashtag->hashtagForevent=$request->post('hashtagForevent');      
          $hashtag->hashtagForpoll=$request->post('hashtagForpoll');
          $hashtag->hashtagForagenda=$request->post('hashtagForagenda');
          $hashtag->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/hashtag');
    }

     public function delete(Request $request,$id)
    {
      
             
        $model = Hashtag::find($id);

        $model->delete();
        $request->session()->flash('message','Hashtag delete successfully');
          return redirect('admin/hashtag');
    }

   public function status(Request $request,$status,$id){
        $model=Hashtag::find($id);
        $model->hashtagStatus=$status;
        $model->save();
        $request->session()->flash('message','Hashtag status updated');
        return redirect('admin/hashtag');
    }

}
