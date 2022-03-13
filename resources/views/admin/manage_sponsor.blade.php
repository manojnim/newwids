@extends('admin/layout')
@section('page_title','Add Sponsor')
@section('sponsor-selected','link-nav active')
   
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
                          <h5 class="pull-left">Add Sponsor</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('sponsor.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf
                            

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Event Name</label>
                                  <div class="col-sm-9">

                              <select class="js-example-basic-single col-sm-12" name="sponsorEvent_id" id="sponsorEvent_id">
                                <option value="-1">Please select </option>
                                 @foreach($event as $evt) 

                                 @if($sponsorEvent_id == $evt->eventId)
                                <option value="{{$evt->eventId}}" selected="selected">{{$evt->eventName}} </option>
                                @else
                                   <option value="{{$evt->eventId}}" {{ old('sponsorEvent_id') == $evt->eventId ? 'selected' : '' }}>{{$evt->eventName}} </option>
                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('sponsorEvent_id') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                          </div>
                              
                          
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Sponsor Name </label>
                              <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Sponsor Name" value="{{  $sponsorName != '' ? $sponsorName : (old('sponsorName')) }}" name="sponsorName" id="sponsorName">
                               <span class="form-text text-danger">
                              @error('sponsorName') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>


                              <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label"> Link </label>
                              <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Link" value="{{  $sponsorLink != '' ? $sponsorLink : (old('sponsorLink')) }}" name="sponsorLink" id="sponsorLink">
                               <span class="form-text text-danger">
                              @error('sponsorLink') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>
                           
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Logo</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="sponsorImage" value="{{$sponsorImage}}" id="sponsorImage">
                            <span class="form-text text-danger">
                              @error('sponsorImage') 
                              {{$message}} 
                                @enderror
                            </span>
                            @if($sponsorImage!='')
                       <img src="{{asset('sponsor/'.$sponsorImage)}}" class="img-70 rounded-circle" style="height: 70px !important;">
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
                            <input type="hidden" name="id" value="{{$sponsorId}}">
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
 
   
   $('#sponsorImage').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
</script>
    
@endsection