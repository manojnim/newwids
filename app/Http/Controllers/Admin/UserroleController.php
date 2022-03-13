<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Userrole;
use Illuminate\Support\Facades\DB;

class UserroleController extends Controller
{

    public function index(Request $request)
    {
       $result['data']= Userrole::all();
        return view('admin.userrole',$result);
    }

    public function manage_userrole(Request $request,$id='')
    {

       if($id > 0){
            $arr = Userrole::where(['roleId'=>$id])->get();
              $result['roleName'] = $arr['0']->roleName;
              $result['roleId'] = $arr['0']->roleId ;
                 $result['userrole'] = DB::table('userroles')->where(['roleStatus'=>1])->where('roleId','!=',$id)->get();

        }else{ 
             $result['roleName'] ='';
              $result['roleId'] ='';
            $result['userrole'] = DB::table('userroles')->where(['roleStatus'=>1])->get();

        }

        return view('admin.manage_userrole', $result);
    }

    public function store(Request $request,$id='')
    {
            
          $request->validate([
          'roleName'=>'required',
          
        ]);

         if($request->post('id') >0)
         {
            $userrole = Userrole::find($request->post('id'));
            $msg ='Userrole updated successfully';
         }else{
            $userrole = new Userrole;
            $msg ='Userrole added successfully';

         }

          
          $userrole->roleName=$request->post('roleName');
          $userrole->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/userrole');
    }

    

   public function status(Request $request,$status,$id){
        $model=Userrole::find($id);
        $model->roleStatus=$status;
        $model->save();
        $request->session()->flash('message','Userrole status updated');
        return redirect('admin/userrole');
    }

    
}
