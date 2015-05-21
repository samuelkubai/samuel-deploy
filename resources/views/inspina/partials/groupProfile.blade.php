<div class="col-md-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Group Detail</h5>
        </div>
        <div>
            <div class="ibox-content no-padding border-left-right">
               <a href="{{ url($group->username) }}">
                    <img alt="image" class="img-responsive img-container" src="{{ asset($group->profileSource())}}">
               </a>
            </div>
            <div class="ibox-content profile-content">
                <h4><strong>{{$group->name}}</strong></h4>
                <h5>

                </h5>
                <p>
                    {{$group->description}}
                </p>
                @if(\Auth::user()->id == $group->user_id)
                <div class="user-button">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{url($group->username. '/update/')}}" class="btn btn-default btn-sm btn-block"><i class="fa fa-text"></i> Edit Group</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url($group->username, 'delete')}}" class="btn btn-danger btn-sm btn-block"><i class="fa fa-"></i> Delete Group</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        File Manager
    </div>
                            <div class="ibox-content">
                                <div class="file-manager">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">New Folder</button>
                                    <div class="hr-line-dashed"></div>
                                    @include('inspina.file.partials.createFolder')
                                    <h5>Group Folder</h5>
                                    <ul class="folder-list" style="padding: 0">
                                    @if($group->folders()->get()->count() != 0)
                                    @foreach($group->folders()->get() as $folder)
                                        <li><a href="{{'/manager/'.$group->username.'/'.$folder->id}}"><i class="fa fa-folder"></i> {{$folder->name}}</a></li>
                                    @endforeach
                                    @else
                                        <li><b> <span align="center">No Folders for this group.</span></b></li>
                                    @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Group Features:</h5>
        </div>
        <div>
            <ul class="list-group ">
                <li class="list-group-item fist-item">
                                    <span class="pull-right badge badge-info">
                                        {{ $group->followersCount() }}
                                    </span>
                    <span class="label label-success">1</span> &nbsp;<a href="{{ url($group->username) }}">Followers</a>
                </li>
                <li class="list-group-item fist-item">
                                    <span class="pull-right badge badge-info">
                                        {{ $group->events()->count() }}
                                    </span>
                    <span class="label label-info">2</span> &nbsp;<a href="{{ url($group->username, 'events') }}">Events</a>
                </li>
                <li class="list-group-item fist-item">
                                    <span class="pull-right badge badge-info">
                                        {{ $group->notices()->count() }}
                                    </span>
                    <span class="label label-info">3</span> &nbsp;<a href="{{ url($group->username,'notice') }}">Notices</a>
                </li>

            </ul>
        </div>
    </div>


</div>