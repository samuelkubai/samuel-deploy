<p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i></i></a></span></p>
<ul>
    <li class="start active "> <a href="{{ url('/admin') }}"> <i class="fa fa-th-large"></i> <span class="title">Dashboard</span> <span class="selected"></span> </a> </li>
            <li>
                <a href="{{ url('/noAccount') }}"><i class="fa fa-envelope"></i> <span class="title">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
               
                        @if($schools->count() != 0)
                                <ul class="sub-menu">
                                    @foreach($schools as $school)
                                        <li><a href="{{ url('/'. $school->username. '/mail/') }}">{{"- " . $school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                        @endif
            </li>
            <li>
                <a href="{{ url('/noAccount') }}"><i class="fa fa-bullhorn"></i> <span class="title">Forums</span><span class="fa arrow"></span></a>
               
                        @if($schools->count() != 0)
                                <ul class="sub-menu">
                                    @foreach($schools as $school)
                                        <li><a href="{{ url('/admin/community/'. $school->username. '/') }}">{{ "- " .$school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                        @endif
            </li>
            <li>
                <a href="{{ url('admin/timeline')}}"><i class="fa fa-calendar"></i> <span class="title">Events</span><span class="fa arrow"></span></a>
               
                        @if($schools->count() != 0)
                                <ul class="sub-menu">
                                    @foreach($schools as $school)
                                        <li><a href="{{ url('/admin/'. $school->username. '/events/') }}">{{"- " . $school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                        @endif
                   
            </li>
            <li>
                <a href=""><i class="fa fa-building-o"></i> <span class="title">Schools</span> <span class="fa arrow"></span></a>
                <ul class="sub-menu">
                    @if($schools->count() != 0)
                        <li> <a href="{{ url('/schools/') }}">All Schools </a> </li>
                        @foreach($schools as $school)
                            <li > <a href="{{ url('/'.$school->username. '/') }}"> {{"- " . $school->schoolName }}</a> </li>
                        @endforeach
                    @endif
                        <li class="divider"></li>
                    <li> <a href="{{url('/create/school')}}">Create New School +</a> </li>
                </ul>
            </li>
             <li>
                <a href="#"><i class="fa fa-info-circle"></i> <span class="title">Notice Board</span></a>
                        @if($schools->count() != 0)
                                <ul class="sub-menu">
                                    @foreach($schools as $school)
                                        <li><a href="{{ url('/admin/'. $school->username. '/notice/') }}">{{"- " . $school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                            
                        @endif
               
            </li>
    <li class=""> <a href="javascript:;"> <i class="fa fa-picture-o"></i> <span class="title">Gallery</span></a>
    </li>
    <li class=""> <a href="javascript:;"> <i class="fa fa-cogs"></i> <span class="title">Profile</span></a>
    </li>
    <li class=""> <a href="javascript:;"> <i class="fa fa-database"></i> <span class="title">Packages</span></a>
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