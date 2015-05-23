 <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>{{$user->firstName}} {{ $user->lastName }}</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <a href="{{ url('/') }}">
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