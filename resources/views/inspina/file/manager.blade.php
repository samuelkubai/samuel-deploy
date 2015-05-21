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
                                                <br/>
                                                <small>Added: {{ $document->created_at }}</small>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <h2 align="center"><br> <br> <br>THERE ARE NO DOCUMENTS UPLOADED YET!!

                            </h2>
                        @endif

                        </div>
                    </div>
                    </div>
                </div>
                </div>
                </div>
        <!-- Content ends Here! -->
@endsection