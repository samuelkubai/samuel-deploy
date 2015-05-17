@extends('inspina')

@section('content')
        <!-- Content starts here -->
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">
                                <h5>Show:</h5>
                                <a href="" class="file-control active">Ale</a>
                                <a href="" class="file-control">Documents</a>
                                <a href="" class="file-control">Audio</a>
                                <a href="" class="file-control">Images</a>
                                <div class="hr-line-dashed"></div>
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Upload Files</button>
                                <div class="hr-line-dashed"></div>
                                @include('inspina.file.partials.upload')
                                <h5>My Groups</h5>
                                <ul class="folder-list" style="padding: 0">
                                @foreach($groups as $group)
                                    <li><a href="{{'/manager/'.$group->username}}"><i class="fa fa-folder"></i> {{$group->name}}</a></li>
                                @endforeach
                                </ul>
                                <h5 class="tag-title">Tags</h5>
                                <ul class="tag-list" style="padding: 0">
                                    <li><a href="">Family</a></li>
                                    <li><a href="">Work</a></li>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">Children</a></li>
                                    <li><a href="">Holidays</a></li>
                                    <li><a href="">Music</a></li>
                                    <li><a href="">Photography</a></li>
                                    <li><a href="">Film</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                        @if(isset($documents))
                            @foreach($documents as $document)
                                <div class="file-box">
                                    <div class="file">
                                        <a href="{{ url($document->source) }}">
                                            <span class="corner"></span>

                                            <div class="icon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <div class="file-name">
                                                {{ $document->name }}
                                                <br/>
                                                <small>Added: {{ $document->created_at }}</small>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <h2 align="center">Select a group to view documents<br> <br> THERE ARE NO DOCUMENTS FOR YOU HERE!!

                            </h2>
                        @endif

                        </div>
                    </div>
                    </div>
                </div>
                </div>
        <!-- Content ends Here! -->
@endsection