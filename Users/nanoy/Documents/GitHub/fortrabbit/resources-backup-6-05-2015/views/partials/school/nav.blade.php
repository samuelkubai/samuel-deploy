<p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i></i></a></span></p>
<ul>
    <li class="start active "> <a href="{{ url('/') }}"> <i class="fa fa-th-large"></i> <span class="title">Dashboard</span> <span class="selected"></span> </a> </li>

    <li class=""> <a href="{{ url('/noAccount') }}"> <i class="fa fa-envelope"></i> <span class="title">Mail</span><span class=" badge badge-disable pull-right ">203</span></a>
     @if($clients->count() != 0)
        <ul class="sub-menu">
                @if($clients!= null)
                <li > <a href=""> Client's Mail<span class="arrow "></span></a>
                    <ul class="sub-menu">
                        @foreach($clients as $client)
                            <li><a href="{{ url('/'. $client->username. '/client/mail/'. $client->id) }}">{{ "- " .$client->firstName." ". $client->middleName }}</a> </li>
                        @endforeach
                    </ul>
                </li>
                @endif

        </ul>
    @endif
    </li>

    <li class=""> <a href="{{ url('/noAccount') }}"> <i class="fa fa-bullhorn"></i>  <span class="title">Forums</span> <span class="badge badge-primary pull-right">5</span> </a>
        @if($clients->count() != 0 )
        <ul class="sub-menu">
            @if($clients != null)
                @foreach($clients as $client)
                    <li><a href="{{ url('/community/'. $client->id) }}">{{ "- " .$client->firstName." ". $client->middleName }}</a> </li>
                @endforeach
            @endif
        </ul>
        @endif
    </li>
    <li class=""> <a href="javascript:;">  <i class="fa fa-calendar"></i>  <span class="title">Event</span></a>
         @if($clients->count() != 0 )
        <ul class="sub-menu">
            @if($clients != null)
                @foreach($clients as $client)
                    <li><a href="{{ url('/'. $client->username. '/events/') }}">{{ "- " .$client->firstName." ". $client->middleName }}</a> </li>
                @endforeach
            @endif
        </ul>
        @endif
    </li>
   
    <li class=""> <a href="javascript:;"> <i class="fa fa-laptop"></i>  <span class="title">Clients</span></a>
        <ul class="sub-menu">
            <li > <a href="{{ url('/patch') }}"> Register New Client </a> </li>
            @if($clients != null)
                <li > <a href="{{ url('/patch') }}"> Registered Clients: <span class="arrow "></span> </a>
                    <ul class="sub-menu">
                @foreach($clients as $client)
                    <li><a href=""> {{ "- " .$client->firstName . " ". $client->lastName }} </a> </li>
                @endforeach
                    </ul>
                </li>
            @endif
        </ul>
    </li>
     <li class=""><a href="javascript:;"><i class="fa fa-info-circle"></i> <span class="title">Notice Board</span></a>
        @if($clients->count() != 0 )
        <ul class="sub-menu">
            @if($clients != null)
                @foreach($clients as $client)
                    <li><a href="{{ url('/'. $client->username. '/notice/') }}">{{ "- " .$client->firstName." ". $client->middleName }}</a> </li>
                @endforeach
            @endif
        </ul>
        @endif
       
    </li>
    <li>
        <a href="javascript:;"><i class="fa fa-comments-o"></i> <span class="title">Chats</span></a>
            @if($clients->count() != 0)
            <ul class="sub-menu">
                @if($clients->count() != 0)
                    @foreach($clients as $client)
                        <li><a href="{{ url('/chat/'. $client->id. '/home/') }}">{{ "- " .$client->firstName." ". $client->middleName }}</a> </li>
                    @endforeach
                @endif
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