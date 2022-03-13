@extends('admin/layout')
@section('page_title','Brochure')
@section('brochure-selected','link-nav active')
  
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
                          <h5 class="pull-left">View Brochure</h5>
                          <div class="pull-right">
                              <a class="btn btn-outline-primary ms-2" href="{{url('admin/brochure/manage_brochure')}}" title="" data-bs-original-title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Add Brochure  </a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                           <th>#ID</th>
                    <th> Type</th>
                    <th> Name</th>
                    <th> File</th>
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
                          <td>{{ $list->brochureFor }}</td>

                          @if($list->brochureFor == "Event")
                             @foreach($event as $event)
                                @if($event->eventId == $list->brochureForid)
                                <td>{{$event->eventName}}</td>
                                  @endif
                                @endforeach
                         @else
                         @foreach($product as $product)
                                @if($product->productId == $list->brochureForid)
                                 <td>{{$product->productName}}</td>
                                   @endif
                                @endforeach
                       

                         @endif
                     @if($list->brochureFile !='')
            <td> 
             
                  <button class="btn btn-category" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$n}}" style="width: 115px !important; "><span class="title">View File</span></button>
                                <div class="modal fade" id="exampleModal-{{$n}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">View File</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>  
                                      <div class="modal-body">
                                <embed src="{{asset('brochure/'.$list->brochureFile)}}" type="application/pdf"   height="300px" width="100%">

                                      </div>
                                    </div>
                                  </div>
                                </div>

             
            </td>
            @else
            <td>-</td>
              @endif
              <td> @if($list->brochureStatus==1)
                                    <a href="#" class="font-primary font-weight-bold">Active</a>
                                 @elseif($list->brochureStatus==0)
                                    <a href="#" class="font-danger font-weight-bold">Deactive</a>

                                @endif
                   
                </td>
               <td> 

 <div class="btn-group" role="group">
                        <button class="btn btn-primary  dropdown-toggle" id="btnGroupVerticalDrop3" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3"> <a href="{{url('admin/brochure/status/1')}}/{{$list->brochureId}}" class="dropdown-item">Active</a>
   <a href="{{url('admin/brochure/status/0')}}/{{$list->brochureId}}" class="dropdown-item">Deactive</a>
   <a href="{{url('admin/brochure/manage_brochure')}}/{{$list->brochureId}}" class="dropdown-item">Edit</a>
    <a href="{{url('admin/brochure/delete')}}/{{$list->brochureId}}" onclick="return confirm('Are you sure to delete this brochure?')" class="dropdown-item">Delete</a></div>
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














  
<style type="text/css">
  .modal-dialog{
    height:600px !important;
}
</style>

@endsection