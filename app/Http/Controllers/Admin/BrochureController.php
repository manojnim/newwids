<?php
  
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brochure;
use Illuminate\Support\Facades\DB;
use File;
 
class BrochureController extends Controller
{
	    public function index()
	    {
           $result['data']= Brochure::all();   
           $result['event'] = DB::table('events')->where('eventStatus','=','1')->get();
	    	$result['product'] = DB::table('products')->where('productStatus','=','1')->get();             
           return view('admin.brochure',$result);


	    }

		public function manage_brochure(Request $request,$id='')
	    {

	    	 if($id > 0){
              $arr = Brochure::where(['brochureId'=>$id])->get();
              $result['brochureFor'] = $arr['0']->brochureFor;
              $result['brochureForid'] = $arr['0']->brochureForid;
              $result['brochureFile'] = $arr['0']->brochureFile;
              $result['brochureId'] = $arr['0']->brochureId ;
              $result['brochure'] = DB::table('brochures')->where(['brochureStatus'=>1])->where('brochureId','!=',$id)->get();

        }else{
              $result['brochureFor'] =''; 
              $result['brochureForid'] ='';
              $result['brochureFile'] = '';
              $result['brochureId'] ='';
              $result['brochure'] = DB::table('brochures')->where(['brochureStatus'=>1])->get();

        }
	    	$result['event'] = DB::table('events')->where('eventStatus','=','1')->get();
	    	$result['product'] = DB::table('products')->where('productStatus','=','1')->get();
	       return view('admin.manage_brochure',$result); 
	    }

	    public function store(Request $request,$id='')
       {
          //   echo "<pre>";
          // print_r($request->file()); die("ll");

         if($request->post('id') > 0)
         {
          $imgs = 'required|mimes:pdf|max:5120';
         }else{
           $imgs = 'required|mimes:pdf|max:5120';
         }
	        if($request->post('brochureFor') == "Event")
	        {
	         $rm = 'required'; 
	        }
	        else{
	          $rm = '';
	        }

	        if($request->post('brochureFor') == "Product"){
	          $rm1 = 'required'; 
	        }
	        else{
	          $rm1 = '';
	        }


          $request->validate([
            'brochureFor'=>'required',
            'brochureForid'=>$rm,
            'brochureForid1'=>$rm1,
            'brochureFile'=>$imgs
        ]);



         if($request->post('id') >0)
         {
            $brochure = Brochure::find($request->post('id'));
            $msg ='Brochure updated successfully';
         }else{
            $brochure = new Brochure;
            $msg ='Brochure added successfully';

         }

          if($request->hasfile('brochureFile'))
          {
            if($request->post('id') >0)
            {
              $arrImage = DB::table('brochures')->where(['brochureId'=>$request->post('id')])->get();
              if(File::exists(public_path().'/brochure/'.$arrImage[0]->brochureFile)){
                  File::delete(public_path().'/brochure/'.$arrImage[0]->brochureFile);

              }

            }
                $image = $request->file('brochureFile');
                $ext = $image->extension();
                $image_name = time().'.'.$ext;
                $image->move(public_path().'/brochure/',$image_name); 
                $brochure->brochureFile=$image_name;


          } 

            if($request->post('brochureFor') == "Event")
	        {
	           $brochure->brochureForid=$request->post('brochureForid'); 
	        }else if($request->post('brochureFor') == "Product"){
	           $brochure->brochureForid=$request->post('brochureForid1'); 
	        } 
          
          $brochure->brochureFor=$request->post('brochureFor');
          $brochure->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/brochure');
    }

     public function delete(Request $request,$id)
    {
      
             
        $model = Brochure::find($id);

        if(File::exists(public_path().'/brochure/'.$model['brochurefile'])){
           File::delete(public_path().'/brochure/'.$model['brochurefile']);

             }
        $model->delete();
        $request->session()->flash('message','Brochure delete successfully');
          return redirect('admin/brochure');
    }

   public function status(Request $request,$status,$id){
        $model=Brochure::find($id);
        $model->brochureStatus=$status;
        $model->save();
        $request->session()->flash('message','Brochure status updated');
        return redirect('admin/brochure');
    }



























}
