   <div class="row animated fadeInRight">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Groups Planned Events</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
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
                                <div class="col-xs-2">
                                    <a href="{{ url('/events/destroy/' .$event->id) }}" class="btn btn-sm btn-danger pull-right">Delete</a>
                                    <a href="{{ url('/events/update/' .$event->id) }}" class="btn btn-sm btn-primary pull-left">Update</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            </div>