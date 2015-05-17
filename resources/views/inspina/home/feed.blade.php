@extends('inspina')


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
                                <img alt="image" class="img-responsive img-container" src="{{asset($user->profileSource())}}">
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
                             <h5>To-Do List</h5>
                        </div>
                        <div>
                        <ul class="list-group ">
                            <li class="list-group-item fist-item">
                                <span class="pull-right">
                                    09:00 pm
                                </span>
                                <span class="label label-success">1</span> Please contact me
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    10:16 am
                                </span>
                                <span class="label label-info">2</span> Sign a contract
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    10:16 am
                                </span>
                                <span class="label label-danger">3</span> Attend the IBM training camp.
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    10:16 am
                                </span>
                                <span class="label label-success">4</span> Refresh the application source code.
                            </li>
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
                                        @foreach($statuses as $status)

                                                <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="http://localhost:8000/inspina/img/profile.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">{{ $status->updated_at }}</small>
                                                        <strong>{{ $status->title }}</strong><br>
                                                        <span class="text-muted">{{ $status->message }}</span>

                                                    </div>
                                                </div>
                                        @endforeach
                                </div>

                                <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Show More</button>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
@stop