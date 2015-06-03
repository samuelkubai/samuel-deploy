@extends('inspina.layouts.main')


@section('content')
	<div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                @include('inspina.partials.groupProfile')
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

                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
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
            </div>
        </div>
@stop

@section('validation')
                $("#createfolderbtn").click(function()
                    {
                    alert();
                        if(!validateText("name"))
                            return false;
                        $('form#createfolderform').submit();

                    })
@endsection