                                     @if($statuses->count() != 0)
                                        @foreach($statuses as $status)

                                                <div class="feed-element">
                                                    <a href="{{$status->group()->first()->username}}" class="pull-left">
                                                        <img alt="image" class="img-circle" src="{{$status->group()->first()->profileSource()}}">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">{{ $status->updated_at }}</small>
                                                        <a href="{{ url($status->url) }}">
                                                        <strong>{{ $status->title }}</strong><br>
                                                        </a>
                                                        <a href="{{ url($status->url) }}">
                                                            <span class="text-muted">{{ $status->message }}</span>
                                                        </a>


                                                    </div>
                                                </div>

                                        @endforeach
                                     @else
                                        <div class="feed-element">
                                            <h2 align="center"> No Activities Recorded</h2>
                                            <br>
                                            <h4 align="center"class="muted text-center">
                                            Perhaps you should try out the skoolspace features :)
                                            </h4>
                                        </div>
                                     @endif