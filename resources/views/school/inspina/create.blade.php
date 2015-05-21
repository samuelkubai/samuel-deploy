@extends('inspina.layouts.main')

@section('content')
    <div class="wrapper wrapper-content">
        <form action="{{ url('/create/group/') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
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
                    <div class="col-md-6">
                        <input name="email" type="email" class="form-control" placeholder="Group's Email" required = "required">
                    </div>
                    <div class="col-md-6">
                        <input name="username" type="text" class="form-control" placeholder="Unique Username" required = "required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="name" type="text" class="form-control" placeholder="Group Name" required = "required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="chat-message-form">
                            <div class="form-group">
                                <textarea class="form-control message-input" name="description" placeholder="Brief Description" required = "required"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{url('/admin/groups')}}" class="btn btn-default">Close</a>
                <button type="submit" class="btn btn-info">Create</button>
            </div>
        </form>
    </div>
@endsection