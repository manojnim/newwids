@extends('admin/layout')
@section('page_title','Add Brochure')
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
                          <h5 class="pull-left">Add Brochure</h5>
                          
                      </div> 
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('brochure.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf

                              <div class="mb-3 row">
                               <label class="col-sm-3 col-form-label">Brochure For</label>
                               <div class="col-sm-9">
                              <select class="js-example-basic-single form-control" name="brochureFor" id="brochureFor">
                               <option value="">Select for</option>
                                <option value="Event" {{ old('brochureFor') == "Event" ? 'selected' : $brochureFor }} {{$brochureFor == "Event" ? 'selected' : ''}}>Event</option>
                                <option value="Product" {{ old('brochureFor') == "Product" ? 'selected' : $brochureFor }} {{$brochureFor == "Product" ? 'selected' : ''}}>Product</option>
     
                              </select>
                               <span class="form-text text-danger">
                              @error('brochureFor') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                            </div>
                           
                            <div class="mb-3 myDiv" id="showEvent">
                            <div class="row">
                               <label class="col-sm-3 col-form-label">Event Name </label>
                               <div class="col-sm-9">
                              <select class="js-example-disabled-results  form-control" name="brochureForid" id="brochureForid">
                               <option value="">Select Event</option>
                                @foreach($event as $events)
                                @if($brochureForid == $events->eventId)
                                <option value="{{$events->eventId}}" selected="selected">{{$events->eventName}}</option>
                                @else
                                <option value="{{$events->eventId}}">{{$events->eventName}}</option>

                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('brochureForid') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                        </div>
                            </div>


                             <div class="mb-3 myDiv" id="showProduct">
                            <div class="row">
                               <label class="col-sm-3 col-form-label">Product Name </label>
                               <div class="col-sm-9">
                              <select class="js-example-disabled-results  form-control" name="brochureForid1" id="brochureForid1">
                               <option value="">Select Product</option>
                                @foreach($product as $products)
                                @if($brochureForid == $products->productId)
                                <option value="{{$products->productId}}" selected="selected">{{$products->productName}}</option>
                                  @else
                                <option value="{{$products->productId}}">{{$products->productName}}</option>

                                @endif
                               @endforeach
                              </select>
                               <span class="form-text text-danger">
                              @error('brochureForid1') 
                              {{$message}} 
                                @enderror
                            </span>
                          </div>
                        </div>
                            </div>
                           
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">brochure File</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="brochureFile"  value="{{$brochureFile}}" id="brochureFile">
                            </div>
                            <canvas id="pdfViewer"></canvas>

                          </div>
                           
                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                            <input type="hidden" name="id" value="{{$brochureId}}">
                        </form>
                      </div>
                     
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          </div>
      
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function(){
   
    $('#brochureFor').on('change', function(){
        
      var demovalue = $(this).val(); 
    
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });

     var radioValue = $('#brochureFor  option:selected').val();
          
  if(radioValue == "Event" || radioValue == "Product"){
        $("#show"+radioValue).show();
      }
});



</script>



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script type="text/javascript">
 
var pdfjsLib = window['pdfjs-dist/build/pdf'];
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

$("#brochureFile").on("change", function(e){
  var file = e.target.files[0]
  if(file.type == "application/pdf"){
    var fileReader = new FileReader();  
    fileReader.onload = function() {
      var pdfData = new Uint8Array(this.result);
      // Using DocumentInitParameters object to load binary data.
      var loadingTask = pdfjsLib.getDocument({data: pdfData});
      loadingTask.promise.then(function(pdf) {
        console.log('PDF loaded');
        
        // Fetch the first page
        var pageNumber = 1;
        pdf.getPage(pageNumber).then(function(page) {
        console.log('Page loaded');
        
        var scale = 1.5;
        var viewport = page.getViewport({scale: scale});

        // Prepare canvas using PDF page dimensions
        var canvas = $("#pdfViewer")[0];
        var context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        // Render PDF page into canvas context
        var renderContext = {
          canvasContext: context,
          viewport: viewport
        };
        var renderTask = page.render(renderContext);
        renderTask.promise.then(function () {
          console.log('Page rendered');
        });
        });
      }, function (reason) {
        // PDF loading error
        console.error(reason);
      });
    };
    fileReader.readAsArrayBuffer(file);
  }
});
</script> -->

    <style>
    .myDiv{
        display: none;
    }
    
</style>
    
@endsection