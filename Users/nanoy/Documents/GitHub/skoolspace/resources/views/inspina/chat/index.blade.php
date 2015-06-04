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
                                <div class="chat-discussion">
                                     @if($messages != null)
                                        @foreach($messages as $message)
                                            <div class="chat-message">
                                                <img class="message-avatar" src="http://localhost:8000/inspina/img/a1.jpg" alt="" >
                                                <div class="message">
                                                    <a class="message-author" href="#"> Michael Smith </a>
                                                    <span class="message-date"> {{ $message->created_at }} </span>
                                                    <span class="message-content">{{ $message->message }}</span>
                                                </div>
                                            </div> 
                                        @endforeach
                                    @endif
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
                                                    <a href="{{ url('$member->id . '/chat/'. $client->id) }}">{{ $member->firstName . " ". $member->lastName }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <form action="{{ url(   $recipient->id . '/chat/'. $client->id. '/')}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-lg-12">
                                <div class="chat-message-form">
                                    <div class="form-group">

                                        <textarea class="form-control message-input" name="message" placeholder="Enter message text"></textarea>
                                    </div>
                                </div>
                            </div>
                        <div class="col-lg-12">
                                <div class="chat-message-form">
                                <button type="submit" class="form-control btn btn-info btn-lg">Send Message </button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
@endsection