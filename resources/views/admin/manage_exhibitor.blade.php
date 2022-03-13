@extends('admin/layout')
@section('page_title','Add Exhibitor')
@section('exhibitor-selected','link-nav active')
 
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
                          <h5 class="pull-left">Add Exhibitor</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card"> 
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('exhibitor.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf
                             <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">Event Name</label>
                               <div class="col-sm-9">
                              <select class="js-example-basic-single form-control" name="exhibitorEvent_id" id="exhibitorEvent_id">
                               <option value="">Select Type</option>
                                @foreach($event as $tuser)
                                   
                                @if($tuser->eventId == $exhibitorEvent_id)
                                <option value="{{$tuser->eventId}}" selected="selected">{{$tuser->eventName}}</option>
                                @else
                                <option value="{{$tuser->eventId}}" {{ old('userType') == $tuser->eventId ? 'selected' : '' }}>{{$tuser->eventName}}</option>

                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('exhibitorEvent_id') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                           
                              <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Company name</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Company name" value="{{  $exhibitorCompanyname != '' ? $exhibitorCompanyname : (old('exhibitorCompanyname')) }}" name="exhibitorCompanyname" id="exhibitorCompanyname">
                               <span class="form-text text-danger">
                              @error('exhibitorCompanyname') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Company Description</label>
                                <div class="col-sm-9">
                              <textarea class="form-control" type="text" placeholder="Company Description"  name="exhibitorCompanydescription" id="exhibitorCompanydescription">{{  $exhibitorCompanydescription != '' ? $exhibitorCompanydescription : (old('exhibitorCompanydescription')) }}</textarea>
                               <span class="form-text text-danger">
                              @error('exhibitorCompanydescription') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                           </div>
                           <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">E-Mail</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Email" value="{{ $exhibitorEmail   != '' ? $exhibitorEmail   : (old('exhibitorEmail ')) }}" name="exhibitorEmail " id="exhibitorEmail ">
                               <span class="form-text text-danger">
                              @error('exhibitorEmail ') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Phone No.</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Phone no." value="{{  $exhibitorPhone != '' ? $exhibitorPhone : (old('exhibitorPhone')) }}" name="exhibitorPhone" id="exhibitorPhone">
                               <span class="form-text text-danger">
                              @error('exhibitorPhone') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                            
                            @if($exhibitorId =='')
                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="password" placeholder="********" value="{{  $exhibitorPassword != '' ? $exhibitorPassword : (old('exhibitorPassword')) }}" name="exhibitorPassword" id="exhibitorPassword">
                                <div class="show-hide"><span class="show"></span></div>
                               <span class="form-text text-danger">
                              @error('exhibitorPassword') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                            @elseif($exhibitorPassword =='')
                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="password" placeholder="********" value="{{  $exhibitorPassword != '' ? $exhibitorPassword : (old('exhibitorPassword')) }}" name="exhibitorPassword" id="exhibitorPassword">
                                <div class="show-hide"><span class="show"></span></div>
                               <span class="form-text text-danger">
                              @error('exhibitorPassword') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                            @endif


                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Banner Image</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="file" placeholder="Banner Image" value="{{  $exhibitorCompanybannerimage != '' ? $exhibitorCompanybannerimage : (old('exhibitorCompanybannerimage')) }}" name="exhibitorCompanybannerimage" id="exhibitorCompanybannerimage">
                               <span class="form-text text-danger">
                              @error('exhibitorCompanybannerimage') 
                              {{$message}} 
                                @enderror
                            </span>

                             @if($exhibitorCompanybannerimage!='')
                             <img src="{{asset('company/'.$exhibitorCompanybannerimage)}}" class="img-70 rounded-circle" style="height: 70px !important;">
                             @else
                                  <img id="preview-image-before-upload1" src="{{asset('admin_assets/images/pre.jpg')}}"
                            alt="preview image" class="img-70 rounded-circle" style="height: 70px !important;">
                              @endif
                          </div>
                            </div>

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Logo</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="file" placeholder="Logo" value="{{  $exhibitorCompanylogo != '' ? $exhibitorCompanylogo : (old('exhibitorCompanylogo')) }}" name="exhibitorCompanylogo" id="exhibitorCompanylogo">
                               <span class="form-text text-danger">
                              @error('exhibitorCompanylogo') 
                              {{$message}} 
                                @enderror
                            </span>

                             @if($exhibitorCompanylogo!='')
                             <img src="{{asset('company/'.$exhibitorCompanylogo)}}" class="img-70 rounded-circle" style="height: 70px !important;">
                             @else
                                  <img id="preview-image-before-upload2" src="{{asset('admin_assets/images/pre.jpg')}}"
                            alt="preview image" class="img-70 rounded-circle" style="height: 70px !important;">
                              @endif
                       
                          </div>
                            </div>
                         
                           
                            



                         

                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                            <input type="hidden" name="id" value="{{$exhibitorId}}">
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
 
   
   $('#exhibitorCompanybannerimage').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload1').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});



$(document).ready(function (e) {
 
   
   $('#exhibitorCompanylogo').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload2').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});


</script>
<style type="text/css">
 
  #exhibitors{
    display: none;
  }
  #normaluser{
   display: none; 
  }
</style>
    
@endsection