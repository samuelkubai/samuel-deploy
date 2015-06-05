@extends('school')

@section('sidebar')
    @include('partials.school.default_nav')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.errors')
            <div class="grid simple ">
                <div class="grid-title no-border">
                    <h4>School  <span class="semi-bold">Information</span></h4>
                    <div class="tools">	<a href="javascript:;" class="collapse"></a>
                        <a href="javascript:;" class="reload"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>


                <div class="grid-body no-border">
                    <h3>All  <span class="semi-bold">Schools</span>
                    <button class="btn btn-info pull-right " data-toggle="modal" data-target="#myModal">+ New School</button>
                    </h3><br>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <br>
                                    <h4 id="myModalLabel" class="semi-bold">New School.</h4>
                                    <p class="no-margin"> You will automatically become the Admin of the school <login class=""></login></p>
                                    <br>
                                </div>
                                <form action="{{ url('/create/school/') }}" method="post" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="modal-body">
                                    <div class="row form-row">
                                        <div class="col-md-6">
                                            <input name="email" type="email" class="form-control" placeholder="School's Email">
                                        </div>
                                        <div class="col-md-6">
                                            <input name="url" type="text" class="form-control" placeholder="School's Main Site Url">
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-md-12">
                                            <input name="schoolName" type="text" class="form-control" placeholder="School's Name">
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                         <div class="col-md-12">
                                             <input name="schoolMotto" type="text" class="form-control" placeholder="School's Motto">
                                         </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-md-6">
                                            <input name="telNumber" type="text" class="form-control" placeholder="School's Tel.Number">                                        </div>
                                        <div class="col-md-6">
                                            <input name="username" type="text" class="form-control" placeholder="Unique Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info">Create</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <!-- /.modal -->
                    <table class="table no-more-tables">
                        <thead>
                        <tr>
                            <th style="width:1%" >
                                <div class="checkbox check-default">
                                    <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                    <label for="checkbox10"></label>
                                </div>
                            </th>
                            <th style="width:20%">School's Name</th>
                            <th style="width:9%">portal url</th>
                            <th style="width:10%">Main site URL</th>
                            <th style="width:7%">Tel. Number</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach( $schools as $school )
                        <tr>
                            <td class="v-align-middle">
                                <div class="checkbox check-default">
                                    <input id="checkbox11" type="checkbox" value="1">
                                    <label for="checkbox11"></label>
                                </div>
                            </td>

                            <td class="v-align-middle">{{ $school->schoolName }} <br>
                                <span class="muted">{{ $school->motto }}</span>
                            </td>
                            <td><span class="muted">{{ url($school->username) }}</span> </td>
                            <td class="v-align-middle"> {{ $school->url }} </td>
                            <td class="v-align-middle"> {{ $school->telNumber }} </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="http://localhost:8000/assets/js/messages_notifications.js" type="text/javascript"></script>
@stop