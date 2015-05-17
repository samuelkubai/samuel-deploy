@extends('admin')

@section('content')
    <div class="wrapper wrapper-content">

       <form action="{{ url( '/events/update/' .$event->id) }}" method="post" >
                              <div class="">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      @if (count($errors) > 0)
                                           <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                      <ul>
                                                          @foreach ($errors->all() as $error)
                                                             <li>{{ $error }}</li>
                                                          @endforeach
                                                      </ul>
                                           </div>
                                      @endif
                                          <div class="row form-group">
                                              <div class="col-md-10">
                                                  <div class="form-group" id="data_1">
                                                      <label class="font-noraml">Select the Date of the Event</label>

                                                      <div class="input-group date">
                                                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="date" value="{{$event->date}}">
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col-md-12">
                                                  <input name="title" type="text" class="form-control" placeholder="Event title" value="{{$event->title}}">
                                              </div>
                                          </div>
                                          <div class="row form-group">
                                              <div class="col-md-12">
                                                  <textarea class="form-control message-input" name="description" placeholder="Event Description">{{ $event->description }}</textarea>

                                              </div>
                                          </div>
                               </div>
                              <div class="modal-footer">
                                  <button type="reset" class="btn btn-white">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                          </form>
    </div>
@endsection