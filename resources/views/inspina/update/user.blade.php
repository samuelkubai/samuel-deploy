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
                                <h5>User Profile</h5>
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

                               <form action="{{ url( '/profile/update/') }}" method="post" enctype="multipart/form-data" >
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                           <div>

                                               <div class=" row form-group ">
                                                   <div class="col-md-12">
                                                       <label class="">Change Profile Picture:</label>
                                                       <input type="file" name="profile" class="form-control" />
                                                   </div>
                                               </div>

                                               <div class="row form-group">
                                                   <div class="col-md-12">
                                                       <input name="email" type="email" class="form-control" placeholder="Group Name" disabled="true" value="{{$user->email}}" required = "required">
                                                   </div>
                                               </div>
                                               <div class="row form-group">
                                                   <div class="col-md-6">
                                                       <input name="firstName" type="text" class="form-control" placeholder="Group's Email" value="{{$user->firstName}}" required = "required">
                                                   </div>
                                                   <div class="col-md-6">
                                                       <input name="lastName" type="text" class="form-control"  placeholder="Unique Username" value="{{$user->lastName}}" required = "required">
                                                   </div>
                                               </div>
                                               <div class="row form-group">
                                                   <div class="col-md-12">
                                                       <input name="telNumber" type="text" class="form-control" placeholder="Group Name" value="{{$user->telNumber}}" required = "required">
                                                   </div>
                                               </div>

                                               <div class="row form-group">
                                                   <div class="col-md-12">
                                                       <input name="password" type="password" class="form-control" placeholder="New Password" >
                                                   </div>
                                               </div>

                                           </div>
                                           <div class="modal-footer">
                                               <a href="{{url('/')}}" class="btn btn-default">Close</a>
                                               <button type="submit" class="btn btn-info">Update</button>
                                           </div>
                                       </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection