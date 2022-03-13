@extends('admin/layout')
@section('page_title','Add User Role')
@section('userrole-selected','link-nav active')
 
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
                          <h5 class="pull-left">Add User Role</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('userrole.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf
                          
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">User Role Name</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="User role name" value="{{  $roleName != '' ? $roleName : (old('roleName')) }}" name="roleName" id="roleName">
                               <span class="form-text text-danger">
                              @error('roleName') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>
                           
                         
                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                            <input type="hidden" name="id" value="{{$roleId}}">
                        </form>
                      </div>
                     
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          </div>
      
           
    
@endsection