@extends('inspina')

@section('content')
    <div class="wrapper wrapper-content">
        <form action="{{ url( '/profile/update/') }}" method="post" enctype="multipart/form-data" >
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
                <div class="i  ">
                    <div class="col-md-6">
                        <img alt="image" class="img-responsive" src="{{asset($user->profileSource())}}">
                    </div>
                    <div class=" row form-group ">
                        <h4>Change Profile Picture:</h4>
                        <input type="file" name="profile" class="form-group" />
                    </div>
                </div><br><br>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="email" type="email" class="form-control" placeholder="Group Name" value="{{$user->email}}" required = "required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="firstName" type="text" class="form-control" placeholder="Group's Email" value="{{$user->firstName}}" required = "required">
                    </div>
                    <div class="col-md-6">
                        <input name="lastName" type="text" class="form-control"  placeholder="Unique Username" value="{{$user->lastName}}" required = "required">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="telNumber" type="text" class="form-control" placeholder="Group Name" value="{{$user->telNumber}}" required = "required">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="{{url('/')}}" class="btn btn-default">Close</a>
                <button type="submit" class="btn btn-info">Create</button>
            </div>
        </form>
    </div>
@endsection