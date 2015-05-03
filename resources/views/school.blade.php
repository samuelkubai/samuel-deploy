<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>skoolspace | Mail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN PLUGIN CSS -->
    <link href="http://localhost:8000/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="http://localhost:8000/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link href="http://localhost:8000/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
    <!-- END CSS TEMPLATE -->

    @yield('css')
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation">
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
                <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> </li>
            </ul>
            <!-- BEGIN LOGO -->
            <a href=""><img src="http://localhost:8000/assets/img/skoolspace.png" class="logo" alt=""  data-src="assets/img/skooldspace02.png" data-src-retina="assets/img/logo2x.png" width="106" height="50" style="padding-bottom: 20px;" /></a>
            <!-- END LOGO -->
            <ul class="nav pull-right notifcation-center">
                <li class="dropdown" id="header_task_bar"> <a href="" class="dropdown-toggle active" data-toggle=""> <div class="iconset top-home"></div> </a> </li>
                <li class="dropdown" id="header_inbox_bar"  > <a href="" class="dropdown-toggle" > <div class="iconset top-messages"></div>  <span class="badge" id="msgs-badge"></span> </a></li>
                <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle"> <div class="iconset top-chat-white "></div> </a> </li>
            </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav" >
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left">
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="#" class="" >
                            <div class="iconset top-tiles"></div>
                        </a> </li>
                </ul>
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="#" class="" >
                            <div class="iconset top-reload"></div>
                        </a> </li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>

                    <li class="m-r-10 input-prepend inside search-form no-boarder">
                        <span class="add-on"> <span class="iconset top-search"></span></span>
                        <input name="" type="text"  class="no-boarder " placeholder="Search Skoolspace" style="width:250px;">
                    </li>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right">
                <div class="chat-toggler">
                    <span href="#" class="dropdown-toggler" id="my-task-lists" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">
                        <div class="user-details">
                            <div class="username">
                                David <span class="bold">Williams</span>
                            </div>
                        </div>
                        <div class="iconset "></div>
                    </span>
                    <div class="profile-pic">
                        <img src="http://localhost:8000/inspina/img/profile_small.jpg"  alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="35" height="35" />
                    </div>
                </div>
                <ul class="nav quick-section ">
                    <li class="quicklinks">
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                            <div class="iconset top-settings-dark "></div>
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                            <li><a href="">Profile</a>
                            </li>
                            <li><a href="">Contacts</a>
                            </li>
                            <li><a href=""> Mailbox </li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->

    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    @yield('sidebar')
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body"> Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>
        <div class="content">
            @yield('content')
        </div>
            @yield('other')
    </div>

</div>
<!-- END CONTAINER -->

<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->

<script src="http://localhost:8000/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="http://localhost:8000/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- Page js -->
@yield('scripts')
<script src="http://localhost:8000/assets/js/messages_notifications.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/js/tabs_accordian.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="http://localhost:8000/assets/js/core.js" type="text/javascript"></script>
<!--<script src="http://localhost:8000/assets/js/chat.js" type="text/javascript"></script>-->
<!-- END CORE TEMPLATE JS -->
</body>
</html>