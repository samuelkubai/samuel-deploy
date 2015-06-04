<!-- Navigation begins   -->
<nav class="navbar navbar-fixed-top not-collapse bg-g-ln-gray" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html#" class="hover-white-shade-bg" >
           <span style="font-size: x-large;">skoolspace</span>&nbsp; &nbsp; &nbsp;
            <small class="font-w-100 text-gray-alt hidden-xs hidden-sm">Awesome school community platform</small>
        </a>
    </div>
    <div id="top-nav">
        <div class="navbar-dropdown navbar-right navbar-avatar">
            <a href="index.html#" data-target="#topavatar-toggle" class="hover-no-underline dropdown-toggle m-lr-30 mm-lr-10" data-toggle="dropdown">
                <img src="http://localhost:8000/placeholders/avatars/avatar.jpg" class="img-circle" width=25>
                <span class="text-gray-light hidden-sm hidden-xs">John Doe</span>
                <span class="caret text-white hidden-sm hidden-xs"></span>
            </a>
            <ul id="topavatar-toggle" class="dropdown-menu avatar-dropdown">
                <li><a href="settings.html">Settings</a></li>
                <li><a href="login.html">Signup</a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="messages.html">
                    <span class="glyphicon glyphicon-envelope"></span>
		      		<span
                            class="text-white circle-12px bg-orange text-small text-center icon-counter">4</span>
                    <span class="hidden-sm hidden-xs">Messages</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="hidden-sm hidden-xs">Pages</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="messages.html">Inbox</a></li>
                    <li><a href="message-single.html">Message</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="ui.html">UI</a></li>
                    <li><a href="widgets.html">Widgets</a></li>
                    <li><a href="settings.html">Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="signup.html">Signup</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="sidebar bg-gray-dark text-white text-center pushy pushy-left">
    <header class="bg-g-ln-gray p-tb-30 pm-tb-10 p-lr-10 b-bot-2px-gray-dark hidden-xs">
        <a href="index.html#" data-target="#avatar-toggle" class="hover-no-underline dropdown-toggle" data-toggle="dropdown">
            <img src="http://localhost:8000/placeholders/avatars/avatar.jpg" class="img-circle" width=35>
            <span class="text-gray-alt">Welcome</span>
            <span class="text-gray-light">John Doe</span>
            <span class="caret white"></span>
        </a>
    </header>
    <ul id="avatar-toggle" class="dropdown-sidebar-avatar" role="menu" aria-labelledby="dLabel">
        <li><a href="settings.html">Settings</a></li>
        <li><a href="login.html">Sign out</a></li>
    </ul>

    <hr class="no-margin">

    <ul class="unstyled nav">
        <li class="active"><a href="index.html" class="text-left">Dashboard</a></li>
        <li>
            <a href="messages.html" class="text-left">
                Inbox
                <span class="badge bg-blue-light pull-right text-gray-dark brad-small">4</span>
            </a>
        </li>
        <li><a href="gallery.html" class="text-left">Gallery</a></li>
        <li>
            <a href="index.html#" class="text-left dropdown-toggle" data-toggle="dropdown">
                UI Elements
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="ui.html">UI</a></li>
                <li><a href="widgets.html">Widgets</a></li>
            </ul>
        </li>
        <li><a href="pricing.html" class="text-left">Pricing</a></li>
        <li><a href="settings.html" class="text-left">Settings</a></li>
    </ul>

    <div class="bg-gray-dark-shade text-left search">
        <i class="glyphicon glyphicon-search text-gray-alt"></i>
        <input type="text" placeholder="Search" class="input-invisible">
    </div>

    <div class="sidebar-chart chart m-t-30" data-percent="73" data-scale-color="rgba(255,255,255,.2)">
        <div class="percentage text-gray-alt font-w-100">73%</div>
        <div class="label text-gray-alt font-w-100 text-uppercase">Bandwidth</div>
    </div>

</div>

<div class="preloader">
    <div class="timer"></div>
</div>
<!-- Navigation ends   -->