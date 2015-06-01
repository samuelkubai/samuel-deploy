@extends('inspina.layouts.main')

@section('content')
    <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                @include('inspina.partials.to_group_feed_nav')
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