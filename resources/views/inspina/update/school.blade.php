@extends('admin')

@section('content')
    <div class="wrapper wrapper-content">
        <form action="{{ url( $group->username . '/update/') }}" method="post" >
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
                        <input name="email" type="email" class="form-control" placeholder="Group's Email" value="{{$group->email}}" required = "required">
                    </div>
                    <div class="col-md-6">
                        <input name="username" type="text" class="form-control" disabled="true" placeholder="Unique Username" value="{{$group->username}}" required = "required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="name" type="text" class="form-control" placeholder="Group Name" value="{{$group->name}}" required = "required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="chat-message-form">
                            <div class="form-group">
                                <textarea class="form-control message-input" name="description" placeholder="Brief Description" value="{{ $group->description }}" required = "required">{{$group->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{url('admin',$group->username)}}" class="btn btn-default">Close</a>
                <button type="submit" class="btn btn-info">Create</button>
            </div>
        </form>
    </div>
@endsection