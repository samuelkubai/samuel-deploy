@extends('default')

@section('content')
    <div class="row mt">
        <div class="col-lg-12">
            <div class="row content-panel">
                <div class="col-md-4 profile-text mt mb centered">
                    <div class="right-divider hidden-sm hidden-xs">
                        <h4>922</h4>
                        <h6>CLIENTS</h6>
                        <h4>290</h4>
                        <h6>CHAT ROOMS</h6>
                    </div>
                </div><! --/col-md-4 -->

                <div class="col-md-8 profile-text">

                    <h3>{{ $school->schoolName}}</h3>
                    <h6>{{ $school->schoolMotto }}</h6>
                    <p>Client url is: <a href="{{ url('/'.$school->username. '/login') }}" >{{ 'skoolspace.com/'.$school->username. '/'}}</a></p>

                    <br>
                    <p><button class="btn btn-theme"><i class="fa fa-envelope"></i> Send Message To all clients</button>
                        <button class="btn btn-theme"><i class="fa fa-check"></i> Create an Event</button> </p>

                </div><! --/col-md-4 -->


            </div><!-- /row -->
        </div><! --/col-lg-12 -->

        <div class="col-lg-12 mt">
            <div class="row content-panel">
                <div class="panel-heading">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active">
                            <a data-toggle="tab" href="profile.html#overview">Overview</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="profile.html#edit">Edit Profile</a>
                        </li>
                    </ul>
                </div><! --/panel-heading -->

                <div class="panel-body">
                    <div class="tab-content">
                        <div id="overview" class="tab-pane active">
                            <div class="row">
                                <h2>School Statistics</h2>
                            </div><! --/OVERVIEW -->
                        </div><! --/tab-pane -->


                        <div id="edit" class="tab-pane">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2 detailed">
                                    <h4 class="mb">Schools Information</h4>
                                    <form role="form" class="form-horizontal">
                                        <div class="col-md-9">
                                            <div class="form-group ">
                                                <input name="schoolName" value="{{ $school->schoolName }}" type="text" class="form-control" placeholder="Enter the School's Name..">
                                            </div>
                                            <div class="form-group">
                                                <input name="schoolMotto" value="{{ $school->schoolMotto }}" type="text" class="form-control" placeholder="Enter the School's Motto..">
                                            </div>
                                            <div class="form-group">
                                                <input name="username" value="{{ $school->username }}" type="text" class="form-control" placeholder="Enter the School's unique username..">
                                            </div>
                                            <div class="form-group">
                                                <input name="telNumber" value="{{ $school->telNumber }}" type="text" class="form-control" placeholder="Enter the School's TelephoneNumber..">
                                            </div>
                                            <div class="form-group">
                                                <input name="email" value="{{ $school->email }}" type="text" class="form-control" placeholder="Enter the School's E-mail..">
                                            </div>
                                            <div class="form-group">
                                                <input name="url" value="{{ $school ->url }}" type="text" class="form-control" placeholder="Enter the School's Main Site url..">
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" type="submit">Save</button>
                                                    <a href="{{ url('/admin/delete/'.$school->username) }}"><button class="btn btn-theme04 pull-right" type="button">Delete School</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><! --/row -->
                        </div><! --/tab-pane -->
                    </div><!-- /tab-content -->

                </div><! --/panel-body -->

            </div><!-- /col-lg-12 -->
        </div><! --/row -->
    </div><! --/container -->
@stop