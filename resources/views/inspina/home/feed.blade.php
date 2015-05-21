@extends('inspina.layouts.main')


@section('content')
	<div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>{{$user->firstName}} {{ $user->lastName }}</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <a href="{{ url('/profile/update') }}">
                                    <img alt="image" class="img-responsive img-container" src="{{asset($user->profileSource())}}">
                                </a>
                            </div>
                            <div class="ibox-content profile-content">
                                <p>
                                E-Mail:
                                    {{$user->email}}
                                </p>
                                <p>
                                 Tel.Number:
                                    {{ $user->telNumber }}
                                </p>
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{ url('/groups') }}" class="btn btn-info btn-md btn-block"><i class="fa fa-laptop"></i> Join New Group</a>
                                        </div>
                                        <!--<div class="col-md-6">
                                            <a href="{{url('/profile/')}}" class="btn btn-danger btn-sm btn-block"><i class="fa fa-"></i> Delete Group</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                             <h5>Followed Groups:</h5>
                        </div>
                        <div>
                        <ul class="list-group ">
                        @foreach($user->followedGroups() as $group)
                            <li class="list-group-item fist-item">
                                <span class="pull-right badge badge-info">
                                    {{ $group->followersCount() }} Followers
                                </span>
                                <span class="label label-success">1</span> &nbsp;<a href="{{ url($group->username) }}">{{ $group->name }}</a>
                            </li>
                         @endforeach
                        </ul>
                    </div>
                    </div>
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

                                <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> More Post</button>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
@stop