<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
use File;
class CategoryController extends Controller
{
    
    //  public function getcategory(User $user)
    // {
    //    $list= CategoryResource::make($user)->hide(['categoryImage']);
    //     return response()->json(['status'=>"true","message"=>"Successfully",'data'=>$list],200);
    // }

    public function index(Request $request)
    {
    	 $result['data']= Category::all();
        return view('admin.category',$result);
    }

    public function manage_category(Request $request,$id='')
    {

    	 if($id > 0){
              $arr = Category::where(['categoryId'=>$id])->get();
              $result['categoryFor'] = $arr['0']->categoryFor;
              $result['categoryName'] = $arr['0']->categoryName;
              $result['categoryImage'] = $arr['0']->categoryImage;
              $result['categoryId'] = $arr['0']->categoryId ;
              $result['category'] = DB::table('categories')->where(['categoryStatus'=>1])->where('categoryId','!=',$id)->get();

        }else{
              $result['categoryFor'] =''; 
              $result['categoryName'] ='';
              $result['categoryImage'] = '';
              $result['categoryId'] ='';
              $result['category'] = DB::table('categories')->where(['categoryStatus'=>1])->get();

        }

        return view('admin.manage_category', $result);
    }

    public function store(Request $request,$id='')
    {
            
           

         if($request->post('id') > 0)
         {
          $imgs = 'image|mimes:jpeg,jpg,png|max:2048';
         }else{
           $imgs = 'required|mimes:jpeg,jpg,png|max:2048';
         }
          $request->validate([
            'categoryFor'=>'required',
            'categoryName'=>'required',
            'categoryImage'=>$imgs,
        ]);

         if($request->post('id') >0)
         {
            $category = Category::find($request->post('id'));
            $msg ='Category updated successfully';
         }else{
            $category = new Category;
            $msg ='Category added successfully';

         }

          if($request->hasfile('categoryImage'))
          {
            if($request->post('id') >0)
            {
              $arrImage = DB::table('categories')->where(['categoryId'=>$request->post('id')])->get();
              if(File::exists(public_path().'/category/'.$arrImage[0]->categoryImage)){
                  File::delete(public_path().'/category/'.$arrImage[0]->categoryImage);

              }

            }
                $image = $request->file('categoryImage');
                $ext = $image->extension();
                $image_name = time().'.'.$ext;
               
               $image->move(public_path().'/category/',$image_name); 
                $category->categoryImage=$image_name;


          }  
          
          $category->categoryFor=$request->post('categoryFor');      
          $category->categoryName=$request->post('categoryName');
          $category->categoryCreated_at = date('Y-m-d H:i:s');
          $category->save();
          $request->session()->flash('message',$msg);
          return redirect('admin/category');
    }

     public function delete(Request $request,$id)
    {
      
             
        $model = Category::find($id);

        if(File::exists(public_path().'/category/'.$model['categoryImage'])){
           File::delete(public_path().'/category/'.$model['categoryImage']);

             }
        $model->delete();
        $request->session()->flash('message','Category delete successfully');
          return redirect('admin/category');
    }

   public function status(Request $request,$status,$id){
        $model=Category::find($id);
        $model->categoryStatus=$status;
        $model->save();
        $request->session()->flash('message','Category status updated');
        return redirect('admin/category');
    }

}
