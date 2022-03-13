@extends('admin/layout')
@section('page_title','Poll Hash Tag ')
@section('pollhashtag-selected','link-nav active')
 
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
                          <h5 class="pull-left">View Poll Hash Tag</h5>
                          <div class="pull-right">
                              <a class="btn btn-outline-primary ms-2" href="{{url('admin/pollhashtag/manage_pollhashtag')}}" title="" data-bs-original-title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Add Poll Hash Tag  </a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                         <tr>
                       <th>#ID</th>
                    <th>Poll Name</th>
                    <th>Hash Tag</th>
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
                 <td>{{$list->pollTitle}}</td>
                    <td>{{$list->pollhashtagTitle}}</td>
                   
                
              <td> @if($list->pollhashtagStatus==1)
                    <a href="#" class="font-primary font-weight-bold">Active</a>
                   @elseif($list->pollhashtagStatus==0)
                    <a href="#" class="font-danger font-weight-bold">Deactive</a>

                   @endif

                </td>
               <td> 

 <div class="btn-group" role="group">
                        <button class="btn btn-primary  dropdown-toggle" id="btnGroupVerticalDrop3" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3"> <a href="{{url('admin/pollhashtag/status/1')}}/{{$list->pollhashtagId}}" class="dropdown-item">Active</a>
              <a href="{{url('admin/pollhashtag/status/0')}}/{{$list->pollhashtagId}}" class="dropdown-item">Deactive</a>
<!--               <a href="{{url('admin/eventhashtag/manage_eventhashtag')}}/{{$list->eventhashtagId}}" class="dropdown-item">Edit</a>
 -->    <a href="{{url('admin/pollhashtag/delete')}}/{{$list->pollhashtagId}}" onclick="return confirm('Are you sure to delete this pollhashtag?')" class="dropdown-item">Delete</a></div>
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