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
                            <li class=""><span class="badge badge-important">2</span><a href="" > Inbox</a></li>
                            <li><a href="">Sent</a></li>
                            <li><a href="">Draft</a></li>
                            <li><a href="">Trash</a></li>
                        </ul>
                    </div>
                </div>
        </div>
        <a href="#" class="scrollup">Scroll</a>
        @stop
        @section('content')
            <div id="portlet-config" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>Widget Settings</h3>
                </div>
                <div class="modal-body"> Widget settings form goes here </div>
            </div>
            <div class="clearfix"></div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="grid simple" >
                                    <div class="grid-body no-border" style="min-height: 850px;" >
                                        <br>
                                        <div class="row-fluid " >
                                            <h2>New Message </h2>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Sender</label>
                                                    <span class="help">e.g. "someone@example.com"</span>
                                                    <div class="controls">
                                                        <input type="text" class="form-control ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Subject</label>
                                                    <span class="help">e.g. "Meeting Agenda"</span>
                                                    <div class="controls">
                                                        <input type="text" class="form-control ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <textarea id="text-editor" placeholder="Enter text ..." class="form-control" rows="25"></textarea>
                                                </div>
                                                <div class="form-horizontal col-md-4 pull-right">

                                                    <button class="btn btn-danger btn-cons btn-add" type="button"><i class="icon-envelope"></i> Send</button>
                                                    <button class="btn btn-white btn-cons btn-cancel" type="button">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </div>
@stop