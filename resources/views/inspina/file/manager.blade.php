@extends('inspina.layouts.main')

@section('content')
                <!-- Content starts here -->
                <div class="wrapper wrapper-content" style="padding-right: 0px; padding-top: 0px;">
                    <div class="row">
                   @include('inspina.partials.file_nav')
                    </div>
                    <br>
                    @include('inspina.partials.error')
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="file-manager">
                                    @include('inspina.file.partials.upload')
                                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#subModal">Create Sub Folder</button>
                                        <div class="hr-line-dashed"></div>
                                        <h5>Folders</h5>
                                        <ul class="folder-list" style="padding: 0">
                                        @if($subFolders->count() != 0)
                                        @foreach($subFolders as $subFolder)
                                            <li><a href="{{url('manager/'.$group->username.'/'. $subFolder->id) }}"><i class="fa fa-folder"></i> {{ $subFolder->name}}</a></li>
                                        @endforeach
                                        @else
                                            <li><b> <span align="center">No Sub Folders for this group.</span></b></li>
                                        @endif
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 animated fadeInRight">
                            <div class="row">
                                <div class="col-lg-12">
                                @include('inspina.file.partials.createSubFolder')
                                    <div class="file-box">
                                        <div class="file">
                                            <a href="" data-toggle="modal" data-target="#uploadModal">
                                                <span class="corner"></span>

                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <div  class="text-center file-name">
                                                    <h3>Upload File</h3>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                    @if($group->isOwner(\Auth::user()))
                                        @include('inspina.file.partials.updateFolder')

                                        <div class="file-box">
                                            <div class="file">
                                                <a href="" data-toggle="modal" data-target="#updateModal">
                                                    <span class="corner"></span>

                                                    <div class="icon">
                                                        <i class="fa fa-edit"></i>
                                                    </div>
                                                    <div  class="text-center file-name">
                                                        <h3>Edit Folder</h3>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    @endif
                                @foreach($subFolders as $subFolder)
                                    <div class="file-box">
                                        <div class="file">
                                            <a href="{{ url('manager/'.$group->username.'/'. $subFolder->id) }}">
                                                <span class="corner"></span>

                                                <div class="icon">
                                                    <i class="fa fa-folder"></i>
                                                </div>
                                                <div class="file-name">
                                                    Folder: {{ $subFolder->name }}
                                                    <br/>
                                                    <small>Added: {{ $subFolder->created_at }}</small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                        @if($documents->count() != 0)
                            @foreach($documents as $document)
                                <div class="file-box">
                                    <div class="file">
                                        <a href="{{ url('/download/'.$document->id) }}">
                                            <span class="corner"></span>

                                        @if($document->isImage())
                                            <div class="image">
                                                <img src="{{ asset($document->source)}}" alt="{{ $document->name }}" class="img-responsive"/>
                                            </div>
                                        @else
                                            <div class="icon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                        @endif
                                            <div class="file-name">
                                                {{ $document->name }}
                                                @if($group->isOwner(\Auth::user()))
                                                <span class="pull-right"><a href="{{ '/manager/delete/'.$folder->id.'/'.$document->id }} " class="pull-right"><i class="glyphicon glyphicon-remove pull-right"></i></a></span>
                                                @endif
                                                <br/>
                                                <small>Added: {{ $document->created_at }}</small>
                                                <br>
                                                <small>Uploaded By: @include('inspina.partials.name_tag',['user' => $document->user()->first()])</small>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        @endif
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                <!-- Content ends Here! -->
@endsection
