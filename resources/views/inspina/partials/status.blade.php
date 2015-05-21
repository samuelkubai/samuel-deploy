                                        @foreach($statuses as $status)

                                                <div class="feed-element">
                                                    <a href="{{$status->group()->first()->username}}" class="pull-left">
                                                        <img alt="image" class="img-circle" src="{{$status->group()->first()->profileSource()}}">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">{{ $status->updated_at }}</small>
                                                        <strong>{{ $status->title }}</strong><br>
                                                        <span class="text-muted">{{ $status->message }}</span>

                                                    </div>
                                                </div>
                                        @endforeach