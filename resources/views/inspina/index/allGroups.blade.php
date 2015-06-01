@extends('inspina.layouts.main')

@section('content')
    <div class="ibox-content m-b-sm border-bottom">
        <div class="p-xs">
            <div class="pull-left m-r-md">
                <i class="fa fa-globe text-navy mid-icon"></i>
            </div>
            <h2>{{$title}}</h2>
            <span>Share, Notify, Be informed, This is skoolspace.</span>
        </div>
    </div>

    <div class="ibox-content forum-container">
        <div class="forum-title">
            <div class="pull-right forum-desc">
                <samll>Total Groups: {{ $groups->count() }}</samll>
            </div>
            <h3>Skoolspace Groups</h3>
        </div>

         @foreach($groups as $group)
            <div class="forum-item active">
                <div class="row">
                    <div class="col-md-9">
                        <div class="forum-icon">
                            <i class="fa fa-group"></i>
                        </div>
                        <a href="{{ url('/'. $group->username) }}" class="forum-item-title">{{$group->name}}</a>
                        <div class="forum-sub-title">{{$group->description }}.</div>
                    </div>
                        <div class="col-md-1-offset-1 forum-info">
                        <span class="views-number"> {{ $group->followers()->get()->count() }} </span>
                        <div>
                            <small>Followers</small>
                        </div>
                        </div>
                </div>
            </div>
        @endforeach

        <div class="forum-title">
            <div class=" forum-desc">
               <a href="{{url('/create/group')}}" class=" btn  btn-block btn-info">Create New Group</a>
            </div>
        </div>
    </div>
@endsection