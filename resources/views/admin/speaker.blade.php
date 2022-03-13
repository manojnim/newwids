@extends('admin/layout')
@section('page_title','Speaker')
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
                          <h5 class="pull-left">View Speaker</h5>
                          <div class="pull-right">
                              <a class="btn btn-outline-primary ms-2" href="{{url('admin/speaker/manage_speaker')}}" title="" data-bs-original-title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Add Speaker  </a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                          <th>#ID</th>
                          <th>Event Name</th>
                          <th>Speaker Name</th>
                           <th>Company Name</th>
                           <th>Qualification</th>
                          <th>Email</th>
                          <th>Phone No.</th>
                          <th>Designation</th>
                          <th>About us</th>
                          <th>Profile pic</th>
                          <th>Topic</th>
                          <th>Location</th>
                          <th>Linkedin</th>
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
                  <td>{{$list->eventName}}</td>
               <td>{{$list->speakerFirstname}} {{$list->speakerLastname}}</td>
                <td>{{$list->speakerCompanyname}}</td>
                  <td>{{$list->speakerHighest_education_qualification}}</td>
                 <td>{{$list->speakerEmail}}</td>
                 <td>{{$list->speakerPhone}}</td>
                 <td>{{$list->speakerDesignation}} </td>
                <td>
 <button class="btn btn-category" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$n}}" style="width: 100px !important; "><span class="title">About us</span></button>
                                <div class="modal fade" id="exampleModal-{{$n}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">About us</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>  
                                      <div class="modal-body">
                                       {{$list->speakerAboutus}}
                                      </div>
                                    </div>
                                  </div>
                                </div>

                </td>
                  @if($list->speakerProfilepic !='')
            <td><img src="{{asset('speaker/'.$list->speakerProfilepic)}}" class="img-70 rounded-circle" style="height: 70px !important;"></td>
            @else
            <td>-</td>
              @endif
               <td>{{$list->speakerTopic}}</td>
                 <td>{{$list->speakerLocation}}</td>
                <td>{{$list->speakerLinkedin}}</td>
             <td> @if($list->speakerStatus==1)
                                    <a href="#" class="font-primary font-weight-bold">Active</a>
                                 @elseif($list->speakerStatus==0)
                                    <a href="#" class="font-danger font-weight-bold">Deactive</a>

                                @endif

                </td>
               <td> 

 <div class="btn-group" role="group">
                        <button class="btn btn-primary  dropdown-toggle" id="btnGroupVerticalDrop3" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3"> <a href="{{url('admin/speaker/status/1')}}/{{$list->speakerId}}" class="dropdown-item">Active</a>
   <a href="{{url('admin/speaker/status/0')}}/{{$list->speakerId}}" class="dropdown-item">Deactive</a>
   <a href="{{url('admin/speaker/manage_speaker')}}/{{$list->speakerId}}" class="dropdown-item">Edit</a>
    <a href="{{url('admin/speaker/delete')}}/{{$list->speakerId}}" onclick="return confirm('Are you sure to delete this speaker?')" class="dropdown-item">Delete</a></div>
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