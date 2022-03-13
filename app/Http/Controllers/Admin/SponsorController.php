<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Sponsor;
use Illuminate\Support\Facades\DB;
use File;

class SponsorController extends Controller
{
    public function index()
    {
    	$result['data'] = Sponsor::join('events','events.eventId','sponsors.sponsorEvent_id')->get();
    	return view('admin.sponsor',$result);
    }

    public function manage_sponsor(Request $request, $id='')
    {
    	if($id > 0)
    	{
    		$arr = Sponsor::where(['sponsorId'=>$id])->get();
        $result['sponsorEvent_id'] = $arr['0']->sponsorEvent_id;
    		$result['sponsorName'] = $arr['0']->sponsorName;
        $result['sponsorImage'] = $arr['0']->sponsorImage;
    		$result['sponsorLink'] = $arr['0']->sponsorLink;
    		$result['sponsorId'] = $arr['0']->sponsorId;
            $result['sponsor'] = DB::table('sponsors')->where(['sponsorStatus'=>1])->where('sponsorId','!=',$id)->get();  

    	}else{
             
            $result['sponsorEvent_id'] = '';    
            $result['sponsorName'] = '';
            $result['sponsorImage'] = '';
            $result['sponsorLink'] = '';
            $result['sponsorId'] = ''; 
            $result['sponsor'] = DB::table('sponsors')->where(['sponsorStatus'=>1])->get();


    	}

       $result['event'] = DB::table('events')->where(['eventStatus'=>1])->get();
    	return view('admin.manage_sponsor',$result);

    }
    public function store(Request $request, $id='')
    {
    	if($request->post('id') > 0)
         {
          $imgs = 'image|mimes:jpeg,jpg,png|max:2048';
         }else{
           $imgs = 'required|mimes:jpeg,jpg,png|max:2048';
         }

    	$request->validate([
        'sponsorEvent_id'=>'required',
         'sponsorName'=>'required',
         'sponsorImage'=>$imgs,
         'sponsorLink'=>'required'
        
    	]);


        if($request->post('id') > 0)
        {
        	$sponsor = Sponsor::find($request->post('id'));
        	$msg = "Sponsor updated successfully";

        }else{

        	$sponsor = New Sponsor;
        	$msg = "Sponsor added successfully";

        }	

        if($request->hasfile('sponsorImage'))
        {
        	if($request->post('id') > 0)
        	{
        		$arrImage = Sponsor::where(['sponsorId'=>$request->post('id')])->get();

        		if(File::exists(public_path().'/sponsor/'.$arrImage[0]->sponsorImage)){
                  File::delete(public_path().'/sponsor/'.$arrImage[0]->sponsorImage);

              }


        	}	

        	    $image = $request->file('sponsorImage');
                $ext = $image->extension();
                $image_name = time().'.'.$ext;
               
               $image->move(public_path().'/sponsor/',$image_name); 
              // $url = "http://127.0.0.1:8014/sponsor/".$image_name;
                $sponsor->sponsorImage=$image_name;
        }
          $sponsor->sponsorEvent_id=$request->post('sponsorEvent_id');   
          $sponsor->sponsorName=$request->post('sponsorName');      
          $sponsor->sponsorLink=$request->post('sponsorLink');
          $sponsor->sponsorCreated_at = date('Y-m-d H:i:s');
          $sponsor->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/sponsor');	


    }


    public function delete(Request $request,$id)
    {
         
        $model = Sponsor::find($id);
        if(File::exists(public_path().'/sponsor/'.$model['sponsorImage']))
        {
           File::delete(public_path().'/sponsor/'.$model['sponsorImage']);

        }
        $model->delete();
        $request->session()->flash('message','Sponsor delete successfully');
          return redirect('admin/sponsor');
    }

   public function status(Request $request,$status,$id){
        $model=Sponsor::find($id);
        $model->sponsorStatus=$status;
        $model->save();
        $request->session()->flash('message','Sponsor status updated');
        return redirect('admin/sponsor');
    }
}
