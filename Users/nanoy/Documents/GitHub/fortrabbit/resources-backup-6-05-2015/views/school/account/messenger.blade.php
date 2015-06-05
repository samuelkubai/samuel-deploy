@extends('school')

@section('sidebar')
    @include('partials.school.default_nav')
@stop

@section('css')
    <link href="http://localhost:8000/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="http://localhost:8000/css/chat-style.css" rel="stylesheet">
    <link href="http://localhost:8000/css/style-responsive.css" rel="stylesheet">
@stop
@section('content')
    <div class="col-md-12">
        <ul class="nav nav-pills" id="tab-4">
            <li class="active"><a href="#tab4hellowWorld">School Forum</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab4hellowWorld">
                <div class="row">
                    @include('partials.forum')
                </div>
            </div>
            <div class="tab-pane" id="tab4FollowUs">
                <div class="row ">
                    @include('partials.forum')
                </div>
            </div>
            <div class="tab-pane " id="tab4Inspire">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Follow us & get updated!</h3>
                        <p>Instantly connect to what's most important to you. Follow your friends, experts, favorite celebrities, and breaking news.</p>
                        <br>
                        <p><a href="#" class="btn-social"><i class="icon-facebook"></i></a> <a href="#" class="btn-social"><i class="icon-twitter"></i> </a> <a href="#" class="btn-social"><i class="icon-dribbble"></i></a> <a href="#" class="btn-social"><i class="icon-pinterest-sign"></i></a> <a href="#" class="btn-social"><i class="icon-tumblr"></i> </a> <a href="#" class="btn-social"><i class="icon-linkedin-sign"></i> </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

