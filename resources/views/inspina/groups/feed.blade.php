@extends('inspina.layouts.main')


@section('content')
	<div class="wrapper wrapper-content" style="padding-top: 0px;  padding-left: 0px; padding-right: 0px;">

            <div class="row animated fadeInRight">
            @include('inspina.partials.groupProfile')
                <div class="col-md-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Group Activites</h5>
                            <div class="ibox-tools">

                            </div>
                        </div>
                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">
                                    @include('inspina.partials.status', ['statuses' => $group->paginatedPosts()])
                                </div>

                                @include('inspina.partials.previous_feed_button', ['statuses' => $group->paginatedPosts()])

                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-md-3 pull-right">
                    @include('inspina.partials.group_features')
                </div>
            </div>
        </div>
@stop