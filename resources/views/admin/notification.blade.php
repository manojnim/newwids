@extends('admin/layout')
@section('page_title','Notification')
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
                          <h5 class="pull-left">View Notification</h5>
                          <div class="pull-right">
                              <a class="btn btn-outline-primary ms-2" href="{{url('admin/notification/manage_notification')}}" title="" data-bs-original-title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Add Notification  </a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                          <th>#ID</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Image</th>
                    <th>Date</th>
                    <!-- <th>Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                       @php
            $n=1;

      @endphp 
      @foreach($data as $list)
      <tr><td>{{$n++}}</td>
         <td>{{$list->notificationType}}</td>
        <td>{{$list->notificationTitle}}</td>
         <td>

             <button class="btn btn-category" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$n}}" style="width: 115px !important; "><span class="title">Message</span></button>
                                <div class="modal fade" id="exampleModal-{{$n}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Message</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>  
                                      <div class="modal-body">
                                       {{$list->notificationMessage}}
                                      </div>
                                    </div>
                                  </div>
                                </div>



         </td>
        
                     @if($list->notificationCustom_image !='')
            <td><img src="{{asset('notification/'.$list->notificationCustom_image)}}" class="img-70 rounded-circle" style="height: 70px !important;"></td>
            @else
            <td>-</td>
              @endif

         <td>{{date('d-m-Y H:i:s',strtotime($list->created_at))}}</td>
              <!--  <td>  <div class="btn-group" role="group">
                        <button class="btn btn-primary  dropdown-toggle" id="btnGroupVerticalDrop3" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3"> 
    <a href="{{url('admin/notification/delete')}}/{{$list->notificationId}}" onclick="return confirm('Are you sure to delete this notification ?')" class="dropdown-item">Delete</a></div>
                      </div>
               </td> -->
      </tr>
        @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          
@endsection