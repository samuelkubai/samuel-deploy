@extends('inspina.layouts.main')

@section('content')
    <div class="wrapper wrapper-content">
        <form action="{{ url($event->id.'/events/update/') }}" method="post" id="updateeventform" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                        <div class="form-group">
                                            <label class="font-noraml">&nbsp; &nbsp;&nbsp; <i class="fa fa-calendar"></i> Select the Date of the Event</label>
                                            <br>
                                            <div class="col-sm-10">
                                                <input type="text" name="date" id="date" class="form-control" data-mask="99/99/9999" value="{{ $event->date }}" placeholder="">
                                                <span class="help-block text-muted">(dd/mm/yyyy)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
            <div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="title" id="title" type="text" class="form-control" placeholder="Event Title" value="{{ $event->title }}" required = "required">
                    </div>
                    <div class="col-md-6">
                        <input name="sponsor" id="sponsor" type="text" class="form-control" placeholder="Event Sponsor" value="{{ $event->sponsor }}" required = "required">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="chat-message-form">
                            <div class="form-group">
                                <textarea class="form-control message-input" name="description" id="description" placeholder="Brief Description" required = "required">{{ $event->description }}"</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                   <div class="checkbox i-checks"><label> <input type="checkbox" @if($event->status == 1) checked="checked" @endif  name="status"><i></i> Status </label></div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{url($event->group()->first()->username. '/events')}}" class="btn btn-default">Close</a>
                <button type="button" id="updateeventbtn" class="btn btn-info">Update</button>
                <a href="{{url($event->id . '/events/destroy')}}" class="btn btn-danger">Delete</a>
            </div>
        </form>
    </div>
@endsection


@section('validation')
                $("#updateeventbtn").click(function()
                    {
                        if(!validateText("date"))
                            return false;
                        if(!validateText("title"))
                            return false;
                        if(!validateText("sponsor"))
                            return false;
                        if(!validateText("description"))
                            return false;
                        $('form#updateeventform').submit();

                    })
@endsection