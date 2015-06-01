@extends('inspina.layouts.main')

@section('content')
                <div class="row">
                        <div class="col-md-3 pull-left">
                            <a class="btn btn-sm btn-info " href="{{ url($event->group()->first()->username,'events') }}"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Back to Events</a>
                        </div>
                </div><br>
   <div class="row">
            <div class="col-lg-9">

                <div class="wrapper wrapper-content animated fadeInUp" style="padding-top: 0px;">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                    @if($event->group()->first()->isOwner(\Auth::user()))
                                        <a href="{{ url($event->id . '/events/update') }}" class="btn btn-white btn-xs pull-right">Edit project</a>
                                    @endif
                                        <h2>{{ $event->title }}</h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd>
                                        @if($event->status == 1)
                                            <span class="label label-primary">Active</span></dd>
                                        @else
                                            <span class="label label-default">Unactive</span></dd>
                                        @endif

                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Created by:</dt> <dd>{{ $event->group()->first()->name }}</dd>
                                        <dt>Messages:</dt> <dd>  {{ $event->messages()->count() }}</dd>
                                        <dt>Sponsor:</dt> <dd><span class="text-navy"> {{ $event->sponsor }}</span> </dd>

                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd>{{ $event->updated_at }}</dd>
                                        <dt>Created:</dt> <dd>{{ $event->created_at }}</dd>
                                        <dt>Participants:</dt>
                                        <dd> {{ $event->participantsCount() }}</dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="row m-t-sm">
                                <div class="col-lg-12">

                                </div>
                            </div>
                        </div>
                    </div>
    <div class="row">
        <div class="col-lg-12">

                <div class="ibox chat-view">

                    <div class="ibox-title">
                        <small class="pull-right text-muted">You are: <b>{{ \Auth::user()->fullName() }}</b></small>
                         Event Discussion Room
                    </div>


                    <div class="ibox-content">

                        <div class="row">

                            <div class="col-md-9 ">
                                <div class="chat-discussion">
                                @foreach($event->messages() as $message)
                                    <div class="chat-message">
                                        <img class="message-avatar" src="{{ asset($message->user()->first()->profileSource()) }}" alt="" >
                                        <div class="message">
                                            <a class="message-author" href=""> {{ $message->user()->first()->fullName() }} </a>
											<span class="message-date"> {{ $message->created_at }} </span>
                                            <span class="message-content">
                                            {{ $message->message }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="chat-users">


                                    <div class="users-list">
                                        @foreach($event->attending()->get() as $participant)
                                            <div class="chat-user">
                                                <img class="chat-avatar img-responsive" src="{{ asset($participant->profileSource()) }}" alt="" >
                                                <div class="chat-user-name">
                                                    {{ $participant->fullName() }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                        </div>
                        @if($event->isAttendedBy(\Auth::user()))
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="chat-message-form">
                                <form action="{{ url($event->id.'/event/chat/store') }}" method="POST" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <textarea class="form-control message-input" name="message" placeholder="Enter message text"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-block btn-primary" type="submit">Send Message</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        @endif


                    </div>

                </div>
        </div>

    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="wrapper wrapper-content project-manager" style="padding-top: 0px;">
                    <h3>{{ $event->group()->first()->name }}</h3>
                    <img src="{{ asset($event->group()->first()->profileSource()) }}" class="img-responsive" alt=""/>
                    <br>

                    <h4>Event description</h4>
                    <p class="small">
                        {{ $event->description }}
                    </p>

                    <h5>Event files</h5>
                    <small class="muted">From:- Folder:<b> {{ $event->folder()->first()->name }}</b></small>
                    <ul class="list-unstyled project-files">
                    @foreach($event->folder()->first()->files()->get() as $file)
                        <li><a href="{{ url('/download/?download_file='.$file->name) }}"><i class="fa fa-file"></i> &nbsp; {{ $file->name }}</a></li>
                    @endforeach
                    </ul>
                    @if($event->isAttendedBy(\Auth::user()))
                    <div class="text-center m-t-md">
                        @include('inspina.events.partials.fileUpload')
                        <button type="button" class="btn btn-xs btn-block btn-primary"  data-toggle="modal" data-target="#uploadEventFileModal">Add files</button>


                    </div>
                    @endif
                </div>
            </div>
        </div>
@endsection

