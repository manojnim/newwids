@extends('admin/layout')
@section('page_title','Add Product')
@section('product-selected','link-nav active')
 
@section('container')
          <div class="row">
          
              <div class="col-sm-12">
                  @if(session()->has('message'))

              
                          <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
                          <i class="bi-check-circle-fill"></i>
                          <strong> {{session('message')}}.</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      </div>

                               @endif
                <div class="card">
                 <div class="card-header">

                      <div class="header-top">
                          <h5 class="pull-left">Add Product</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('product.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf
                          
                           <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Product Name</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Product Name" value="{{  $productName != '' ? $productName : (old('productName')) }}" name="productName"  >
                               <span class="form-text text-danger">
                              @error('productName') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                             <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">Category</label>
                               <div class="col-sm-9">
                              <select class="js-example-basic-single form-control" name="productCategory_id" id="productCategory_id">
                               <option value="">Select Category</option>
                                @foreach($category as $cats)
                                   
                                @if($cats->categoryId == $productCategory_id))
                                <option value="{{$cats->categoryId}}" selected="selected">{{$cats->categoryName}}</option>
                                @else
                                <option value="{{$cats->categoryId}}" {{ old('productCategory_id') == $cats->categoryId ? 'selected' : '' }}>{{$cats->categoryName}}</option>

                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('productCategory_id') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div> 

                           
                           
                       


                          
                            <div class="mb-3  row">
                              <label class="col-sm-3 col-form-label">Price</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="number" placeholder="Price" value="{{  $productPrice != '' ? $productPrice : (old('productPrice')) }}" name="productPrice" id="productPrice">
                               <span class="form-text text-danger">
                              @error('productPrice') 
                              {{$message}} 
                                @enderror
                            </span>
                              </div>
                            </div>
                           

                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Description</label>
                              <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="productDescription" placeholder="product Description">{{  $productDescription != '' ? $productDescription : (old('productDescription')) }}</textarea>
                         
                               <span class="form-text text-danger">
                              @error('productDescription') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Product Image </label>
                           <div class="col-sm-9">
                              <input class="form-control" type="file" name="productDisplayimg" value="{{  $productDisplayimg != '' ? $productDisplayimg : (old('productDisplayimg')) }}" id="productDisplayimg">
                              <span class="form-text text-danger">
                              @error('productDisplayimg') 
                              {{$message}} 
                                @enderror
                            </span>
                            @if($productDisplayimg!='')
                       <img src="{{asset('product/'.$productDisplayimg)}}" class="img-70 rounded-circle" style="height: 70px !important;">
                       @else
                            <img id="preview-image-before-upload" src="{{asset('admin_assets/images/pre.jpg')}}"
                      alt="preview image" class="img-70 rounded-circle" style="height: 70px !important;">
                        @endif
                       
                    </div>
              </div>
                      <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Product Image </label>
                           <div class="col-sm-9">
                            <div class="field" align="left">

                              <input class="form-control" type="file" name="productImage[]" value="" id="files" multiple="multiple">
                                @if($productId > 0)
                              @foreach($productimages as $images)
                                 <span class="pip"><span class="remove"><a href="{{url('admin/product/delete')}}/{{$images->productimgId}}" onclick="return confirm('Are you sure to delete this product image?')" ></a></span><img class="imageThumb" src="{{asset('product/'.$images->productImage)}}"></span>

                              @endforeach;
                              @endif
                             
                             </div>
                           </div>
              </div>
                     

                     
                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                            <input type="hidden" name="id" value="{{$productId}}">
                        </form>
                      </div>
                     
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          </div>
      
               <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

 
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#productDisplayimg').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});


</script>

<script type="text/javascript">
  $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {

    $("#files").on("change", function(e) {
      var files = e.target.files;
    
        filesLength = files.length;

      for (var i = 0; i < filesLength; i++) {

        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<span class=\"remove\">X</span><img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" + "</span>").insertAfter("#files");
         
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});

  $(document).on('click', '.remove', function(){
            var pips = $('.pip').toArray();
            var $selectedPip = $(this).parent('.pip');
            var index = pips.indexOf($selectedPip[0]);

            var dt = new DataTransfer();
            var files = $("#files")[0].files;

            for (var fileIdx = 0; fileIdx < files.length; fileIdx++) {
                if (fileIdx !== index) {
                dt.items.add(files[fileIdx]);
              }
            }

            $("#files")[0].files = dt.files;

            $selectedPip.remove();
          });
</script>
<style type="text/css">
 
  input[name="productAllimg"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  /*border: 2px solid;*/
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
    position: relative;

}
.remove {
  /*display: block;*/
 
  color: #000;
  cursor: pointer;
  position: absolute;
  z-index: 5;
  right:5px;
  font-size: 16px;
 font-weight: 700;
  

}
.remove:hover {
  
  color: #000;
}
</style>
    
@endsection