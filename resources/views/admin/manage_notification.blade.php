@extends('admin/layout')
@section('page_title','Add Notification')
@section('notification-selected','link-nav active')
  
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
                          <h5 class="pull-left">Add Notification</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('notify.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf

                              <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Title </label>
                              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Title" value="{{ old('notificationTitle') }}" name="notificationTitle" id="notificationTitle">
                               <span class="form-text text-danger">
                              @error('notificationTitle') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>
                            <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">Type </label>
                               <div class="col-sm-9">
                              <select class="js-example-disabled-results  form-control" name="notificationType" id="type">
                               <option value="">Select Type</option>
                          <option value="event" {{ old('notificationType') == "event" ? 'selected' : '' }}>Event</option>
                    <option value="custom" {{ old('notificationType') == "custom" ? 'selected' : '' }} >Custom</option>

                              </select>
                               <span class="form-text text-danger">
                              @error('notificationType') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                            
                           <div class="mb-3 myDiv" id="showcustom">
                            <div class="row">
                              <label class="col-sm-3 col-form-label">Custom </label>
                              <div class="col-sm-9">
                <input class="form-control" type="text" placeholder="Custom" value="{{ old('notificationLink') }}" name="notificationLink" id="notificationLink">
                               <span class="form-text text-danger">
                              @error('notificationLink') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              </div>
                            </div>
                         <div class="mb-3 myDiv" id="showevent">
                            <div class="row">
                               <label class="col-sm-3 col-form-label">Event Name </label>
                               <div class="col-sm-9">
                              <select class="js-example-disabled-results  form-control" name="notificationId" id="notificationId">
                               <option value="">Select Event</option>
                                @foreach($event as $events)
                                <option value="{{$events->eventId}}" {{ old('notificationId') == $events->eventId ? 'selected' : '' }}>{{$events->eventName}}</option>

                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('notificationId') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                        </div>
                            </div>


                           
                            <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Image </label>
                           <div class="col-sm-9">
                              <input class="form-control" type="file" name="notificationCustom_image" value="" id="notificationCustom_image">
                              <span class="form-text text-danger">
                                                          </span>
                            <img id="preview-image-before-upload" src="{{asset('admin_assets/images/pre.jpg')}}" alt="preview image" class="img-70 rounded-circle" style="height: 70px !important;">
                                    <span class="form-text text-danger">
                              @error('notificationCustom_image') 
                              {{$message}} 
                                @enderror
                            </span>           
                                </div>
                          </div>
                              <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">Message </label>
                               <div class="col-sm-9">
                                <textarea class="form-control f-14" id="clipboardExample2" rows="4" spellcheck="true" name="notificationMessage">{{ old('notificationMessage') }}</textarea>
                                <span class="form-text text-danger">
                              @error('notificationMessage') 
                              {{$message}} 
                                @enderror
                            </span>
                               </div>
                              </div> 
                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
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
   
    $('#type').on('change', function(){
        
      var demovalue = $(this).val(); 
    
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });
});
</script>
<script type="text/javascript">
  $(document).ready(function (e) {
 
   
   $('#notificationCustom_image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
</script>
<style>
    .myDiv{
        display: none;
    }
    
</style>
    
@endsection