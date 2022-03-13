@extends('admin/layout')
@section('page_title','Add User')
@section('user-selected','link-nav active')
 
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
                          <h5 class="pull-left">Add User</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card"> 
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('user.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf
                             <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">User Type</label>
                               <div class="col-sm-9">
                              <select class="js-example-basic-single form-control" name="userType" id="userType">
                               <option value="">Select Type</option>
                                @foreach($type as $tuser)
                                   
                                @if($tuser->roleId == $userType)
                                <option value="{{$tuser->roleId}}" selected="selected">{{$tuser->roleName}}</option>
                                @else
                                <option value="{{$tuser->roleId}}" {{ old('userType') == $tuser->roleId ? 'selected' : '' }}>{{$tuser->roleName}}</option>

                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('userType') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                          
                         
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">First name</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="First name" value="{{  $userFirstname != '' ? $userFirstname : (old('userFirstname')) }}" name="userFirstname" id="userFirstname">
                               <span class="form-text text-danger">
                              @error('userFirstname') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Last name</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Last name" value="{{  $userLastname != '' ? $userLastname : (old('userLastname')) }}" name="userLastname" id="userLastname">
                               <span class="form-text text-danger">
                              @error('userLastname') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Designation</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Designation" value="{{  $userPosition != '' ? $userPosition : (old('userPosition')) }}" name="userPosition" id="userPosition">
                               <span class="form-text text-danger">
                              @error('userPosition') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                           
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">E-Mail</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Email" value="{{ $userEmail  != '' ? $userEmail  : (old('userEmail')) }}" name="userEmail" id="userEmail">
                               <span class="form-text text-danger">
                              @error('userEmail') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Phone No.</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Phone no." value="{{  $userPhone != '' ? $userPhone : (old('userPhone')) }}" name="userPhone" id="userPhone">
                               <span class="form-text text-danger">
                              @error('userPhone') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>

                            
                            @if($userId =='')
                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="password" placeholder="********" value="{{  $userPassword != '' ? $userPassword : (old('userPassword')) }}" name="userPassword" id="userPassword">
                                <div class="show-hide"><span class="show"></span></div>
                               <span class="form-text text-danger">
                              @error('userPassword') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                            @elseif($userPassword =='')
                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                              <input class="form-control" type="password" placeholder="********" value="{{  $userPassword != '' ? $userPassword : (old('userPassword')) }}" name="userPassword" id="userPassword">
                                <div class="show-hide"><span class="show"></span></div>
                               <span class="form-text text-danger">
                              @error('userPassword') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                            @endif



                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Profile Picture</label>
                           <div class="col-sm-9">
                              <input class="form-control" type="file" name="userProfilepic" value="{{  $userProfilepic != '' ? $userProfilepic : (old('userProfilepic')) }}" id="userProfilepic">
                              <span class="form-text text-danger">
                              @error('userProfilepic') 
                              {{$message}} 
                                @enderror
                            </span>
                            @if($userProfilepic!='')
                       <img src="{{asset('user/'.$userProfilepic)}}" class="img-70 rounded-circle" style="height: 70px !important;">
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
                            <input type="hidden" name="id" value="{{$userId}}">
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
 
   
   $('#userProfilepic').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});


// $(document).ready(function () {

//  var name =  $("select option:selected").text();
//      if(name == 'Exhibitors' || name == 'exhibitors')
//      {
     
//           $("#exhibitors").show();
//           $("#normaluser").hide();
//     }else{
//           $("#normaluser").show();
//           $("#exhibitors").hide();
//     }
// $('#userType').on('change', function() {
//   var names = $(this).find("option:selected").text();
//      if(names == 'Exhibitors' || names == 'exhibitors')
//      {
     
//           $("#exhibitors").show();
//           $("#normaluser").hide();
//       }else{
//           $("#normaluser").show();
//           $("#exhibitors").hide();
//        }
//     });
//  });

</script>
<!-- <style type="text/css">
 
  #exhibitors{
    display: none;
  }
  #normaluser{
   display: none; 
  }
</style> -->
    
@endsection