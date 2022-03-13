@extends('admin/layout')
@section('page_title','Agenda')
@section('agenda_selected','active')
 
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
                          <h5 class="pull-left">Add agenda</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                       <form  action="{{Route('agenda.insert')}}"  method="POST" enctype="multipart/form-data">
                      @csrf
                  <div class="card-header">
                    <div class="row">
                            <div class="col-sm-6 col-md-6">
                           <div class="mb-3">
                            <label class="control-label">Event Name</label>
      <select class="js-example-basic-single col-sm-12" name="agendaEvent_id" id="agendaEvent_id">
                                <option value="">Please select </option>
                                @foreach($event as $evts)
                                   <option value="{{$evts->eventId}}" {{ old('agendaEvent_id') == $evts->eventId ? 'selected' : '' }}>{{$evts->eventName}} </option>
                               @endforeach
                              </select>
                            
                          </div>
                        </div>
                       
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="control-label">Event Date</label>
                            <input class="form-control datepicker-here form-control digits" type="text" placeholder="Date"  value="{{ old('agendaDate') }}" name="agendaDate" id="agendaDate" data-language="en" data-bs-original-title="" title="">
                           
                          </div>

                        </div>
                            </div>
                  </div>
                  <div class="card-body">
                    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                    <table class="table table-bordered" id="dynamicTable">  
            <tr>
                 <th>Speaker Name</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Venue</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <tr>
                 <td> <select class="js-example-basic-multiple form-control"  size="10"   name="addmore[0][agendaSpeaker_id]" id="agendaSpeaker_id">
                            <option value="">Please select </option>
                                @foreach($speaker as $spk)
                                   <option value="{{$spk->speakerId}}" {{ old('agendaSpeaker_id') == $spk->speakerId ? 'selected' : '' }}>{{$spk->speakerFirstname}} {{$spk->speakerLastname}}</option>
                               @endforeach
                                </select>
                </td>   
                <td class="clockpicker"><input type="text" name="addmore[0][agendaStarttime]" placeholder="Start Time" value="{{ old('addmore[0][agendaStarttime]') }}" class="form-control" />
                  <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            <span class="form-text text-danger">
                </td>  
                <td class="clockpicker"><input type="text" name="addmore[0][agendaEndtime]" placeholder=" End Time"  value="{{ old('addmore[0][agendaEndtime]') }}" class="form-control" />
                  <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            <span class="form-text text-danger">
                </td>  
                <td><input type="text" name="addmore[0][agendaVenue]" placeholder="Venue" class="form-control" value="{{ old('addmore[0][agendaVenue]') }}"/></td>  
                 <td><textarea name="addmore[0][agendaDescription]" placeholder="Description" class="form-control" row="1">{{ old('addmore[0][agendaDescription]') }}</textarea></td>  
                <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  
            </tr>  


        </table> 
                      </div>
                     <div class="card-footer text-end">
                      <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Submit</button>
                      <input class="btn btn-light" type="reset" value="Cancel" data-bs-original-title="" title="">
                    </div>
                        

                    </form>
                     
                </div>
              </div>
         
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       
<script type="text/javascript">
   
    var i = 0;
      
    $("#add").click(function(){
 
        ++i;
   
         $("#dynamicTable").append('<tr><td> <select class="form-control"  size="10"  name="addmore['+i+'][agendaSpeaker_id]" id="agendaSpeaker_id"><option value="">Please select </option>@foreach($speaker as $spk)<option value="{{$spk->speakerId}}" {{ old('agendaSpeaker_id') == $spk->speakerId ? 'selected' : '' }}>{{$spk->speakerFirstname}} {{$spk->speakerLastname}}</option> @endforeach</select></td><td class="clockpicker"><input type="text" name="addmore['+i+'][agendaStarttime]" placeholder="Start Time" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span><span class="form-text text-danger"></td><td class="clockpicker"><input type="text" name="addmore['+i+'][agendaEndtime]" placeholder=" End Time" class="form-control" /> <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span><span class="form-text text-danger"></td><td><input type="text" name="addmore['+i+'][agendaVenue]" placeholder="Venue" class="form-control" /></td><td><textarea name="addmore['+i+'][agendaDescription]" placeholder="Description" class="form-control" row="1"></textarea></td>  <td><button type="button" class="btn btn-danger remove-tr">-</button></td></tr>');

    
         
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>      
    
@endsection