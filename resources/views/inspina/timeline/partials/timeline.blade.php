

                <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Groups Planned Events</h5>
                        <div class="ibox-tools">
                           <span class="badge badge-primary"> <b>{{ $events->count() }}</b> Events</span>
                        </div>
                    </div>

                    <div class="ibox-content inspinia-timeline">
                    @foreach($events as $event)
                        <div class="timeline-item">
                            <div class="row">
                                <div class="col-xs-3 date">
                                    <i class="fa {{ $event->category }}"></i>
                                    {{ $event->date }}
                                    <br/>
                                    <small class="text-navy">Created: <br> 2 hour ago</small>
                                </div>
                                <div class="col-xs-7 content no-top-border">
                                    <p class="m-b-xs"><strong>{{ $event->title }}</strong></p>

                                    <p>{{$event->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
