@extends('inspina')

@section('content')
    <div class="ibox-content forum-post-container">
        <div class="forum-post-info">
            <h4><span class="text-navy"><i class="fa fa-globe"></i> {{ $subject->name }}</span> - <span class="text-muted">{{ $client->firstName }} {{ $client->lastName }}</span></h4>
        </div>
        @foreach($messages as $message)
        <div class="media">
            <a class="forum-avatar" href="#">
                <img src="http://localhost:8000/inspina/img/a1.jpg" class="img-circle" alt="image">
                <div class="author-info">
                    <strong>Class:</strong>1<br/>

                </div>
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $message->title  }}</h4>
                {{ $message->message }}
                <br>
                <br>
                - {{ $message->name }}
            </div>
        </div>
        @endforeach
        <form action="{{ url('/'. $client->id .'/'.$subject->name.'/community') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <div class="col-lg-10">
                    <div class="chat-message-form">
                        <div class="form-group">
                            <input type="text" name="title" placeholder="The title of your post..." class="form-control">
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="chat-message-form">

                        <div class="form-group">
                            <textarea class="form-control message-input" name="message" placeholder="Enter message text"></textarea>
                        </div>

                    </div>
                </div>
            </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="chat-message-form">
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-md btn-primary" value="Post" />
                            </div>
                        </div>
                    </div>
                </div>

        </form>
    </div>
@endsection