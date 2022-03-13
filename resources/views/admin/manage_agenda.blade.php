@extends('admin/layout')
@section('page_title','Add Agenda')
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
                          <h5 class="pull-left">Add Agenda</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('agenda.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf

                           <div class="mb-3 row">
                           <label class="col-sm-3 col-form-label">Event Name</label>
                            <div class="col-sm-9">
                               <select class="js-example-disabled-results col-sm-12" name="agendaEvent_id" id="agendaEvent_id">
                                <option value="">Please select </option>
                                @foreach($event as $evts)
                                @if($agendaEvent_id == $evts->eventId)
                                   <option value="{{$evts->eventId}}" selected="selected">{{$evts->eventName}} </option>
                                   @else
                                   <option value="{{$evts->eventId}}">{{$evts->eventName}} </option>
                                   @endif
                               @endforeach
                              </select>
                            <span class="form-text text-danger">
                              @error('agendaEvent_id') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                          </div> 

                          <div class="mb-3 row">
                             <label class="col-sm-3 col-form-label">Event Date</label>
                              <div class="col-sm-9">
                            <input class="datepicker-here form-control digits" type="text" placeholder="Date"  name="agendaDate" id="agendaDate"  value="{{$agendaDate}}">
                           <span class="form-text text-danger">
                              @error('agendaDate') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                          </div>

                          <div class="mb-3 row">
                             <label class="col-sm-3 col-form-label">Title</label>
                              <div class="col-sm-9">
                           <input type="text" name="agendaTitle" placeholder="Title" class="form-control" value="{{$agendaTitle}}">
                              <span class="form-text text-danger">
                              @error('agendaTitle') 
                              {{$message}} 
                                @enderror
                              </span>
                            </div>
                          </div>

                           <div class="mb-3 row">
                             <label class="col-sm-3 col-form-label">Speaker Name</label>
                              <div class="col-sm-9">
                            <select class="js-example-disabled-results  form-control" multiple="multiple" name="agendaSpeaker_id[]">
                            <option value="">Please select </option>
                            @php
                            $spkID = explode(",",$agendaSpeaker_id);
                            @endphp
                                @foreach($speaker as $spk)
                                @if(in_array($spk->speakerId,$spkID))
                                 <option value="{{$spk->speakerId}}" selected="selected">{{$spk->speakerFirstname}} {{$spk->speakerLastname}}</option>
                                @else
                                 <option value="{{$spk->speakerId}}" {{ old('agendaSpeaker_id') == $spk->speakerId ? 'selected' : '' }}>{{$spk->speakerFirstname}} {{$spk->speakerLastname}}</option>
                                @endif
                                  
                               @endforeach
                                </select>
                           <span class="form-text text-danger">
                              @error('agendaSpeaker_id') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                          </div>


                          


                           <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label"> Start/End  Time</label>
                                <div class="col-sm-9">
                              <div class="row">
                             <div class="col-sm-6 clockpicker">
                           

                             <input class="form-control" type="text" placeholder="Start Time"  value="{{  $agendaStarttime != '' ? $agendaStarttime : (old('agendaStarttime')) }}" name="agendaStarttime" id="agendaStarttime" data-language="en" data-bs-original-title="" title="" >
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            <span class="form-text text-danger">
                              @error('agendaStarttime') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                           <div class="col-sm-6 clockpicker">
                            <input class="form-control" type="text" placeholder="End Time"  value="{{  $agendaEndtime != '' ? $agendaEndtime : (old('agendaEndtime')) }}" name="agendaEndtime" id="agendaEndtime" data-language="en" data-bs-original-title="" title="" >
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            <span class="form-text text-danger">
                              @error('agendaEndtime') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                        </div>
                          
                            </div>
                          </div>
                       








                           <div class="mb-3 row">
                             <label class="col-sm-3 col-form-label">Venue</label>
                              <div class="col-sm-9">
                           <input type="text" name="agendaVenue" placeholder="Venue" class="form-control" value="{{$agendaVenue}}">
                  <span class="form-text text-danger">
                              @error('agendaVenue') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                          </div>

                        <div class="mb-3 row">
                             <label class="col-sm-3 col-form-label">Description</label>
                              <div class="col-sm-9">
                           <textarea name="agendaDescription" placeholder="Description" class="form-control" row="1">{{$agendaDescription}}</textarea>
                    <span class="form-text text-danger">
                              @error('agendaDescription') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                          </div>

                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                         <input type="hidden" name="id" value="{{$agendaId}}">
                        </form>
                      </div>
                     
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          </div>
      
            
    
@endsection