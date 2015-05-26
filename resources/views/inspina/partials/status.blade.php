                                     @if($statuses->count() != 0)
                                        @foreach($statuses as $status)

                                                <div class="feed-element">
                                                    <a href="{{$status->group()->first()->username}}" class="pull-left">
                                                        <img alt="image" class="img-circle" src="{{$status->group()->first()->profileSource()}}">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">{{ $status->updated_at }}</small>
                                                        <strong>{{ $status->title }}</strong><br>
                                                        <span class="text-muted">{{ $status->message }}</span>
                                                        <span class="pull-right"><a href="{{ url($status->url) }}"><i class="glyphicon glyphicon-play-circle"></i></a></span>

                                                    </div>
                                                </div>
                                        @endforeach
                                     @else
                                        <div class="feed-element">
                                            <h2 align="center"> No Activities :( </h2>
                                        </div>
                                     @endif