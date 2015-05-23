@extends('inspina.layouts.main')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            @include('inspina.partials.groupProfile')
            @if($group->user()->first()->id == \Auth::user()->id)

            <div class="col-lg-8">
                <button type="button" class="btn btn-info col-lg-12" data-toggle="modal" data-target="#myModal5"> Create a new Event</button>
            </div>

            <br/>

            @include('inspina.timeline.partials.admin_timeline')
            <div class="col-lg-8">
                @include('inspina.partials.previous_events')
            </div>
            @include('inspina.timeline.partials.event-modal')
        </div>

        @else
    	@include('inspina.timeline.partials.timeline')
            <div class="col-lg-8">
                @include('inspina.partials.previous_events')
            </div>
        @endif
    </div>
@endsection