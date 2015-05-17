@extends('admin')

@section('content')
	<div class="wrapper wrapper-content">
		<div class="row animated fadeInLeft">
            <div class="col-lg-12">
            	<button type="button" class="btn btn-info col-lg-12" data-toggle="modal" data-target="#myModal5"> Create a new Event</button>
            </div>
        </div>
        <br/>
		
		@include('inspina.timeline.partials.admin_timeline')

		@include('inspina.timeline.partials.event-modal')

	</div>
@endsection