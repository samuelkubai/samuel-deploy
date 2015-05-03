<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header ski">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="http://localhost:8000/inspina/img/profile_small.jpg" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="">Profile</a></li>
                        <li><a href="">Contacts</a></li>
                        <li><a href="">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    SS+
                </div>
            </li>
            <li>
                <a href="{{ url('/admin') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
            </li>

            <li>
                <a href="{{ url('/noAccount') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
                @if($schools->count() != 0 || $clients->count() != 0 || $admin_schools != null)
                    <ul class="nav nav-second-level">
                        @if($schools->count() != 0)
                            <li> <a href=""> Owner's Mail<span class="arrow "></span></a>
                                <ul class="nav nav-third-level">
                                    @foreach($schools as $school)
                                        <li><a href="{{ url('/'. $school->username. '/mail/') }}">{{"- " . $school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        @if($admin_schools != null)
                            <li > <a href=""> Administrator's Mail<span class="arrow "></span></a>
                                <ul class="nav nav-third-level">
                                    @foreach($admin_schools as $school)
                                        <li><a href="{{ url('/'. $school->username. '/mail/admin') }}">{{"- " . $school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    </ul>
                @endif
            </li>
            <li>
                <a href="{{ url('/noAccount') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Forums</span><span class="fa arrow"></span></a>
                @if($schools->count() != 0 || $clients->count() != 0 || $admin_schools != null)
                    <ul class="nav nav-second-level">
                        @if($schools->count() != 0)
                            <li > <a href=""> Owner's Forums<span class="arrow "></span></a>
                                <ul class="nav nav-third-level">
                                    @foreach($schools as $school)
                                        <li><a href="{{ url('/admin/community/'. $school->username. '/') }}">{{ "- " .$school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        @if($admin_schools != null)
                            <li > <a href=""> Administrator's Forums<span class="arrow "></span></a>
                                <ul class="nav nav-third-level">
                                    @foreach($admin_schools as $school)
                                        <li><a href="{{ url('/'. $school->username. '/mail/admin') }}">{{"- " . $school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    </ul>
                @endif
            </li>
            <li>
                <a href="{{ url('admin/timeline')}}"><i class="fa fa-calendar"></i> <span class="nav-label">Events</span><span class="fa arrow"></span></a>
                @if($schools->count() != 0 || $clients->count() != 0 || $admin_schools != null)
                    <ul class="nav nav-second-level">
                        @if($schools->count() != 0)
                            <li> <a href=""> Admin Events<span class="arrow "></span></a>
                                <ul class="nav nav-third-level">
                                    @foreach($schools as $school)
                                        <li><a href="{{ url('/admin/'. $school->username. '/events/') }}">{{"- " . $school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        @if($admin_schools != null)
                            <li > <a href=""> Administrator's Mail<span class="arrow "></span></a>
                                <ul class="nav nav-third-level">
                                    @foreach($admin_schools as $school)
                                        <li><a href="{{ url('/admin/'. $school->username. '/events/') }}">{{"- " . $school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    </ul>
                @endif
            </li>
            <li>
                <a href=""><i class="fa fa-building-o"></i> <span class="nav-label">Schools</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
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
                <a href="#"><i class="fa fa-info-circle"></i> <span class="nav-label">Notice Board</span></a>
                @if($schools->count() != 0 || $clients->count() != 0 || $admin_schools != null)
                    <ul class="nav nav-second-level">
                        @if($schools->count() != 0)
                            <li> <a href=""> Admin Events<span class="arrow "></span></a>
                                <ul class="nav nav-third-level">
                                    @foreach($schools as $school)
                                        <li><a href="{{ url('/admin/'. $school->username. '/notice/') }}">{{"- " . $school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        @if($admin_schools != null)
                            <li > <a href=""> Administrator's Mail<span class="arrow "></span></a>
                                <ul class="nav nav-third-level">
                                    @foreach($admin_schools as $school)
                                        <li><a href="{{ url('/admin/'. $school->username. '/notice/') }}">{{"- " . $school->schoolName }}</a> </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    </ul>
                @endif
            </li>
            <li>
                <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Profile</span></a>
            </li>
            <li class="special_link">
                <a href=""><i class="fa fa-database"></i> <span class="nav-label" style="color: #ffffff">Packages</span></a>
            </li>
        </ul>

    </div>
</nav>