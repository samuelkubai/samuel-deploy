<div class="col-md-4" style="padding: ">
     <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>{{$group->name}}</h5>
                            </div>
                            <div>
                                <div class="ibox-content no-padding border-left-right">
                                    <a href="{{ url($group->username) }}">
                                        <img alt="image" class="img-preview" src="{{asset($group->profileSource())}}">
                                    </a>
                                </div>
                                <div class="ibox-content profile-content">
                                    <p align="center">
                                    {{ $group->description }}
                                    </p>
                                    <div class="user-button">

                                        @if($group->isOwner(\Auth::user()))
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{ url($group->username . '/events') }}" class="btn btn-info btn-sm btn-rounded btn-outline"><i class="fa fa-calendar"></i> Events</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{ url($group->username . '/update') }}" class="btn btn-primary btn-sm btn-rounded"><i class="fa fa-edit"></i> Profile</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{ url($group->username . '/notice') }}" class="btn btn-info btn-sm btn-rounded btn-outline"><i class="glyphicon glyphicon-pushpin"></i> Notices</a>
                                            </div>
                                        </div>
                                        @else

                                        <p>Administered by <b> {{ $group->user()->first()->firstName }}  {{ $group->user()->first()->lastName }}</b></p>
                                        <div class="row">
                                            <div class="col-md-4 pull-left">
                                                <a href="{{ url($group->username . '/events') }}" class="btn btn-info btn-sm btn-rounded btn-outline"><i class="fa fa-calendar"></i> Events</a>
                                            </div>
                                            <div class="col-md-4 pull-right">
                                                <a href="{{ url($group->username . '/notice') }}" class="btn btn-info btn-sm btn-rounded btn-outline"><i class="glyphicon glyphicon-pushpin"></i> Notices</a>
                                            </div>
                                        </div>
                                        @endif
                                            <!--<div class="col-md-6">
                                                <a href="{{url('/profile/')}}" class="btn btn-danger btn-sm btn-block"><i class="fa fa-"></i> Delete Group</a>
                                            </div> -->

                                    </div>
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
                                    @foreach($group->mainFolders() as $folder)
                                        <li><a href="{{'/manager/'.$group->username.'/'.$folder->id}}"><i class="fa fa-folder"></i> {{$folder->name}}</a></li>
                                    @endforeach
                                    @else
                                        <li><b> <span align="center">No Folders for this group.</span></b></li>
                                    @endif
                                    </ul>
                                </div>
                            </div>
                        </div>



</div>