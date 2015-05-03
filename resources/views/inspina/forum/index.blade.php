@extends('inspina')

@section('content')
    <div class="ibox-content m-b-sm border-bottom">
        <div class="p-xs">
            <div class="pull-left m-r-md">
                <i class="fa fa-globe text-navy mid-icon"></i>
            </div>
            <h2>Welcome in skoolspace Forum</h2>
            <span>Feel free to choose topic you're interested in.</span>
        </div>
    </div>

    <div class="ibox-content forum-container">
        <div class="forum-title">
            <div class="pull-right forum-desc">
                <samll>Total posts: 320,800</samll>
            </div>
            <h3>Skoolspace subjects</h3>
        </div>

        <div class="forum-item active">
            <div class="row">
                <div class="col-md-9">
                    <div class="forum-icon">
                        <i class="fa fa-shield"></i>
                    </div>
                    <a href="{{ url('/'. $client->id .'/general/community') }}" class="forum-item-title">General Discussion</a>
                    <div class="forum-sub-title">Talk about sports, entertainment, music, movies, your favorite color, talk about enything.</div>
                </div>
                <div class="col-md-1 forum-info">
                    <span class="views-number"> 1216 </span>
                    <div>
                        <small>Views</small>
                    </div>
                </div>

                <div class="col-md-1 forum-info">
                    <span class="views-number"> 140 </span>
                    <div>
                        <small>Posts</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="forum-item">
            <div class="row">
                <div class="col-md-9">
                    <div class="forum-icon">
                        <i class="fa fa-bolt"></i>
                    </div>
                    <a href="{{ url('/'. $client->id .'/class/community') }}" class="forum-item-title">Class Discussions</a>
                    <div class="forum-sub-title">Anything to ask or say to the class? Please stop by, say hi and tell us a bit about it. </div>
                </div>
                <div class="col-md-1 forum-info">
                    <span class="views-number"> 890 </span>
                    <div>
                        <small>Views</small>
                    </div>
                </div>
                <div class="col-md-1 forum-info">
                    <span class="views-number"> 154  </span>
                    <div>
                        <small>Posts</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="forum-item active">
            <div class="row">
                <div class="col-md-9">
                    <div class="forum-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <a href="{{ url('/'. $client->id .'/announcements/community') }}" class="forum-item-title">Announcements</a>
                    <div class="forum-sub-title">This forum features announcements from the community staff. If there is a new post in this forum, please check it out. </div>
                </div>
                <div class="col-md-1 forum-info">
                    <span class="views-number"> 680 </span>
                    <div>
                        <small>Views</small>
                    </div>
                </div>
                <div class="col-md-1 forum-info">
                    <span class="views-number">61</span>
                    <div>
                        <small>Posts</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="forum-item">
            <div class="row">
                <div class="col-md-9">
                    <div class="forum-icon">
                        <i class="fa fa-star"></i>
                    </div>
                    <a href="{{ url('/'. $client->id .'/staff/community') }}" class="forum-item-title">Staff Discussion</a>
                    <div class="forum-sub-title">This forum is for private, staff member only discussions, usually pertaining to the community itself. </div>
                </div>
                <div class="col-md-1 forum-info">
                    <span class="views-number">1450</span>
                    <div>
                        <small>Views</small>
                    </div>
                </div>
                <div class="col-md-1 forum-info">
                    <span class="views-number">572</span>
                    <div>
                        <small>Posts</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="forum-title">
            <div class="pull-right forum-desc">
                <samll>Total posts: 17,800,600</samll>
            </div>
            <h3>Other subjects</h3>
        </div>
    </div>
@endsection