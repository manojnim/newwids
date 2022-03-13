@extends('admin/layout')
@section('page_title','Event')
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
                          <h5 class="pull-left">View Event</h5>
                          <div class="pull-right">
                              <a class="btn btn-outline-primary ms-2" href="{{url('admin/event/manage_event')}}" title="" data-bs-original-title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Add Event  </a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                          <th>#ID</th>
                          <th>Attendee</th>
                          <th>Event Name</th>
                           <th>Category  Name</th>
                           <th>Organizer  Name</th>
                          <th>Description</th>
                          <th>Start Date/Time</th>
                          <th>End Date/Time</th>
                          <th>Type</th>
                          <th>Amount</th>
                           <th>Qrcode</th>
                           <th>Status</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                           @php
            $n=1;
      @endphp
       @foreach($data as $list)
        
      <tr>
         <td>{{$n++}}</td>
         <td>Attends</td>
                 <td>{{$list->eventName}}</td>
                 
                  <td>{{$list->categoryName}}</td>
                   
                  <td>{{$list->userFirstname}} {{$list->userLastname}}</td>
                 <td>
                  <button class="btn btn-category" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$n}}" style="width: 115px !important; "><span class="title">Description</span></button>
                                <div class="modal fade" id="exampleModal-{{$n}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Description</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>  
                                      <div class="modal-body">
                                       {{$list->eventDescription}}
                                      </div>
                                    </div>
                                  </div>
                                </div>



                 </td>
                 <td>{{date('d-m-Y',strtotime($list->eventStartdate))}} {{$list->eventStarttime}}</td>
                 <td>{{date('d-m-Y',strtotime($list->eventEnddate))}} {{$list->eventEndtime}}</td>
                    
                 <td>{{$list->eventType}}</td>
                 <td>{{$list->eventAmount}}</td>
            <td>
              <a href="{{url('admin/event/downloadqrcode')}}/{{$list->eventId}}">Download Qrcode</a>
            </td>

             <td> @if($list->eventStatus == '1')
              <a href="#" class="font-primary font-weight-bold">Active</a>
           @else
              <a href="#" class="font-danger font-weight-bold">Deactive</a>

          @endif

                                

                </td>
               <td> 

 <div class="btn-group" role="group">
                        <button class="btn btn-primary  dropdown-toggle" id="btnGroupVerticalDrop3" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3"> <a href="{{url('admin/event/status/1')}}/{{$list->eventId}}" class="dropdown-item">Active</a>
   <a href="{{url('admin/event/status/0')}}/{{$list->eventId}}" class="dropdown-item">Deactive</a>
   <a href="{{url('admin/event/manage_event')}}/{{$list->eventId}}" class="dropdown-item">Edit</a>
    <a href="{{url('admin/event/delete')}}/{{$list->eventId}}" onclick="return confirm('Are you sure to delete this event?')" class="dropdown-item">Delete</a></div>
                      </div>
               </td>
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