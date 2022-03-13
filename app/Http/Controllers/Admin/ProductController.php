<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Productimage;

use Illuminate\Support\Facades\DB;
use File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
           $result['data'] = Product::join('users','users.userId','=','products.productOrganizer_id')
                             ->join('categories', 'categories.categoryId','=','products.productCategory_id')->get();
    	return view('admin.product',$result);

    }

    public function manage_product(Request $request, $id='')
    {
    	   if($id > 0){
            $arr = Product::where(['productId'=>$id])->get();
              $result['productName'] = $arr['0']->productName;
              $result['productPrice'] = $arr['0']->productPrice;
              $result['productOrganizer_id'] = $arr['0']->productOrganizer_id;
              $result['productCategory_id'] = $arr['0']->productCategory_id;
              $result['productDisplayimg'] = $arr['0']->productDisplayimg;
              $result['productImage'] = $arr['0']->productImage;
              $result['productDescription'] = $arr['0']->productDescription;
              $result['productId'] = $arr['0']->productId;
              $result['product'] = DB::table('products')->where('productId','!=',$id)->get();
              $result['productimages'] = DB::table('productimages')->where('product_id','=',$id)->get();


        }else{ 
                 $result['productName']='';
                 $result['productPrice'] ='';
                 $result['productOrganizer_id'] ='';
                 $result['productCategory_id'] ='';
                 $result['productDisplayimg'] ='';
                 $result['productImage'] ='';
                 $result['productDescription'] ='';
                 $result['productId'] ='';
                 
            $result['product'] = DB::table('products')->where(['productStatus'=>1])->get();
           

        }
            $result['category']=DB::table('categories')->where(['categoryStatus'=>1,'categoryFor'=>2])->get();
            // $result['organizer']=DB::table('users')->where(['userType'=>3])->get();
        return view('admin.manage_product', $result);

    }

    public function store(Request $request, $id='')
    {
           // echo "<pre>";

            // echo $request->post('productName');
          //print_r($request->post());
        // print_r($request->file('productAllimg'));
         // die("kk");
    	 if($request->post('id') > 0)
         {
          $imgs = 'mimes:jpeg,jpg,png|max:2048';
           //$imgs1 = 'mimes:jpeg,jpg,png|max:2048';
         }else{
           $imgs = 'required|mimes:jpeg,jpg,png|max:2048';
          // $imgs1 = 'required|mimes:jpeg,jpg,png|max:2048';
         }

         
          $request->validate([
           'productName'=>'required',
           'productDisplayimg'=>$imgs,
           'productPrice'=>'required',
           'productCategory_id'=>'required',
           'productDescription'=>'required'
          
        ]);

         $code = random_int(100000, 999999);

         if($request->post('id') > 0)
         {
            $product = Product::find($request->post('id'));
            $msg ='Product edit successfully';
         }else{
            $product = new Product;
            $msg ='Product add successfully';

         } 
           $rand_val = date('ymdhis') . rand(11111, 99999);

          if($request->hasfile('productDisplayimg'))
          {
            if($request->post('id') >0)
            {
              $arrImage = DB::table('products')->where(['productId'=>$request->post('id')])->get();

              if(File::exists(public_path().'/product/'.$arrImage[0]->productDisplayimg)){
                   File::delete(public_path().'/product/'.$arrImage[0]->productDisplayimg);

              }

            }
                 $image = $request->file('productDisplayimg');
                $ext = $image->extension();
                $image_name = time().'.'.$ext;
               
               $image->move(public_path().'/product/',$image_name); 
                 $product->productDisplayimg=$image_name; 

               
          }  

          
          
          $product->productName=$request->post('productName');
          $product->productPrice =  $request->post('productPrice');
          $product->productOrganizer_id='2';
          $product->productCategory_id=$request->post('productCategory_id');
          $product->productDescription=$request->post('productDescription');
          $product->productCreated_at = date('Y-m-d H:i:s');
          $product->save();
         if($request->post('id') > 0)
         {
           $productId = $request->post('id');
         }else{
             $productId = DB::getPdo('products')->lastInsertId();
         }
     

      
          if($request->hasfile('productImage'))
          {
                  $productimage = New Productimage();
                  $datas =array(); 
              foreach($request->file('productImage') as $key => $files)
              {
               
                $image_name1 =  time().rand(0, 50).'.'.$files->extension();
                 $files->move(public_path().'/productimages/',$image_name1); 
                  $datas[$key]['product_id'] = $productId;
                  $datas[$key]['productImage'] = $image_name1;



                //  $datas[] =  array(
                //   'product_id' => $productId,
                //   'productImage'=> $image_name1
                // ); 
                 
                 
              } 
               
                 
                   Productimage::insert($datas);

               
          }  


          $request->session()->flash('message',$msg);
          return redirect('admin/product');

    }

    public function delete(Request $request,$id)
    {
        $model = Product::find($id);

        if(File::exists(public_path().'/product/'.$model['productDisplayimg'])){
          File::delete(public_path().'/product/'.$model['productDisplayimg']);

        }

        $model->delete();
        $request->session()->flash('message','Product delete successfully');
          return redirect('admin/product');
    }

    
    public function status(Request $request,$status,$id){
        $model=Product::find($id);
        $model->productStatus=$status;
        $model->save();
        $request->session()->flash('message','Product status updated');
        return redirect('admin/product');
    }

    public function productimages(Request $request,$id){

        $result['data']=productimage::where('product_id',$id)->get();
        return view('admin.product_image',$result);
    }

     public function productidelete(Request $request,$productid,$id)
    {
        $model = productimage::find($id);

        if(File::exists(public_path().'/productimages/'.$model['productImage'])){
          File::delete(public_path().'/productimages/'.$model['productImage']);

        }

        $model->delete();
        $request->session()->flash('message','Product image delete successfully');
          return redirect('admin/product/productimages/'.$productid);
    }

     public function productistatus(Request $request,$status,$productid,$id){
        $model=productimage::find($id);
        $model->productImgstatus=$status;
        $model->save();
        $request->session()->flash('message','Product image status updated');
        return redirect('admin/product/productimages/'.$productid);

    }
}
