@extends('inspina.layouts.main')

@section('content')
        <!-- Content starts here -->
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
        @include('inspina.partials.groupProfile')
            <div class="col-md-8">
                        <div class="col-sm-12 col-md-">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#uploadModal">Upload New File</button>
                        </div>
                        @include('inspina.file.partials.upload')
                        <div class="col-lg-8 animated fadeInRight">

                       <br> <br><br>
                        <div class="col-lg-12">
                        @if($documents->count() != 0)
                            @foreach($documents as $document)
                                <div class="file-box">
                                    <div class="file">
                                        <a href="{{ url('/download/?download_file='.$document->name) }}">
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

        <!-- Content ends Here! -->
@endsection

@section('scripts')

@stop