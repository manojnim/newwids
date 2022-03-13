<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Video;
use Illuminate\Support\Facades\DB;
use File;

class VideoController extends Controller
{
       public function index()
	    {
           $result['data']= Video::all();   
           $result['event'] = DB::table('events')->where('eventStatus','=','1')->get();
	    	$result['product'] = DB::table('products')->where('productStatus','=','1')->get();             
           return view('admin.video',$result);


	    }

		public function manage_video(Request $request,$id='')
	    {

	    	 if($id > 0){
              $arr = Video::where(['videoId'=>$id])->get();
              $result['videoFor'] = $arr['0']->videoFor;
              $result['videoForid'] = $arr['0']->videoForid;
              $result['videoUrl'] = $arr['0']->videoUrl;
              $result['videoId'] = $arr['0']->videoId ;
              $result['video'] = DB::table('videos')->where(['videoStatus'=>1])->where('videoId','!=',$id)->get();

        }else{
              $result['videoFor'] =''; 
              $result['videoForid'] ='';
              $result['videoUrl'] = '';
              $result['videoId'] ='';
              $result['video'] = DB::table('videos')->where(['videoStatus'=>1])->get();

        }
	    	$result['event'] = DB::table('events')->where('eventStatus','=','1')->get();
	    	$result['product'] = DB::table('products')->where('productStatus','=','1')->get();
	       return view('admin.manage_video',$result); 
	    }

	    public function store(Request $request,$id='')
        {
          
	        if($request->post('videoFor') == "Event")
	        {
	         $rm = 'required'; 
	        }
	        else{
	          $rm = '';
	        }

	        if($request->post('videoFor') == "Product"){
	          $rm1 = 'required'; 
	        }
	        else{
	          $rm1 = '';
	        }


          $request->validate([
            'videoForid'=>'required',
            'videoForid'=>$rm,
            'videoForid1'=>$rm1,
            'videoUrl'=>'required'
        ]);



         if($request->post('id') >0)
         {
            $video = Video::find($request->post('id'));
            $msg ='Video updated successfully';
         }else{
            $video = new Video;
            $msg ='Video added successfully';

         }

          

            if($request->post('videoFor') == "Event")
	        {
	           $video->videoForid=$request->post('videoForid'); 
	        }else if($request->post('videoFor') == "Product"){
	           $video->videoForid=$request->post('videoForid1'); 
	        } 
          $video->videoUrl=$request->post('videoUrl');
          $video->videoFor=$request->post('videoFor');
          $video->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/video');
    }

     public function delete(Request $request,$id)
    {
      
             
        $model = Video::find($id);

        // if(File::exists(public_path().'/video/'.$model['brochurefile'])){
        //    File::delete(public_path().'/video/'.$model['brochurefile']);

        //      }
        $model->delete();
        $request->session()->flash('message','Video delete successfully');
          return redirect('admin/video');
    }

   public function status(Request $request,$status,$id){
        $model=Video::find($id);
        $model->videoStatus=$status;
        $model->save();
        $request->session()->flash('message','Video status updated');
        return redirect('admin/video');
    }


}
