@extends('school')

@section('sidebar')
    @include('partials.school.default_nav')
@stop

@section('css')
    <link href="http://localhost:8000/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="http://localhost:8000/css/style.css" rel="stylesheet">
    <link href="http://localhost:8000/css/style-responsive.css" rel="stylesheet">
@stop
@section('content')
    <div class="chat-room">
        <aside class="mid-side">
            <div class="chat-room-head" style="background-color: purple; ">
                <h3 style="color: #ffffff">Class Space:</h3>
                <form action="chat_room.html#" class="pull-right position">
                    <input type="text" placeholder="Search" class="form-control search-btn" style="color: #000000">
                </form>
            </div>
            <div class="group-rom">
                <div class="first-part odd">Sam Soffes</div>
                <div class="second-part">Hi Mark, have a minute?</div>
                <div class="third-part">12:30</div>
            </div>
            <br>
            <div class="group-rom">
                <div class="first-part">Mark Simmons</div>
                <div class="second-part ">Of course Sam, what you need?</div>
                <div class="third-part">12:31</div>
            </div>
            <div class="group-rom">
                <div class="first-part odd">Sam Soffes</div>
                <div class="second-part">I want you examine the new product</div>
                <div class="third-part">12:32</div>
            </div>
            <div class="group-rom">
                <div class="first-part">Mark Simmons</div>
                <div class="second-part">Ok, send me the pic</div>
                <div class="third-part">12:32</div>
            </div>
            <div class="group-rom">
                <div class="first-part odd">Sam Soffes</div>
                <div class="second-part"><a href="chat_room.html#">product.jpg</a> <span class="text-muted">35.4KB</span>
                    <p><img class="img-responsive" src="assets/img/product.jpg" alt=""></p></div>
                <div class="third-part">12:32</div>
            </div>
            <div class="group-rom">
                <div class="first-part">Mark Simmons</div>
                <div class="second-part">Fantastic job, love it :)</div>
                <div class="third-part">12:32</div>
            </div>
            <div class="group-rom last-group">
                <div class="first-part odd">Sam Soffes</div>
                <div class="second-part">Thanks!!</div>
                <div class="third-part">12:33</div>
            </div>
            <footer>
                <div class="chat-txt">
                    <input type="text" class="form-control">
                </div>
            <!--<div class="btn-groups hidden-sm hidden-xs">
                    <button type="button" class="btn btn-white"><i class="fa fa-meh-o"></i></button>
                    <button type="button" class="btn btn-white"><i class=" fa fa-paperclip"></i></button>
                </div> -->
                <button class="btn btn-theme">Send</button>
            </footer>
        </aside>
        <aside>
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
                                        <li><a href="#"><div class="status-icon green"></div>Class space</a></li>
                                        <li><a href="#"><div class="status-icon green"></div>School space</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="side-widget fadeIn">
                            <div class="side-widget-title">Messages</div>
                            <div id="favourites-list">
                                <div class="side-widget-content" >
                                    <div class="user-details-wrapper active" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith"  >
                                        <div class="user-profile">
                                            <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
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
                                            <img src="assets/img/profiles/c.jpg"  alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35">
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
                            <div class="side-widget-title">Classmates</div>
                            <div class="side-widget-content" id="friends-list">
                                <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                                    <div class="user-profile">
                                        <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">
                                            Jane Smith
                                        </div>
                                        <div class="user-more">

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
                                        <img src="assets/img/profiles/h.jpg"  alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">
                                            David Nester
                                        </div>
                                        <div class="user-more">

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
                                        <img src="assets/img/profiles/c.jpg"  alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35">
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">
                                            Jane Smith
                                        </div>
                                        <div class="user-more">

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
                                        <img src="assets/img/profiles/h.jpg"  alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">
                                            David Nester
                                        </div>
                                        <div class="user-more">

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
                                        <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
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
                                        <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
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
                                        <img src="assets/img/profiles/d.jpg"  alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
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
        </aside>
    </div>
@stop

