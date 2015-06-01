@extends('inspina.layouts.main')


@section('content')
	<div class="wrapper wrapper-content" style="padding-top: 2px;">
            <div class="row animated fadeInRight">
                <div class="col-md-4">

                   @include('inspina.partials.userProfile')

                </div>
                <div class="col-md-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Group Activites</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">
                                        @include('inspina.partials.status', ['statuses' => $statuses])
                                </div>

                              @include('inspina.partials.previous_feed_button')

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
@stop