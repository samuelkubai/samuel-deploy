@extends('inspina')

@section('content')
    <div class="wrapper wrapper-content">

        <form action="{{ url('/create/school/') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="email" type="email" class="form-control" placeholder="School's Email">
                    </div>
                    <div class="col-md-6">
                        <input name="url" type="text" class="form-control" placeholder="School's Main Site Url">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="schoolName" type="text" class="form-control" placeholder="School's Name">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="schoolMotto" type="text" class="form-control" placeholder="School's Motto">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="telNumber" type="text" class="form-control" placeholder="School's Tel.Number">                                        </div>
                    <div class="col-md-6">
                        <input name="username" type="text" class="form-control" placeholder="Unique Username">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Create</button>
            </div>
        </form>
    </div>
@endsection