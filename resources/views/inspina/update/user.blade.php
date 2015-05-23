@extends('inspina.layouts.main')

@section('content')
    <div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
                    <div class="col-md-4">
                       @include('inspina.partials.userProfile')
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