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
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
            </li>

            <li>
                <a href="{{ url('/noAccount') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
                @if($clients->count() != 0)
                    <ul class="nav nav-second-level">
                    @if($clients->count() != 0)
                                @foreach($clients as $client)
                                    <li><a href="{{ url('/'. $client->username. '/client/mail/'. $client->id) }}">{{ "- " .$client->firstName." ". $client->middleName }}</a> </li>
                                @endforeach
                    @endif
                    </ul>
                @endif
            </li>
            <li>
                <a href="{{ url('/noAccount') }}"><i class="fa fa-bullhorn"></i> <span class="nav-label">Forums</span></a>
                @if($clients->count() != 0 )
                    <ul class="nav nav-second-level">
                        @if($clients->count() != 0)
                            @foreach($clients as $client)
                                <li><a href="{{ url('/community/'. $client->id) }}">{{ "- " .$client->firstName." ". $client->middleName }}</a> </li>
                            @endforeach           
                        @endif
                    </ul>
                @endif
            </li>
            <li>
                <a href="{{ url('/noAccount') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Events</span></a>
                 @if($clients->count() != 0)
                    <ul class="nav nav-second-level">
                    @if($clients->count() != 0)
                                @foreach($clients as $client)
                                    <li><a href="{{ url('/'. $client->username. '/events/') }}">{{ "- " .$client->firstName." ". $client->middleName }}</a> </li>
                                @endforeach
                    @endif
                    </ul>
                @endif
            </li>
            <li>
                <a href="#"><i class="fa fa-info-circle"></i> <span class="nav-label">Notice Board</span></a>
                @if($clients->count() != 0)
                    <ul class="nav nav-second-level">
                    @if($clients->count() != 0)
                                @foreach($clients as $client)
                                    <li><a href="{{ url('/'. $client->username. '/notice/') }}">{{ "- " .$client->firstName." ". $client->middleName }}</a> </li>
                                @endforeach
                    @endif
                    </ul>
                @endif

            </li>
            <li>
                <a href="#"><i class="fa fa-comments-o"></i> <span class="nav-label">Chats</span></a>
                @if($clients->count() != 0)
                    <ul class="nav nav-second-level">
                    @if($clients->count() != 0)
                                @foreach($clients as $client)
                                    <li><a href="{{ url('/chat/'. $client->id. '/home/') }}">{{ "- " .$client->firstName." ". $client->middleName }}</a> </li>
                                @endforeach
                    @endif
                    </ul>
                @endif
            </li>
             <li>
                <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Clients</span></a>
                <ul class="nav nav-second-level">
                    <li > <a href="{{ url('/patch') }}"> Register New Client + </a> </li>
                    @if($clients->count() != 0)
                                @foreach($clients as $client)
                                    <li><a href=""> {{"- " .$client->firstName . " ". $client->lastName }} </a> </li>
                                @endforeach
                    @endif
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Profile</span></a>
            </li>
            <li class="special_link">
                <a href="{{ url('/admin') }}"><i class="fa fa-database"></i> <span class="nav-label" style="color: #ffffff">Administrator Panel</span></a>
            </li>
        </ul>

    </div>
</nav>