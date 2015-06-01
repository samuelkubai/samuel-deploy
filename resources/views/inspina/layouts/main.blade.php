<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SS+ | {{$title}}</title>

             <link href="{{ asset('inspina/css/bootstrap.min.css') }}" rel="stylesheet">
            <link href="{{ asset('/inspina/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

            @yield('styles')

            <link href="{{asset('/inspina/css/animate.css')}}" rel="stylesheet">
            <link href="{{ asset('/inspina/css/style.css') }}" rel="stylesheet">

            <link href="{{asset('/datetime/css/bootstrap-datepicker3.css')}}" rel="stylesheet">

            <link href="{{asset('inspina/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">



</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="{{ url('/') }}" class="navbar-brand">skoolspace</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="">
                       <a aria-expanded="false" role="button" href="{{ url('/') }}">
                        <i class="fa fa-home"></i>
                        Home
                        </a>
                    </li>
                    <li>
                          <a href="" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <i class="glyphicon glyphicon-calendar"></i>
                            Events <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                           @foreach(\Auth::user()->follows()->get() as $group)
                             <li><a href="{{ url($group->username, 'events') }}">{{ $group->name }} &nbsp; <span class="badge badge-info test-right">{{ $group->events()->count() }}</span></a></li>
                           @endforeach
                          </ul>
                    </li>
                    <li>
                          <a href="" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <i class="glyphicon glyphicon-pushpin"></i>
                            Pins <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                           @foreach(\Auth::user()->follows()->get() as $group)
                             <li><a href="{{ url($group->username, 'notice') }}">{{ $group->name }} &nbsp; <span class="badge badge-info test-right">{{ $group->notices()->count() }}</span></a></li>
                           @endforeach
                          </ul>
                    </li>

                </ul>
                <ul class="nav navbar-top-links navbar-right">

                    <li>

                          <a  href="" class=" count-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-group"></i>
                            Followed Groups <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu dropdown-messages" role="menu">
                           @foreach(\Auth::user()->follows()->get() as $group)

                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="{{ $group->username }}" class="pull-left">
                                            <img alt="image" class="img-circle img-responsive" src="{{ $group->profileSource() }}">
                                        </a>
                                        <div class="media-body">


                                            <strong>{{ $group->name }}</strong>
                                            <br>
                                            <small class="text-muted">Followers - {{ $group->followersCount() }}</small>

                                        </div>
                                    </div>
                                </li>
                                 <br>
                                <li class="divider"></li>

                           @endforeach
                            @if(\Auth::user()->follows()->get()->count() != 0)
                                 <li class="text-center">
                                 <div class="text-center link-block">
                                    <a href="{{ url('/mygroups') }}"><i class="fa fa-group"></i> All Groups</a>
                                 </div>
                                </li>
                            @else
                                <li class="text-center">
                                 <div class="text-center link-block">
                                    <a href="{{ url('/groups/all') }}"><i class="fa fa-group"></i>Join Groups</a>
                                 </div>
                                </li>
                            @endif
                          </ul>

                    </li>

                    <li>
                       <a aria-expanded="false" role="button" href="{{ url("/create/group ") }}"> Create Your Group</a>
                    </li>
                    <li>

                          <a  href="" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i>
                            {{\Auth::user()->firstName . ' '. \Auth::user()->lastName }} <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                                <li><a href="{{url('/profile/update')}}"><i class="fa fa-wrench"></i> Profile</a></li>
                                <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Log out</a></li>
                          </ul>

                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <div class="row wrapper ultra-skin border-bottom page-heading " style="color: #ffffff">
            <div class="col-sm-12 ">

                <h2 align="center">{{ $title }}</h2>
                <span><div  class="text-muted" align="center" style="color: wheat">Share, Notify, Be informed, This is <b>skoolspace</b>.</div></span>
            </div>
        </div>
            <br>

        @include('inspina.partials.messenger')
         <div class="wrapper wrapper-content">
                    <div class="">
                        <div class="">
                            @yield('content')
                        </div>
                    </div>
         </div>
        <div class="footer">
            <div class="pull-right">
                Share, notify, be informed, This is <b>skoolspace</b>.
            </div>
            <div>
                <strong>Copyright</strong> skoolspace &copy; 2015
            </div>
        </div>

        </div>
        </div>


<!-- Mainly scripts -->
<script src="{{ asset('/js/jquery.js') }}"></script>
<!-- <script src="  asset('/inspina/js/bootstrap.min.js') "></script> -->
<script src="{{ asset('/inspina/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/jeditable/jquery.jeditable.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('/inspina/js/inspinia.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('/inspina/js/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('/datetime/js/bootstrap-datepicker.js') }}"></script>



    <!-- Peity -->
    <script src="{{ asset('/inspina/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('/inspina/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('/inspina/js/inspinia.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('/inspina/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('/inspina/js/plugins/toastr/toastr.min.js') }}"></script>


       <!-- Input Mask-->
        <script src="{{ asset('/inspina/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>




</body>

</html>
