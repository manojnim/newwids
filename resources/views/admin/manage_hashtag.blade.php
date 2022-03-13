@extends('admin/layout')
@section('page_title','Add Hash Tags')
@section('hashtag-selected','link-nav active')
 
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
                          <h5 class="pull-left">Add Hash Tags</h5>
                          
                      </div>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-12">
                    <div class="card">
                     
                      <div class="card-body">
                        <form class="theme-form" action="{{Route('hashtag.insert')}}" method="post" enctype="multipart/form-data">
                             @csrf
                          

                      <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label"> Tag For Event</label>
                              <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="hashtagForevent" placeholder=" Tag For Event">{{  $hashtagForevent != '' ? $hashtagForevent : (old('hashtagForevent')) }}</textarea>
                         
                              
                          </div>
                            </div>

                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label"> Tag For Poll</label>
                              <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="hashtagForpoll" placeholder=" Tag For Poll">{{  $hashtagForpoll != '' ? $hashtagForpoll : (old('hashtagForpoll')) }}</textarea>
                         
                              
                          </div>
                            </div>


                             <div class="mb-3 row">
                              <label class="col-sm-3 col-form-label"> Tag For Agenda</label>
                              <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="hashtagForagenda" placeholder=" Tag For Agenda">{{  $hashtagForagenda != '' ? $hashtagForagenda : (old('hashtagForagenda')) }}</textarea>
                         
                              
                          </div>
                            </div>

                          </div>
                            <div class="card-footer text-sm-end">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                            </div>
                            <input type="hidden" name="id" value="{{$hashtagId}}">
                        </form>
                      </div>
                     
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          </div>
      

@endsection