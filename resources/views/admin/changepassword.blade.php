 @extends('admin/layout')
@section('page_title','Change Password')
@section('userrole-selected','link-nav active')
 
@section('container')
          <div class="row">
          
              <div class="col-sm-12">
                  @if(session()->has('success'))

              
                          <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
                          <i class="bi-check-circle-fill"></i>
                          <strong> {{session('success')}}.</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      </div>

                               @endif
                <div class="card">
                 <div class="card-header">

                      <div class="header-top">
                          <h5 class="pull-left">Add Change Password</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('change.password')}}" method="post" enctype="multipart/form-data">
                             @csrf
                          
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label"> Old Password</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="password" placeholder="Current Password"  name="current_password" id="current_password">
                               <span class="form-text text-danger">
                              @error('current_password') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label"> New Password</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="password" placeholder="New Password"  name="userPassword" id="userPassword">
                              <div class="show-hide"><span class="show"></span></div>

                               <span class="form-text text-danger">
                              @error('userPassword') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Password Confirmation</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="password" placeholder="New Password"  name="password_confirmation" id="password_confirmation">
                               <span class="form-text text-danger">
                              @error('password_confirmation') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>
<!--                             <input type="hidden" name="id" value="{{session()->get('ADMIN_ID')}}">
 -->                         
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
      
           
    
@endsection