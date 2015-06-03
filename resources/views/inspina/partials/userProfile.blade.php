 <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>{{$user->firstName}} {{ $user->lastName }}</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <a href="{{ url('/profile/update') }}">
                                    <img alt="image" class="img-preview" src="{{asset($user->profileSource())}}">
                                </a>
                            </div>
                            <div class="ibox-content profile-content">

                                <div class="user-button">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{ url('/mygroups') }}" class="btn btn-info btn-sm btn-rounded btn-outline"><i class="fa fa-group"></i> My Groups</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{ url('/groups/all') }}" class="btn btn-primary btn-sm btn-rounded">Join Groups</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{ url('/profile/update') }}" class="btn btn-info btn-sm btn-rounded btn-outline"><i class="glyphicon glyphicon-user"></i> My Profile</a>
                                            </div>
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
                        <?php $counter = 1 ?>
                        @foreach($user->followedGroups() as $group)
                            <li class="list-group-item fist-item">
                                <span class="pull-right badge badge-info">
                                    {{ $group->followersCount() }} Followers
                                </span>
                                <span class="label label-success">{{ $counter }}</span> &nbsp;<a href="{{ url($group->username) }}">{{ $group->name }}</a>
                            </li>
                            <?php $counter++ ?>
                         @endforeach
                        </ul>
                    </div>
                    </div>