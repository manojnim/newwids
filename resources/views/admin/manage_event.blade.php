@extends('admin/layout')
@section('page_title','Add Event')
@section('event-selected','link-nav active')
   
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
                          <h5 class="pull-left">Add Event</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('event.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf
                          <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">Organizer Name</label>
                                <div class="col-sm-9">
                              <select class="js-example-basic-single  form-control" name="eventOrganizer_id" id="eventOrganizer_id">
                                 
                                <option value="">Select Organizer</option>

                                 @foreach($organizer as $org)
                                 @if($eventOrganizer_id == $org->userId)
                                <option value="{{$org->userId}}" selected="selected">{{$org->userFirstname}} {{$org->userLastname}}</option>
                                @else
                                   <option value="{{$org->userId}}" {{ old('eventOrganizer_id') == $org->userId ? 'selected' : '' }}>{{$org->userFirstname}} {{$org->userLastname}}</option>
                                @endif
                               @endforeach
                               
                              </select>
                               <span class="form-text text-danger">
                              @error('eventOrganizer_id') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>


                            <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">Exhibitor Name</label>
                                <div class="col-sm-9">
                              <select class="js-example-basic-single  form-control" name="eventExhibitor_id" id="eventExhibitor_id">
                                 
                                <option value="">Select Exhibitor</option>

                                 @foreach($exhibitor as $exh)

                                
                                 @if($eventExhibitor_id == $exh->exhibitorId)
                                <option value="{{$exh->exhibitorId}}" selected="selected">{{$exh->exhibitorCompanyname}} </option>
                                @else
                                   <option value="{{$exh->exhibitorId}}" {{ old('eventExhibitor_id') == $exh->exhibitorId ? 'selected' : '' }}>{{$exh->exhibitorCompanyname}} </option>
                                @endif
                               @endforeach
                               
                              </select>
                               <span class="form-text text-danger">
                              @error('eventExhibitor_id') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                           <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Event Name</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Event Name" value="{{  $eventName != '' ? $eventName : (old('eventName')) }}" name="eventName"  >
                               <span class="form-text text-danger">
                              @error('eventName') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                             <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">Category</label>
                               <div class="col-sm-9">
                              <select class="js-example-basic-single form-control" name="eventCategory_id" id="eventCategory_id">
                               <option value="">Select Category</option>
                                @foreach($category as $cats)
                                   
                                @if($cats->categoryId == $eventCategory_id))
                                <option value="{{$cats->categoryId}}" selected="selected">{{$cats->categoryName}}</option>
                                @else
                                <option value="{{$cats->categoryId}}" {{ old('eventCategory_id') == $cats->categoryId ? 'selected' : '' }}>{{$cats->categoryName}}</option>

                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('eventCategory_id') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                         <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label"> Start Date/Time</label>
                                <div class="col-sm-9">
                              <div class="row">
                             <div class="col-sm-6">
                            <input class="datepicker-here form-control digits" type="text" placeholder="Start Date"  value="{{  $eventStartdate != '' ? $eventStartdate : (old('eventStartdate')) }}" 
                            name="eventStartdate" id="eventStartdate" data-language="en" data-bs-original-title="" title="">
                           <span class="form-text text-danger">
                              @error('eventStartdate') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                           <div class="col-sm-6 clockpicker">
                            <input class="form-control" type="text" placeholder="Start Time"  value="{{  $eventStarttime != '' ? $eventStarttime : (old('eventStarttime')) }}" name="eventStarttime" id="eventStarttime" data-language="en" data-bs-original-title="" title="" >
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            <span class="form-text text-danger">
                              @error('eventStarttime') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                        </div>
                          
                            </div>
                          </div>
                       

                       
                          <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label"> End Date/Time</label>
                                <div class="col-sm-9">
                              <div class="row">
                             <div class="col-sm-6">
                            <input class="datepicker-here form-control digits" type="text" placeholder="End Date"  value="{{  $eventEnddate != '' ? $eventEnddate : (old('eventEnddate')) }}" name="eventEnddate" id="eventEnddate" data-language="en" data-bs-original-title="" title="">
                           <span class="form-text text-danger">
                              @error('eventEnddate') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                           <div class="col-sm-6 clockpicker">
                            <input class="form-control" type="text" placeholder="End Time"  value="{{  $eventEndtime != '' ? $eventEndtime : (old('eventEndtime')) }}" name="eventEndtime" id="eventEndtime" data-language="en" data-bs-original-title="" title="">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            <span class="form-text text-danger">
                              @error('eventEndtime') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                        </div>
                          
                            </div>
                          </div>
                       

                       
                         
                            <div class="mb-3 row">
                                                          
                             <label class="col-sm-3 col-form-label">General Info</label>
                              <div class="col-sm-9">
                             <div class="col">
                        <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                          <div class="form-check form-check-inline radio radio-primary">
                            <input class="form-check-input" id="radioinline1" type="radio" name="eventType" value="free"  {{ $eventType == 'free' ? 'checked' : '' }} data-bs-original-title="" title="" {{(old('eventType') == 'free') ? 'checked' : ''}}>
                            <label class="form-check-label mb-0" for="radioinline1">Free</label>
                          </div>
                          <div class="form-check form-check-inline radio radio-primary">
                            <input class="form-check-input" id="radioinline2" type="radio" name="eventType" value="paid" {{ $eventType == 'paid' ? 'checked' : '' }}   data-bs-original-title="" title="" {{(old('eventType') == 'paid') ? 'checked' : ''}}  onclick="etype1() ">
                            <label class="form-check-label mb-0" for="radioinline2">Paid</label>
                          </div>
                         
                        </div>
                      </div>
                            </div>
                           </div>

                           <div class=" paid box ">
                            <div class="mb-3  row">
                              <label class="col-sm-3 col-form-label">Amount</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="number" placeholder="Amount" value="{{  $eventAmount != '' ? $eventAmount : (old('eventAmount')) }}" name="eventAmount" id="eventAmount">
                              </div>
                            </div>
                            </div>


                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Location" value="{{  $eventLocation != '' ? $eventLocation : (old('eventLocation')) }}" name="eventLocation" id="eventLocation">
                               <span class="form-text text-danger">
                              @error('eventLocation') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Description</label>
                              <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="eventDescription" placeholder="Event Description">{{  $eventDescription != '' ? $eventDescription : (old('eventDescription')) }}</textarea>
                         
                               <span class="form-text text-danger">
                              @error('eventDescription') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Banner Image1 </label>
                           <div class="col-sm-9">
                              <input class="form-control" type="file" name="eventBanneroneimg" value="{{$eventBanneroneimg}}" id="eventBanneroneimg">
                              <span class="form-text text-danger">
                              @error('eventBanneroneimg') 
                              {{$message}} 
                                @enderror
                            </span>
                            @if($eventBanneroneimg!='')
                       <img src="{{asset('event/'.$eventBanneroneimg)}}" class="img-70 rounded-circle" style="height: 70px !important;">
                       @else
                            <img id="preview-image-before-upload" src="{{asset('admin_assets/images/pre.jpg')}}"
                      alt="preview image" class="img-70 rounded-circle" style="height: 70px !important;">
                        @endif
                       
                    </div>
              </div>
                     

                       <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Banner image2 </label>
                            <div class="col-sm-9">
            <input class="form-control" type="file" name="eventBannertwoimg" value="{{$eventBannertwoimg}}" id="eventBannertwoimg">
            <span class="form-text text-danger">
                              @error('eventBannertwoimg') 
                              {{$message}} 
                                @enderror
                            </span>
                            @if($eventBannertwoimg!='')
                       <img src="{{asset('event/'.$eventBannertwoimg)}}" class="img-70 rounded-circle" style="height: 70px !important;">
                       @else
                        <img id="preview-image-before-upload1" src="{{asset('admin_assets/images/pre.jpg')}}"
                      alt="preview image" class="img-70 rounded-circle" style="height: 70px !important;">
                        @endif
                      
                      </div>
                          </div>


 
                           <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label"> Twitter</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Twitter" value="{{  $eventTwitter != '' ? $eventTwitter : (old('eventTwitter')) }}" name="eventTwitter"  >
                          </div>
                            </div>



                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label"> Facebook</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Facebook" value="{{  $eventFacebook != '' ? $eventFacebook : (old('eventFacebook')) }}" name="eventFacebook"  >
                             
                          </div>
                            </div>

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label"> Linkedin</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Linkedin" value="{{  $eventLinkedin != '' ? $eventLinkedin : (old('eventLinkedin')) }}" name="eventLinkedin"  >
                             
                          </div>
                            </div>


                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label"> Instragram</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Instragram" value="{{  $eventInstragram != '' ? $eventInstragram : (old('eventInstragram')) }}" name="eventInstragram"  >
                              
                          </div>
                            </div>


                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Youtube</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Youtube" value="{{  $eventYoutube != '' ? $eventYoutube : (old('eventYoutube')) }}" name="eventYoutube"  >
                             </div>
                            </div>


                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Skype</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Skype" value="{{  $eventSkype != '' ? $eventSkype : (old('eventSkype')) }}" name="eventSkype"  >
                              
                          </div>
                            </div>


                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Wechat</label>
                               <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Wechat" value="{{  $eventWechat != '' ? $eventWechat : (old('eventWechat')) }}" name="eventWechat"  >
                              
                          </div>
                            </div>
                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                            <input type="hidden" name="id" value="{{$eventId}}">
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
 
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });

 var radioValue = $("input[name='eventType']:checked").val();
  if(radioValue == "paid"){
        var targetBox = $("." + radioValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
      }
});
</script>
 
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#eventBanneroneimg').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});

$(document).ready(function (e) {
 
   
   $('#eventBannertwoimg').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload1').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
<style type="text/css">
  .box{
    display: none;
  }
</style>
    
@endsection