<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>skoolspace | CLientDashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN PLUGIN CSS -->
    <link href="http://localhost:8000/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="http://localhost:8000/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link href="http://localhost:8000/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
    <!-- END CSS TEMPLATE -->

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
                <li class="dropdown" id="header_inbox_bar" > <a href="" class="dropdown-toggle" > <div class="iconset top-messages"></div>  <span class="badge" id="msgs-badge">2</span> </a></li>
                <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle"> <div class="iconset top-chat-white "></div> </a> </li>
            </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav" >
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left">
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >
                            <div class="iconset top-menu-toggle-dark"></div>
                        </a> </li>
                </ul>
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="#" class="" >
                            <div class="iconset top-reload"></div>
                        </a> </li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li class="quicklinks"> <a href="#" class="" >
                            <div class="iconset top-tiles"></div>
                        </a> </li>
                    <li class="m-r-10 input-prepend inside search-form no-boarder">
                        <span class="add-on"> <span class="iconset top-search"></span></span>
                        <input name="" type="text"  class="no-boarder " placeholder="Search Dashboard" style="width:250px;">
                    </li>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right">
                <div class="chat-toggler">
                    <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">
                        <div class="user-details">
                            <div class="username">
                                <span class="badge badge-important">3</span>
                                John <span class="bold">Smith</span>
                            </div>
                        </div>
                        <div class="iconset top-down-arrow"></div>
                    </a>
                    <div id="notification-list" style="display:none">
                        <div style="width:300px">
                            <div class="notification-messages info">
                                <div class="user-profile">
                                    <img src="http://localhost:8000/assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                                </div>
                                <div class="message-wrapper">
                                    <div class="heading">
                                        David Nester - Commented on your wall
                                    </div>
                                    <div class="description">
                                        Meeting postponed to tomorrow
                                    </div>
                                    <div class="date pull-left">
                                        A min ago
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="notification-messages danger">
                                <div class="iconholder">
                                    <i class="icon-warning-sign"></i>
                                </div>
                                <div class="message-wrapper">
                                    <div class="heading">
                                        Server load limited
                                    </div>
                                    <div class="description">
                                        Database server has reached its daily capicity
                                    </div>
                                    <div class="date pull-left">
                                        2 mins ago
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="notification-messages success">
                                <div class="user-profile">
                                    <img src="http://localhost:8000/assets/img/profiles/h.jpg"  alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">
                                </div>
                                <div class="message-wrapper">
                                    <div class="heading">
                                        You haveve got 150 messages
                                    </div>
                                    <div class="description">
                                        150 newly unread messages in your inbox
                                    </div>
                                    <div class="date pull-left">
                                        An hour ago
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-pic">
                        <img src="http://localhost:8000/assets/img/profiles/avatar_small.jpg"  alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="35" height="35" />
                    </div>
                </div>
                <ul class="nav quick-section ">
                    <li class="quicklinks">
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                            <div class="iconset top-settings-dark "></div>
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                            <li><a href=""> My Account</a>
                            </li>
                            <li><a href="">My Calendar</a>
                            </li>
                            <li><a href=""> My Inbox&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a>
                            </li>
                            <li class="divider"></li>
                            <li><a href=""><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                        </ul>
                    </li>
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li class="quicklinks">
                        <a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle" ><div class="iconset top-chat-dark "><span class="badge badge-important hide" id="chat-message-count">1</span></div>
                        </a>
                        <div class="simple-chat-popup chat-menu-toggle hide" >
                            <div class="simple-chat-popup-arrow"></div><div class="simple-chat-popup-inner">
                                <div style="width:100px">
                                    <div class="semi-bold">David Nester</div>
                                    <div class="message">Hey you there </div>
                                </div>
                            </div>
                        </div>
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
    @yield('sidebar_settings')
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
            <div class="user-info-wrapper">
                <div class="profile-wrapper">
                    <img src="http://localhost:8000/assets/img/profiles/avatar.jpg"  alt="" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" width="69" height="69" />
                </div>
                <div class="user-info">
                    <div class="greeting">Welcome</div>
                    <div class="username">John <span class="semi-bold">Smith</span></div>
                    <div class="status">Status<a href="#"><div class="status-icon green"></div>Online</a></div>
                </div>
            </div>
            <!-- END MINI-PROFILE -->

            <!-- BEGIN SIDEBAR MENU -->
            <p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i></i></a></span></p>
            <ul>
                <li class="start active "> <a href=""> <i class="icon-custom-home"></i> <span class="title">Dashboard</span> <span class="selected"></span> </a> </li>
                <li class=""> <a href=""> <i class="icon-custom-ui"></i> <span class="title">Mail</span>  <span class=" badge badge-disable pull-right ">203</span></a> </li>

                <li class=""> <a href="javascript:;"> <i class="icon-custom-form"></i> <span class="title">Forums</span>
                        <span class="badge badge-primary pull-right">5</span> </a>
                    <ul class="sub-menu">
                        <li > <a href="">Class </a> </li>
                        <li > <a href="">School </a> </li>
                    </ul>
                </li>
                <li class=""> <a href="javascript:;"> <i class="icon-custom-portlets"></i> <span class="title">Notifications</span> <span class="badge badge-important pull-right">5</span> </a> </li>
                <li class=""> <a href="javascript:;"> <i class="icon-custom-thumb"></i> <span class="title">Calendar</span>
                    </a>
                    <ul class="sub-menu">
                        <li > <a href=""> School Calendar</a> </li>
                        <li > <a href=""> Intergrated Calendar </a> </li>
                    </ul>
                </li>
                <li class=""> <a href="javascript:;"> <i class="icon-custom-map"></i> <span class="title">Contacts</span>
                    </a>

                </li>

                <li class="hidden-lg hidden-md hidden-xs" id="more-widgets" > <a href="javascript:;"> <i class="fa fa-plus"></i></a>
                    <p class="menu-title">PROJECTS </p>
                    <div class="status-widget">
                        <div class="status-widget-wrapper">
                            <div class="title">Freelancer<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                            <p>Redesign home page</p>
                        </div>
                    </div>
                    <div class="status-widget">
                        <div class="status-widget-wrapper">
                            <div class="title">envato<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                            <p>Statistical report</p>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="side-bar-widgets">
                <p class="menu-title">PROJECTS </p>
                <div class="status-widget">
                    <div class="status-widget-wrapper">
                        <div class="title"><a href="">New DoormRooms</a><a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                        <p>Build New Spacious Doorm Rooms</p>
                    </div>
                </div>
                <div class="status-widget">
                    <div class="status-widget-wrapper">
                        <div class="title"><a href="">envato</a><a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                        <p>Statistical report</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- END SIDEBAR MENU -->
        </div>
        @yield('sidebar')
    </div>
    <a href="#" class="scrollup">Scroll</a>
    <div class="footer-widget">
        <div class="progress transparent progress-small no-radius no-margin">
            <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>
        </div>
        <div class="pull-right">
            <div class="details-status">
                <span data-animation-duration="560" data-value="86" class="animate-number"></span>%
            </div>
            <a href=""><i class="fa fa-power-off"></i></a></div>
    </div>
    <!-- END SIDEBAR -->

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
       @yield('content')
    </div>
    <div class="clearfix"></div>
    <!-- BEGIN CHAT -->
    <div class="chat-window-wrapper">
        <div id="main-chat-wrapper" class="inner-content">
            <div class="chat-window-wrapper scroller scrollbar-dynamic" id="chat-users" >
                <div class="chat-header">
                    <div class="pull-left">
                        <input type="text" placeholder="search">
                    </div>
                    <div class="pull-right">
                        <a href="#" class="" ><div class="iconset top-settings-dark "></div> </a>
                    </div>
                </div>
                <div class="side-widget">
                    <div class="side-widget-title">group chats</div>
                    <div class="side-widget-content">
                        <div id="groups-list">
                            <ul class="groups" >
                                <li><a href="#"><div class="status-icon green"></div>Office work</a></li>
                                <li><a href="#"><div class="status-icon green"></div>Personal vibes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="side-widget fadeIn">
                    <div class="side-widget-title">Messages</div>
                    <div id="favourites-list">
                        <div class="side-widget-content" >
                            <div class="user-details-wrapper active" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                                <div class="user-profile">
                                    <img src="http://localhost:8000/assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                                </div>
                                <div class="user-details">
                                    <div class="user-name">
                                        Jane Smith
                                    </div>
                                    <div class="user-more">
                                        Hello you there?
                                    </div>
                                </div>
                                <div class="user-details-status-wrapper">
                                    <span class="badge badge-important">3</span>
                                </div>
                                <div class="user-details-count-wrapper">
                                    <div class="status-icon green"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">
                                <div class="user-profile">
                                    <img src="http://localhost:8000/assets/img/profiles/c.jpg"  alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35">
                                </div>
                                <div class="user-details">
                                    <div class="user-name">
                                        David Nester
                                    </div>
                                    <div class="user-more">
                                        Busy, Do not disturb
                                    </div>
                                </div>
                                <div class="user-details-status-wrapper">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="user-details-count-wrapper">
                                    <div class="status-icon red"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side-widget">
                    <div class="side-widget-title">Friends Online</div>
                    <div class="side-widget-content" id="friends-list">
                        <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                            <div class="user-profile">
                                <img src="http://localhost:8000/assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    Jane Smith
                                </div>
                                <div class="user-more">
                                    Hello you there?
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">

                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon green"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">
                            <div class="user-profile">
                                <img src="http://localhost:8000/assets/img/profiles/h.jpg"  alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    David Nester
                                </div>
                                <div class="user-more">
                                    Busy, Do not disturb
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">
                                <div class="clearfix"></div>
                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon red"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                            <div class="user-profile">
                                <img src="http://localhost:8000/assets/img/profiles/c.jpg"  alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    Jane Smith
                                </div>
                                <div class="user-more">
                                    Hello you there?
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">

                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon green"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="user-details-wrapper" data-chat-status="busy" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="David Nester">
                            <div class="user-profile">
                                <img src="http://localhost:8000/assets/img/profiles/h.jpg"  alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="user-name">
                                    David Nester
                                </div>
                                <div class="user-more">
                                    Busy, Do not disturb
                                </div>
                            </div>
                            <div class="user-details-status-wrapper">
                                <div class="clearfix"></div>
                            </div>
                            <div class="user-details-count-wrapper">
                                <div class="status-icon red"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chat-window-wrapper" id="messages-wrapper" style="display:none">
                <div class="chat-header">
                    <div class="pull-left">
                        <input type="text" placeholder="search">
                    </div>
                    <div class="pull-right">
                        <a href="#" class="" ><div class="iconset top-settings-dark "></div> </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="chat-messages-header">
                    <div class="status online"></div><span class="semi-bold">Jane Smith(Typing..)</span>
                    <a href="#" class="chat-back"><i class="icon-custom-cross"></i></a>
                </div>
                <div class="chat-messages scrollbar-dynamic clearfix">
                    <div class="inner-scroll-content clearfix">
                        <div class="sent_time">Yesterday 11:25pm</div>
                        <div class="user-details-wrapper " >
                            <div class="user-profile">
                                <img src="http://localhost:8000/assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="bubble">
                                    Hello, You there?
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Yesterday 11:25pm</div>
                        </div>
                        <div class="user-details-wrapper ">
                            <div class="user-profile">
                                <img src="http://localhost:8000/assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="bubble">
                                    How was the meeting?
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Yesterday 11:25pm</div>
                        </div>
                        <div class="user-details-wrapper ">
                            <div class="user-profile">
                                <img src="http://localhost:8000/assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                            </div>
                            <div class="user-details">
                                <div class="bubble">
                                    Let me know when you free
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Yesterday 11:25pm</div>
                        </div>
                        <div class="sent_time ">Today 11:25pm</div>
                        <div class="user-details-wrapper pull-right">
                            <div class="user-details">
                                <div class="bubble sender">
                                    Let me know when you free
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sent_time off">Sent On Tue, 2:45pm</div>
                        </div>
                    </div>
                </div>
                <div class="chat-input-wrapper" style="display:none">
                    <textarea id="chat-message-input" rows="1" placeholder="Type your message"></textarea>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- END CHAT -->
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
<script src="http://localhost:8000/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN CORE TEMPLATE JS -->
<script src="http://localhost:8000/assets/js/core.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/js/chat.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
</body>
</html>