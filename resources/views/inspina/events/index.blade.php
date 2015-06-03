@extends('inspina.layouts.main')

@section('content')
                @include('inspina.partials.to_group_feed_nav')

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>All {{ $group->name  }} Events:</h5>
                            @if($group->isOwner(\Auth::user()))
                                <div class="ibox-tools">
                                    <a href="{{ url($group->username.'/events/create') }}" class="btn btn-primary btn-xs">Create new Event</a>
                                </div>
                            @endif
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-1">
                                    <a href="{{ url($group->username . '/events') }}" id="loading-example-btn" class="btn btn-white btn-sm" ><i class="fa fa-refresh"></i> Refresh</a>
                                </div>
                                <form action="{{ url($group->username.'/events/search') }}" method="POST">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-md-11">
                                        <div class="input-group"><input type="text" name="value" placeholder="Search By Event Title" class="input-sm form-control"> <span class="input-group-btn">
                                            <button type="submit" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                    </div>
                                </form>
                            </div>

                            <div class="project-list">

                                <table class="table table-hover">
                                    <tbody>
                                    @if($events->count() != 0)
                                        @foreach($events as $event)
                                        <tr>
                                            <td class="project-status">
                                                 @if($event->status == 1)
                                                    <span class="label label-primary">Active</span></dd>
                                                 @else
                                                    <span class="label label-default">Unactive</span></dd>
                                                 @endif
                                            </td>
                                            <td class="project-title">
                                                <a href="{{ url($event->id .'/events/profile') }}">{{ $event->title }}</a>
                                                <br/>
                                                <small>On {{ $event->date }}</small>
                                            </td>
                                            <td class="project-completion">
                                                Participants: <b>{{ $event->participantsCount() }}</b>
                                            </td>
                                            <td class="project-people">
                                                <div class="btn-group">
                                                @if($event->isAttendedBy(\Auth::user()))
                                                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Attending <span class="caret"></span>
                                                  </button>
                                                  <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ url($event->id . '/events/notAttend') }}">Not Attend</a></li>
                                                  </ul>
                                                @else
                                                  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Not Attending <span class="caret"></span>
                                                  </button>
                                                  <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ url($event->id . '/events/attend') }}">Attend</a></li>
                                                  </ul>
                                                @endif
                                                </div>
                                            </td>
                                            <td class="project-actions">
                                                <a href="{{ url($event->id .'/events/profile') }}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                               @if($group->isOwner(\Auth::user()))
                                                <a href="{{ url($event->id .'/events/update') }}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                               @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <br>
                                        <h2 align="center" >No Events Recorded!</h2>
                                    @endif
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <?php echo $events->render() ?>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection