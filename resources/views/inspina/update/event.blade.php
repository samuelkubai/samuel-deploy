@extends('inspina.layouts.main')

@section('content')
 <div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        @include('inspina.partials.groupProfile', ['group' => $event->group()])
                    <div class="col-md-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Group Profile</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="ibox-content">
                              <form action="{{ url( '/events/update/' .$event->id) }}" method="post" >
                                                            <div class="">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
              </div>

                    </div>
                </div>
            </div>
@endsection