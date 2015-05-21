@extends('inspina.layouts.main')

@section('content')
    <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                @include('inspina.partials.groupProfile')
                <div class="col-md-8">
                    @include('inspina.notice.partials.board')
                    @include('inspina.notice.partials.pin')
                </div>
            </div>
    </div>
@endsection