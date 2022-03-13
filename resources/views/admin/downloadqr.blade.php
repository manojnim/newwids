@extends('admin/layout')
@section('page_title','Download Qrcode')
@section('event-selected','link-nav active')
 
@section('container')
 <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

          <div class="row">
          
              <div class="col-sm-12">
                
                <div class="card">
                 <div class="card-header">

                      <div class="header-top">
                          <div class="pull-left">
                              <a class="btn btn-outline-primary ms-2" href="#" title="" data-bs-original-title=""  onclick="generatePDF()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg> Download  </a>
                          </div>
                           <div class="pull-right">
                              <a class="btn btn-outline-warning ms-2" href="{{url('admin/event')}}" title="" data-bs-original-title=""  onclick="generatePDF()">Back</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="qrdata" id="invoice">
@if($data['0']->eventQrcode !='')<img src="{{$data['0']->eventQrcode}}" >
              @else
              -
              @endif
</div> 
                  </div>
                </div>
              </div>
          </div>
         <script>
    function generatePDF() {
        const element = document.getElementById('invoice');
        
        html2pdf().from(element).set({

    filename: 'EVENTQRCODE-{{$data['0']->eventCode}}.pdf',
   
  }).save();

    }
</script> 
<style type="text/css">
	.qrdata{
		margin-left: 200px !important;
	}
</style>
@endsection