@extends('inspina.layouts.user')


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