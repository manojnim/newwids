@extends('admin/layout')
@section('page_title','Add Poll')
@section('poll-selected','link-nav active')
  
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
                          <h5 class="pull-left">Add Poll</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('poll.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf

                             
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Event Name</label>
                                  <div class="col-sm-9">

                              <select class="js-example-basic-single col-sm-12" name="pollEvent_id" id="pollEvent_id">
                                <option value="">Please select </option>
                                 @foreach($event as $evt) 

                                 @if($pollEvent_id == $evt->eventId)
                                <option value="{{$evt->eventId}}" selected="selected">{{$evt->eventName}} </option>
                                @else
                                   <option value="{{$evt->eventId}}" {{ old('pollEvent_id') == $evt->eventId ? 'selected' : '' }}>{{$evt->eventName}} </option>
                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('pollEvent_id') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div> 
                          </div>
                           <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Agenda Name</label>
                                  <div class="col-sm-9">

                              <select class="js-example-basic-single col-sm-12" name="pollAgenda_id" id="pollAgenda_id">
                                <option value="">Please select </option>
                                 @foreach($agenda as $agd) 

                                 @if($pollAgenda_id == $agd->agendaId)
                                <option value="{{$agd->agendaId}}" selected="selected">{{$agd->agendaTitle}} </option>
                                @else
                                   <option value="{{$agd->agendaId}}" {{ old('pollAgenda_id') == $agd->agendaId ? 'selected' : '' }}>{{$agd->agendaTitle}} </option>
                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('pollAgenda_id') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                          </div>
                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Title</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="Title" value="{{  $pollTitle != '' ? $pollTitle : (old('pollTitle')) }}" name="pollTitle" id="pollTitle">
                               <span class="form-text text-danger">
                              @error('pollTitle') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>

                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">A</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="A" value="{{  $pollA != '' ? $pollA : (old('pollA')) }}" name="pollA" id="pollA">
                               <span class="form-text text-danger">
                              @error('pollA') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>


                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">B</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="B" value="{{  $pollB != '' ? $pollB : (old('pollB')) }}" name="pollB" id="pollB">
                               <span class="form-text text-danger">
                              @error('pollB') 
                              {{$message}} 
                                @enderror
                            </span>
                            </div>
                              
                            </div>

                            <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">C</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="C" value="{{  $pollC != '' ? $pollC : (old('pollC')) }}" name="pollC" id="pollC">
                              
                            </div>
                              
                            </div>

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">D</label>
                              <div class="col-sm-9">
                              <input class="form-control" type="text" placeholder="D" value="{{  $pollD != '' ? $pollD : (old('pollD')) }}" name="pollD" id="pollD">
                              
                            </div>
                              
                            </div>

                         
                           
                          
                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                            <input type="hidden" name="id" value="{{$pollId}}">
                        </form>
                      </div>
                     
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          </div>
      
            
    
@endsection