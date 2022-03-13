@extends('admin/layout')
@section('page_title','Product Images')
@section('product-selected','link-nav active')
 
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
                          <h5 class="pull-left">View Product Images</h5>
                          <div class="pull-right">
                              <a class="btn btn-outline-warning ms-2" href="{{url('admin/product')}}" title="" data-bs-original-title=""> Back </a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                           <th>#ID</th>
                    <th>Image</th>
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
                 
            <td><img src="{{asset('productimages/'.$list->productImage)}}" class="img-70 rounded-circle" style="height: 70px !important;"></td>
           
              <td> @if($list->productImgstatus==1)
                                    <a href="#" class="font-primary font-weight-bold">Active</a>
                                 @elseif($list->productImgstatus==0)
                                    <a href="#" class="font-danger font-weight-bold">Deactive</a>

                                @endif
                   
                </td>
               <td> 

 <div class="btn-group" role="group">
                        <button class="btn btn-primary  dropdown-toggle" id="btnGroupVerticalDrop3" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3"> <a href="{{url('admin/product/productistatus/1')}}/{{$list->product_id }}/{{$list->productimgId}}" class="dropdown-item">Active</a>
   <a href="{{url('admin/product/productistatus/0')}}/{{$list->product_id }}/{{$list->productimgId}}" class="dropdown-item">Deactive</a>
    <a href="{{url('admin/product/productidelete')}}/{{$list->product_id }}/{{$list->productimgId}}" onclick="return confirm('Are you sure to delete this product Image?')" class="dropdown-item">Delete</a></div>
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