@extends('admin/layout')
@section('page_title','Agenda')
@section('agenda-selected','link-nav active')
 
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
                          <h5 class="pull-left">View Agenda</h5>
                          <div class="pull-right">
                              <a class="btn btn-outline-primary ms-2" href="{{url('admin/agenda/manage_agenda')}}" title="" data-bs-original-title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Add Agenda  </a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                         <tr>
                       <th>#ID</th>
                    <th>Agenda Name</th>
                    <th>Event Name</th>
                    <th>Speaker Name</th>
                    <th>Event Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Venue</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                           @php
            $n=1;
      @endphp
       @foreach($data as $list)
        <!--  @php
                $spkID = explode(",",$list->agendaSpeaker_id);
               
                @endphp -->
      <tr>
         <td>{{$n++}}</td>
                <td>{{$list->agendaTitle}}</td>
                 <td>{{$list->eventName}}</td>
                   <td>{{ $list->speakerFirstname.'  '.$list->speakerLastname;}}</td>
                    <td>{{$list->agendaDate}}</td>
                  <td>{{$list->agendaStarttime}}</td>
                  <td>{{$list->agendaEndtime}}</td>
                    <td>
                      <button class="btn btn-category" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1-{{$n}}" style="width: 115px !important; "><span class="title">Venue</span></button>
                                <div class="modal fade" id="exampleModal1-{{$n}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Venue</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>  
                                      <div class="modal-body">
                                       {{$list->agendaVenue}}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                    


                    </td>
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
                                       {{$list->agendaDescription}}
                                      </div>
                                    </div>
                                  </div>
                                </div>


                  </td>
              <td> @if($list->agendaStatus==1)
                                    <a href="#" class="font-primary font-weight-bold">Active</a>
                                 @elseif($list->agendaStatus==0)
                                    <a href="#" class="font-danger font-weight-bold">Deactive</a>

                                @endif

                                

                </td>
               <td>  

 <div class="btn-group" role="group">
                        <button class="btn btn-primary  dropdown-toggle" id="btnGroupVerticalDrop3" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3"> <a href="{{url('admin/agenda/status/1')}}/{{$list->agendaId}}" class="dropdown-item">Active</a>
   <a href="{{url('admin/agenda/status/0')}}/{{$list->agendaId}}" class="dropdown-item">Deactive</a>
   <a href="{{url('admin/agenda/manage_agenda')}}/{{$list->agendaId}}" class="dropdown-item">Edit</a>
    <a href="{{url('admin/agenda/delete')}}/{{$list->agendaId}}" onclick="return confirm('Are you sure to delete this agenda?')" class="dropdown-item">Delete</a></div>
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