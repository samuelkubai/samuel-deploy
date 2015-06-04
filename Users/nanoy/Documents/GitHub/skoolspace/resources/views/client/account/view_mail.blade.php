@extends('default')

@section('sidebar_settings')
    <div class="page-sidebar mini mini-mobile" id="main-menu" data-inner-menu="1">
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrappers">
            @stop
            @section('sidebar')
                <div class="inner-menu nav-collapse">
                    <div id="inner-menu">
                        <div class="inner-wrapper" >
                            <a href="" class="btn btn-block btn-primary" ><span class="bold">COMPOSE</span></a>
                        </div>
                        <div class="inner-menu-content">
                            <p class="menu-title">FOLDER <span class="pull-right"><i class="icon-refresh"></i></span></p>
                        </div>
                        <ul class="big-items">
                            <li><span class="badge badge-important">2</span><a href="" > Inbox</a></li>
                            <li class="active"><a href="">Sent</a></li>
                            <li><a href="">Draft</a></li>
                            <li><a href="">Trash</a></li>
                        </ul>
                    </div>
                </div>
        </div>
        <a href="#" class="scrollup">Scroll</a>
        @stop
        @section('content')
            @include('partials.email.view_mail')
@stop