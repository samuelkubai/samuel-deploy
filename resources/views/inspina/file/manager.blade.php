@extends('inspina.layouts.main')

@section('content')
        <!-- Content starts here -->
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
        @include('inspina.partials.groupProfile')
            <div class="">

                <div class="col-lg-8 animated fadeInRight">
                    <div class="">
                        <div class="col-lg-12">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#uploadModal">Upload New File</button>
                        </div>
                        <br> <br><br>
                        @include('inspina.file.partials.upload')
                        @if($documents->count() != 0)
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
                                                @if($group->isOwner(\Auth::user()))
                                                <span class="pull-right"><a href="{{ '/manager/delete/'.$folder->id.'/'.$document->id }} " class="pull-right"><i class="glyphicon glyphicon-remove pull-right"></i></a></span>
                                                @endif
                                                <br/>
                                                <small>Added: {{ $document->created_at }}</small>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <h2 align="center"><br> <br> <br>THERE ARE NO DOCUMENTS UPLOADED YET!!

                            </h2><br> <br> <br><br> <br> <br>
                        @endif

                        </div>
                        @if($group->isOwner(\Auth::user()))
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-info btn-block col-sm-3" data-toggle="modal" data-target="#updateModal">Rename Folder <i class="glyphicon glyphicon-pencil"></i></button>
                                @include('inspina.file.partials.updateFolder')
                            </div>
                            <div class="col-sm-6">
                                <a href="{{'/manager/'.$folder->id.'/delete/'}}" class="btn btn-danger btn-block col-sm-3">Delete Folder <i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
                </div>
                </div>
        <!-- Content ends Here! -->
@endsection