@extends('admin/layout')
@section('page_title','Add Category')
@section('category-selected','link-nav active')
  
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
                          <h5 class="pull-left">Add Category</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('category.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf

                              <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">Category For</label>
                               <div class="col-sm-9">
                              <select class="js-example-basic-single form-control" name="categoryFor" id="categoryFor">
                               <option value="">Select for</option>
                                <option value="1" {{ old('categoryFor') == 1 ? 'selected' : $categoryFor }}>Event</option>
                                <option value="2" {{ old('categoryFor') == 2 ? 'selected' : $categoryFor }}>Product</option>
     
                              </select>
                               <span class="form-text text-danger">
                              @error('categoryFor') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                          
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Category Name </label>
                              <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Category Name" value="{{  $categoryName != '' ? $categoryName : (old('categoryName')) }}" name="categoryName" id="categoryName">
                               <span class="form-text text-danger">
                              @error('categoryName') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>
                           
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Category Picture</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="categoryImage" value="{{$categoryImage}}" id="categoryImage">
                            <span class="form-text text-danger">
                              @error('categoryImage') 
                              {{$message}} 
                                @enderror
                            </span>
                            @if($categoryImage!='')
                       <img src="{{asset('category/'.$categoryImage)}}" class="img-70 rounded-circle" style="height: 70px !important;">
                         @else
                          <img id="preview-image-before-upload" src="{{asset('admin_assets/images/pre.jpg')}}"
                      alt="preview image" class="img-70 rounded-circle" style="height: 70px !important;">
                        @endif
                      
                      </div>
                          </div>
                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                            <input type="hidden" name="id" value="{{$categoryId}}">
                        </form>
                      </div>
                     
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          </div>
      
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#categoryImage').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
</script>
    
@endsection