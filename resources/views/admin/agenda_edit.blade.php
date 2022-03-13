@extends('admin/layout')
@section('page_title','Edit agenda')
@section('aganda-selected','link-nav active')

@section('container')
  
<div class="row">
            <div class="col-sm-12">
                <div class="card">

                   
<form method="post" action="{{ route('agenda.edit',$agendaId) }}" >
        
                      @csrf
                  <div class="card-header">
                    <div class="row">
                            <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="control-label">Event Name</label>
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
                            
                          </div>
                           <span class="form-text text-danger">
                              @error('agendaEvent_id') 
                              {{$message}} 
                                @enderror
                            </span>
                        </div>
                       
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="control-label">Event Date</label>
                            <input class="form-control" type="date" placeholder="Date"  name="agendaDate" id="agendaDate"  value="{{$agendaDate}}">
                           
                          </div>
                           <span class="form-text text-danger">
                              @error('agendaDate') 
                              {{$message}} 
                                @enderror
                            </span>
                        </div>
                            </div>
                  </div>
                  <div class="card-body">
                   
                    <table class="table table-bordered" id="dynamicTable">  
            <tr>
               <th>Title</th>
                <th>Speaker Name</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Venue</th>
                <th>Description</th>
            </tr>
            <tr> 
              <td><input type="text" name="agendaTitle" placeholder="Title" class="form-control" value="{{$agendaTitle}}">
                    <span class="form-text text-danger">
                              @error('agendaTitle') 
                              {{$message}} 
                                @enderror
                            </span>
                </td>  
             <td> <select class="js-example-disabled-results  form-control" multiple="multiple" name="agendaSpeaker_id[]">
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
                </td> 
                <td><input type="time" name="agendaStarttime" placeholder="Start Time" class="form-control" value="{{$agendaStarttime}}">
                    <span class="form-text text-danger">
                              @error('agendaStarttime') 
                              {{$message}} 
                                @enderror
                            </span>
                </td>  
                <td><input type="time" name="agendaEndtime" placeholder=" End Time" class="form-control" value="{{$agendaEndtime}}">
                    <span class="form-text text-danger">
                              @error('agendaEndtime') 
                              {{$message}} 
                                @enderror
                            </span>
                </td>  
                <td><input type="text" name="agendaVenue" placeholder="Venue" class="form-control" value="{{$agendaVenue}}">
                  <span class="form-text text-danger">
                              @error('agendaVenue') 
                              {{$message}} 
                                @enderror
                            </span>
                </td>  
                 <td><textarea name="agendaDescription" placeholder="Description" class="form-control" row="1">{{$agendaDescription}}</textarea>
                    <span class="form-text text-danger">
                              @error('agendaDescription') 
                              {{$message}} 
                                @enderror
                            </span>
                 </td>  
               <!--  <td><button type="button" name="add" id="add" class="btn btn-success"> Add</button></td>   -->
            </tr>  
        </table> 
                      </div>
                     <div class="card-footer text-end">
                      <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Submit</button>
                      <input class="btn btn-light" type="reset" value="Cancel" data-bs-original-title="" title="">
                    </div>
                        
                         <input type="hidden" name="id" value="{{$agendaId}}">

                  </form>
                  </div>
                </div>
              </div>
            </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
            $('#agendaEvent_id').on('change', function() {
               var eventsID = $(this).val();
               if(eventsID) {
                   $.ajax({
                       url: '/getSpeakers/'+eventsID,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                       
                         if(data){
                            $('#agendaSpeaker_id').empty();
                            $('#agendaSpeaker_id').append('<option hidden>Select Speaker </option>'); 
                            $.each(data, function(key, list){
                                $('select[name="agendaSpeaker_id"]').append('<option value="'+ list.id +'">' + list.speakerFirstname +' '+list.speakerLastname +'</option>');
                            });
                        }else{
                            $('#agendaSpeaker_id').empty();
                        }
                     }
                   });
               }else{
                 $('#speakers_id').empty();
               }
            });
            });
        </script>


  
@endsection