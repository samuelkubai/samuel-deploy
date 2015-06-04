@extends('inspina.layouts.user')


@section('content')
	<div class="wrapper wrapper-content" style="padding-top: 2px;">
            <div class="row animated fadeInRight">
                <div class="col-md-3">

                   @include('inspina.partials.userProfile')

                </div>
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
                                        @include('inspina.partials.status', ['statuses' => $statuses])
                                </div>
                            <div class="text-center">
                              <?php echo $statuses->render() ?>
                            </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-md-3">
                @include('inspina.partials.followed_groups')
                </div>
            </div>
        </div>
@stop