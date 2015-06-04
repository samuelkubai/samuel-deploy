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

                                            <div class="col-md-5 col-md-offset-3" >
                                                <a href="{{ url('/groups/all') }}" class="btn btn-primary btn-outline btn-sm btn-rounded">Join New Group</a>
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
