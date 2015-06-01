@extends('inspina.layouts.main')

@section('content')
    <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="row">
                        <div class="col-md-3 pull-left">
                            <a class="btn btn-md btn-rounded btn-default" href="{{ url($group->username) }}"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Back to group feed</a>
                        </div>
                </div><br>
                <div class="col-md-12">
                    @include('inspina.notice.partials.board')
                    <br>

                </div>
                @if($notices==null)
                    <div class="row col-md-12" >
                    @include('inspina.partials.previous_pins')
                    </div>
                @endif
                    <div class="row col-md-12" >
                    @include('inspina.notice.partials.pin')
                    </div>
             </div>
    </div>
@endsection