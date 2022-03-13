@extends('admin/layout')
@section('page_title','Add Speaker')
@section('speaker-selected','link-nav active')
 
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
                          <h5 class="pull-left">Add Speaker</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('speaker.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf
                          
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Event Name</label>
                                  <div class="col-sm-9">

                              <select class="js-example-basic-single col-sm-12" name="speakerEvent_id" id="speakerEvent_id">
                                <option value="-1">Please select </option>
                                 @foreach($event as $evt) 

                                 @if($speakerEvent_id == $evt->eventId)
                                <option value="{{$evt->eventId}}" selected="selected">{{$evt->eventName}} </option>
                                @else
                                   <option value="{{$evt->eventId}}" {{ old('speakerEvent_id') == $evt->eventId ? 'selected' : '' }}>{{$evt->eventName}} </option>
                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('speakerEvent_id') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                          </div>
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">First Name</label>
                                                             <div class="col-sm-9">

                              <input class="form-control" type="text" placeholder="First Name"value="{{  $speakerFirstname != '' ? $speakerFirstname : (old('speakerFirstname')) }}" name="speakerFirstname" id="speakerFirstname">
                               <span class="form-text text-danger">
                              @error('speakerFirstname') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Last Name</label>
                                                            <div class="col-sm-9">

                              <input class="form-control" type="text" placeholder="Last Name"value="{{  $speakerLastname != '' ? $speakerLastname : (old('speakerLastname')) }}" name="speakerLastname" id="speakerLastname">
                               <span class="form-text text-danger">
                              @error('speakerLastname') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                              <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Designation</label>
                                                             <div class="col-sm-9">

                              <input class="form-control" type="text" placeholder="Designation" value="{{  $speakerDesignation != '' ? $speakerDesignation : (old('speakerDesignation')) }}" name="speakerDesignation" id="speakerDesignation">
                               <span class="form-text text-danger">
                              @error('speakerDesignation') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div> 

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Company Name</label>
                                                             <div class="col-sm-9">

                              <input class="form-control" type="text" placeholder="Company Name" value="{{  $speakerCompanyname != '' ? $speakerCompanyname : (old('speakerCompanyname')) }}" name="speakerCompanyname" id="speakerCompanyname">
                               <span class="form-text text-danger">
                              @error('speakerCompanyname') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Highest Education Qualification</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Highest Education Qualification" value="{{  $speakerHighest_education_qualification != '' ? $speakerHighest_education_qualification : (old('speakerHighest_education_qualification')) }}" name="speakerHighest_education_qualification" id="speakerHighest_education_qualification">
                               
                             </div>
                            </div>

                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Topic</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Topic" value="{{  $speakerTopic != '' ? $speakerTopic : (old('speakerTopic')) }}" name="speakerTopic" id="speakerTopic">
                               
                             </div>
                            </div>
                            
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">E-Mail</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="email" placeholder="Email" value="{{  $speakerEmail != '' ? $speakerEmail : (old('speakerEmail')) }}" name="speakerEmail" id="speakerEmail">
                               <span class="form-text text-danger">
                              @error('speakerEmail') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                           
                           <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Phone No.</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Phone No." value="{{  $speakerPhone != '' ? $speakerPhone : (old('speakerPhone')) }}" name="speakerPhone" id="speakerPhone">
                               <span class="form-text text-danger">
                              @error('speakerPhone') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                          

                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Location</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Location" value="{{  $speakerLocation != '' ? $speakerLocation : (old('speakerLocation')) }}" name="speakerLocation" id="speakerLocation">
                               <span class="form-text text-danger">
                              @error('speakerLocation') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div> 

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Linkedin</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="linkedin" value="{{  $speakerLastname != '' ? $speakerLastname : (old('speakerLastname')) }}" name="speakerLinkedin" id="speakerLinkedin">
                               </div>
                            </div> 

                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Profile Picture</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="speakerProfilepic" value="{{$speakerProfilepic}}" id="speakerProfilepic">
                               <span class="form-text text-danger">
                              @error('speakerProfilepic') 
                              {{$message}} 
                                @enderror
                            </span>
                            @if($speakerProfilepic!='')
                       <img src="{{asset('public/gathrr/speaker/'.$speakerProfilepic)}}" class="img-70 rounded-circle" style="height: 70px !important;">
                       @else
                            <img id="preview-image-before-upload" src="{{asset('admin_assets/images/pre.jpg')}}"
                      alt="preview image" class="img-70 rounded-circle" style="height: 70px !important;">
                        @endif
                      
                    </div>
                      </div>

                      <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">About us</label>
                              <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="speakerAboutus" placeholder="about us">{{  $speakerAboutus != '' ? $speakerAboutus : (old('speakerAboutus')) }}</textarea>
                         
                               <span class="form-text text-danger">
                              @error('speakerAboutus') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                          </div>
                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                            <input type="hidden" name="id" value="{{$speakerId}}">
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
 
   
   $('#speakerProfilepic').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
</script>
@endsection