@extends('admin/layout')
@section('page_title','Add Event Hash Tag')
@section('eventhashtag-selected','link-nav active')
@section('container')
 
<div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <form  action="{{Route('eventhashtag.insert')}}"  method="POST" enctype="multipart/form-data">
                      @csrf
                  <div class="card-header">
                    <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label">Event Name</label>
                                  <div class="col-sm-9">

                              <select class="js-example-basic-single col-sm-12" name="eventhashtagEvent_id" id="eventhashtagEvent_id">
                                <option value="">Please select </option>
                                 @foreach($event as $evt) 

                                 @if($eventhashtagEvent_id == $evt->eventId)
                                <option value="{{$evt->eventId}}" selected="selected">{{$evt->eventName}} </option>
                                @else
                                   <option value="{{$evt->eventId}}" {{ old('eventhashtagEvent_id') == $evt->eventId ? 'selected' : '' }}>{{$evt->eventName}} </option>
                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('eventhashtagEvent_id') 
                              {{$message}} 
                                @enderror
                            </span>
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
                <th>Hash Tag</th>
                <th>Action</th>
            </tr>
            <tr>
              <td><input type="text" name="addmore[0][eventhashtagTitle]" placeholder="Title" value="{{ old('addmore[0][eventhashtagTitle]') }}" class="form-control" />
                </td>  
                
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
              </div>
            </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       
<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
         $("#dynamicTable").append('<tr> <td><input type="text" name="addmore['+i+'][eventhashtagTitle]" placeholder="Title" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">-</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
  
@endsection