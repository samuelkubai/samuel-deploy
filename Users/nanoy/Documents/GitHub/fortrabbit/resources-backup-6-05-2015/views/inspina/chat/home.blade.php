@extends('inspina')

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
            <div class="row">
        <div class="col-lg-12">

                <div class="ibox chat-view">

                    <div class="ibox-title">
                        <small class="pull-right text-muted">Last message:  Mon Jan 26 2015 - 18:39:23</small>
                         Chat room panel
                    </div>


                    <div class="ibox-content">

                        <div class="row">

                            <div class="col-md-9 ">
                                <div class="wrapper wrapper-content">
                                    <div class="middle-box text-center animated fadeInRightBig">
                                        <h3 class="font-bold">Chat with Everyone in <b>{{ $client->username }}</b></h3>
                                        <div class="error-desc">
                                            You can chat with anyone in the group: {{ $client->username }} from here privately
                                            <br/><a href="{{url('/')}}" class="btn btn-primary m-t">News Feed</a>
                                        </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="chat-users">
                                    <div class="users-list">
                                    @if($members != null)
                                        @foreach($members as $member)
                                            <div class="chat-user">
                                                <img class="chat-avatar" src="http://localhost:8000/inspina/img/a4.jpg" alt="" >
                                                <div class="chat-user-name">
                                                    <a href="{{ url($member->id . '/chat/'. $client->id) }}">{{ $member->firstName . " ". $member->lastName }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
        </div>

    </div>


    </div>
@endsection