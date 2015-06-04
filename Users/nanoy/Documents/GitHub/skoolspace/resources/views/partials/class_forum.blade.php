<div class="chat-room col-md-12" style="margin: 0px">

        <div class="chat-room-head col-md-12" style="background-color: purple; ">
            <h3 style="color: #ffffff">Class Space:</h3>
            <form action="" class="pull-right position">
                <input type="text" placeholder="Search" class="form-control search-btn" style="color: #000000">
            </form>
        </div>
    @if($client_messages != null)
        <?php $counter = 1; ?>
        @foreach($client_messages as $message)
            @if($counter % 2 == 0)
                    <div class="group-rom">
                        <div class="first-part even">{{ $message->name }}</div>
                        <div class="second-part">{{ $message->message }}</div>
                        <div class="third-part">{{ $message->created_at }}</div>

                    </div>
                    <br>
                @else
                    <div class="group-rom">
                        <div class="first-part odd">{{ $message->name }}</div>
                        <div class="second-part">{{ $message->message }}</div>
                        <div class="third-part">{{ $message->created_at }}</div>

                    </div>
                    <br>
                @endif
            <?php $counter++; ?>
        @endforeach
    @endif
        @if($counter == 1)
            <br>
            <br>
                <h2 class="muted" align="center">No Messages have been sent</h2>
            <br>
            <br>
        @endif
        <footer class="col-md-12">
            <form action="{{ url('/'.$school->username.'/client/forum/class/'.$client->id.'/') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="chat-txt">
                    <input name="message" type="text" class="form-control">
                </div>
                <!--<div class="btn-group hidden-sm hidden-xs">
                        <button type="button" class="btn btn-white"><i class="fa fa-meh-o"></i></button>
                        <button type="button" class="btn btn-white"><i class=" fa fa-paperclip"></i></button>
                    </div> -->
                <button type="submit" class="btn btn-theme" >Send</button>
            </form>
        </footer>

</div>