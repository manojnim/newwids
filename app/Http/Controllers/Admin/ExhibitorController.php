<?php
  
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Event;
use App\Models\Admin\Exhibitor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use File;

class ExhibitorController extends Controller
{
    
    public function index()
    {

    	$result['data'] = Exhibitor::join('events', 'events.eventId', 'exhibitors.exhibitorEvent_id')->get();
        return view('admin.exhibitor',$result);
    }

    public function manage_exhibitor(Request $request, $id='')
    {
    	     if($id > 0 )
           {
               $arr = Exhibitor::where(['exhibitorId'=>$id])->get();

               $result['exhibitorEvent_id'] = $arr['0']->exhibitorEvent_id;
               $result['exhibitorCompanyname'] = $arr['0']->exhibitorCompanyname;
               $result['exhibitorCompanydescription'] = $arr['0']->exhibitorCompanydescription;
               $result['exhibitorEmail '] = $arr['0']->exhibitorEmail ;
               $result['exhibitorPhone'] = $arr['0']->exhibitorPhone;
               $result['exhibitorPassword'] = $arr['0']->exhibitorPassword;
               $result['exhibitorCompanybannerimage'] = $arr['0']->exhibitorCompanybannerimage;
               $result['exhibitorCompanylogo'] = $arr['0']->exhibitorCompanylogo;
              $result['exhibitorId'] = $arr['0']->exhibitorId;
             // $result['exhibitor'] = DB::table('exhibitors')->where('exhibitorId','!=',$id)->get();
           }else{
              $result['exhibitorEvent_id']='';
              $result['exhibitorCompanyname']='';
              $result['exhibitorCompanydescription']='';
              $result['exhibitorEmail']='';
              $result['exhibitorPhone']='';
              $result['exhibitorPassword']='';
              $result['exhibitorCompanybannerimage']='';
              $result['exhibitorCompanylogo']='';
              $result['exhibitorId']='';
             // $result['exhibitor'] = DB::table('exhibitors')->where(['exhibitorStatus'=>1])->get();
           }
          $result['event'] = DB::table('events')->where('eventStatus','=','1')->get();

        return view('admin.manage_exhibitor', $result);

    }


       public function store(Request $request, $id='')
    {

       if($request->post('id') > 0)
       {
        $imgs = 'mimes:jpeg,jpg,png|max:2048';
        $ps ='';
        
       }else{
         $imgs = 'required|mimes:jpeg,jpg,png|max:2048';
          $ps ='required';
         
       }
          
        
        $request->validate([
         'exhibitorEvent_id'=>'required',
         'exhibitorCompanyname'=>'required',
         'exhibitorCompanybannerimage'=>$imgs,
         'exhibitorCompanylogo'=>$imgs,
         'exhibitorCompanydescription'=>'required',
         'exhibitorPhone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
         'exhibitorPassword'=>$ps,
         'exhibitorEmail'=>'required'
         
        ]);


       
       

        if($request->post('id') >0)
         {
            $exhibitor = Exhibitor::find($request->post('id'));
            $msg ='Exhibitor updated successfully';
         }else{
            $exhibitor = new Exhibitor;
            $msg ='Exhibitor added successfully';

         }

         

          if($request->hasfile('exhibitorCompanybannerimage'))
          {
            if($request->post('id') >0)
            {
              $arrImage1 = DB::table('exhibitors')->where(['exhibitorId'=>$request->post('id')])->get();
              if(File::exists(public_path().'/company/'.$arrImage1[0]->exhibitorCompanybannerimage)){
                  File::delete(public_path().'/company/'.$arrImage1[0]->exhibitorCompanybannerimage);

              }

            }
                $image1 = $request->file('exhibitorCompanybannerimage');
                $ext1 = $image1->extension();
                $image_name1 = time().'B'.'.'.$ext1;
               
                $image1->move(public_path().'/company/',$image_name1); 
                $exhibitor->exhibitorCompanybannerimage=$image_name1;


          }  


          if($request->hasfile('exhibitorCompanylogo'))
          {
              if($request->post('id') > 0)
              {
                $arrImage2 = DB::table('exhibitors')->where(['exhibitorId'=>$request->post('id')])->get();
                if(File::exists(public_path().'/company/'.$arrImage2[0]->exhibitorCompanylogo)){
                    File::delete(public_path().'/company/'.$arrImage2[0]->exhibitorCompanylogo);

                }

              }
                $image2 = $request->file('exhibitorCompanylogo');
                $ext2 = $image2->extension();
                $image_name2 = time().'L'.'.'.$ext2;
               
                $image2->move(public_path().'/company/',$image_name2); 
                $exhibitor->exhibitorCompanylogo=$image_name2;


          }  




          $exhibitor->exhibitorEvent_id=$request->post('exhibitorEvent_id');
          $exhibitor->exhibitorCompanyname=$request->post('exhibitorCompanyname');      
          $exhibitor->exhibitorCompanydescription=$request->post('exhibitorCompanydescription');
          $exhibitor->exhibitorEmail =$request->post('exhibitorEmail');
          $exhibitor->exhibitorPhone =$request->post('exhibitorPhone');
          $exhibitor->exhibitorPassword=Hash::make($request->post('exhibitorPassword'));
          $exhibitor->exhibitorCreated_at = date('Y-m-d H:i:s');
          $exhibitor->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/exhibitor');

    }


     public function delete(Request $request,$id)
    {
        $model = Exhibitor::find($id);

        if(File::exists(public_path().'/company/'.$model['exhibitorCompanylogo'])){
          File::delete(public_path().'/company/'.$model['exhibitorCompanylogo']);

        }

        if(File::exists(public_path().'/company/'.$model['exhibitorCompanybannerimage'])){
          File::delete(public_path().'/company/'.$model['exhibitorCompanybannerimage']);

        }


        $model->delete();
        $request->session()->flash('message','Exhibitor delete successfully');
          return redirect('admin/exhibitor');
    }

  
    public function status(Request $request,$status,$id){
        $model=Exhibitor::find($id);
        $model->exhibitorStatus=$status;
        $model->save();
        $request->session()->flash('message','Exhibitor status updated');
        return redirect('admin/exhibitor');
    }




}
