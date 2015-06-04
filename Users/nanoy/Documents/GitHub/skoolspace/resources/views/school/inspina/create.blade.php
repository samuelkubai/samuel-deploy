@extends('inspina.layouts.main')

@section('content')
    <div class="wrapper wrapper-content">
        <form action="{{ url('create/group') }}" method="post"  id="createschoolform">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="email" id="email" type="email"  class="form-control" placeholder="Group's Email" required = "required">
                    </div>
                    <div class="col-md-6">
                        <input name="username" id="username" type="text" class="form-control" placeholder="Unique Username" required = "required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="name" id="name" type="text" class="form-control" placeholder="Group Name" required = "required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="chat-message-form">
                            <div class="form-group">
                                <textarea class="form-control message-input" name="description" id="description" placeholder="Brief Description" required = "required"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{url('/')}}" class="btn btn-default">Close</a>
                <button type="button" id="createschoolbtn" class="btn btn-info">Create</button>
            </div>
        </form>
    </div>
@endsection

@section('validation')
$("#createschoolbtn").click(function()
                    {
                        if(!validateText("email"))
                            return false;
                        if(!validateText("username"))
                            return false;
                        if(!validateText("name"))
                            return false;
                        if(!validateText("description"))
                            return false;
                        $('form#createschoolform').submit();

                    })
@endsection