@extends('admin/layout')
@section('page_title','Add Video Url')
@section('video-selected','link-nav active')
  
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
                          <h5 class="pull-left">Add Video Url</h5>
                          
                      </div> 
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('video.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf

                              <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">Brochure For</label>
                               <div class="col-sm-9">
                              <select class="js-example-basic-single form-control" name="videoFor" id="videoFor">
                               <option value="">Select for</option>
                            <option value="Event" {{ old('videoFor') == "Event" ? 'selected' : $videoFor }} {{$videoFor == "Event" ? 'selected' : ''}}>Event</option>
                      <option value="Product" {{ old('videoFor') == "Product" ? 'selected' : $videoFor }} {{$videoFor == "Product" ? 'selected' : ''}}>Product</option>
     
                              </select>
                               <span class="form-text text-danger">
                              @error('videoFor') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                           
                            <div class="mb-3 myDiv" id="showEvent">
                            <div class="row">
                               <label class="col-sm-3 col-form-label">Event Name </label>
                               <div class="col-sm-9">
                              <select class="js-example-disabled-results  form-control" name="videoForid" id="videoForid">
                               <option value="">Select Event</option>
                                @foreach($event as $events)
                                @if($videoForid == $events->eventId)
                                <option value="{{$events->eventId}}" selected="selected">{{$events->eventName}}</option>
                                @else
                                <option value="{{$events->eventId}}">{{$events->eventName}}</option>

                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('videoForid') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                        </div>
                            </div>


                             <div class="mb-3 myDiv" id="showProduct">
                            <div class="row">
                               <label class="col-sm-3 col-form-label">Product Name </label>
                               <div class="col-sm-9">
                              <select class="js-example-disabled-results  form-control" name="videoForid1" id="videoForid1">
                               <option value="">Select Product</option>
                                @foreach($product as $products)
                                @if($videoForid == $products->productId)
                                <option value="{{$products->productId}}" selected="selected">{{$products->productName}}</option>
                                  @else
                                <option value="{{$products->productId}}">{{$products->productName}}</option>

                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('videoForid1') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                        </div>
                            </div>
                           
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Video Url</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="text" name="videoUrl"  value="{{$videoUrl}}" id="videoUrl">
                            </div>

                          </div>
                           
                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                            <input type="hidden" name="id" value="{{$videoId}}">
                        </form>
                      </div>
                     
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          </div>
      
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function(){
   
    $('#videoFor').on('change', function(){
        
      var demovalue = $(this).val(); 
    
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });

     var radioValue = $('#videoFor  option:selected').val();
          
  if(radioValue == "Event" || radioValue == "Product"){
        $("#show"+radioValue).show();
      }
});


</script>
    <style>
    .myDiv{
        display: none;
    }
    
</style>
    
@endsection