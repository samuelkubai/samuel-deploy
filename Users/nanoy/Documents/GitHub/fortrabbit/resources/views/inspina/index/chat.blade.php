@extends('inspina')

@section('content')
    <div class="ibox-content m-b-sm border-bottom">
        <div class="p-xs">
            <div class="pull-left m-r-md">
                <i class="fa fa-globe text-navy mid-icon"></i>
            </div>
            <h2>Welcome in skoolspace {{$title}}</h2>
            <span>Feel free to share anything you're interested in.</span>
        </div>
    </div>

    <div class="ibox-content forum-container">
        <div class="forum-title">
            <div class="pull-right forum-desc">
                <samll>Total events: 320,800</samll>
            </div>
            <h3>Skoolspace Groups</h3>
        </div>

        @foreach($groups as $group)
            <div class="forum-item active">
                <div class="row">
                    <div class="col-md-9">
                        <div class="forum-icon">
                            <i class="fa fa-shield"></i>
                        </div>
                        <a href="{{ url('/chat/'. $group->id .'/home') }}" class="forum-item-title">{{$group->name}}</a>
                        <div class="forum-sub-title">{{$group->description}}</div>
                    </div>
                    <div class="col-md-1-offset-1 forum-info">
                        <span class="views-number"> 0 </span>
                        <div>
                            <small>Members</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="forum-title">
            <div class="pull-right forum-desc">
                <samll>Total posts: 17,800,600</samll>
            </div>
            <h3>Other subjects</h3>
        </div>
    </div>
@endsection