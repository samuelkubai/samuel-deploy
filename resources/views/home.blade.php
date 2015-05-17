<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>skoolspace</title>

    <link href="{{ asset('inspina/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/inspina/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    @yield('styles')

    <link href="{{asset('/inspina/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('/inspina/css/style.css') }}" rel="stylesheet">

</head>

<body>

<div id="wrapper " class="skin-1">
@include('partials.inspina.nav')
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to <b>skoolspace</b>.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{asset('inspina/img/a7.jpg')}}">
                                    </a>
                                    <div class="media-body">
                                        <small class="pull-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{asset('inspina/img/a4.jpg')}}">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{asset('inspina/img/profile.jpg')}}">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i> 
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{ url('auth/logout') }}">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
       
        <div class="row">
            <div class="col-lg-12">
                   @yield('content')
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>
{{ asset('') }}
<!-- Mainly scripts -->
<script src="{{ asset('/inspina/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('/inspina/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/jeditable/jquery.jeditable.js') }}"></script>



 <!-- Flot -->
    <script src="{{ asset('/inspina/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/flot/jquery.flot.pie.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('/inspina/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('/inspina/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('/inspina/js/inspinia.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('/inspina/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- GITTER -->
    <script src="{{ asset('/inspina/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('/inspina/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset('/inspina/js/demo/sparkline-demo.js') }}"></script>

    <!-- ChartJS-->
    <script src="{{ asset('/inspina/js/plugins/chartJs/Chart.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('/inspina/js/plugins/toastr/toastr.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('/inspina/js/inspinia.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/pace/pace.min.js') }}"></script>

@yield('scripts')
</body>

</html>
