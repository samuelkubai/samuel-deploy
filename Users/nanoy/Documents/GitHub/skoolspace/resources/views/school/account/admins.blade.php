@extends('school')

@section('sidebar')
    @include('partials.school.default_nav')
@stop

@section('content')
    <div class="row" style="height: 100%">
        <div class="col-md-12" >
            <div class="tabbable tabs-right">
                <ul class="nav nav-tabs" id="tab-3">
                    <li ><a href="#tab3hellowWorld">News Feed</a></li>
                    <li class="active"><a href="#tab3Administrator">Administrators</a></li>
                    <li><a href="#tab3Inspire">Edit School</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane " id="tab3hellowWorld">
                        <div class="row column-seperation">
                            <div class="col-md-6">
                                <h3><span class="semi-bold">Sometimes</span> Small
                                    things in life means
                                    the most</h3>
                            </div>
                            <div class="col-md-6">
                                <h3 class="semi-bold">great tabs</h3>
                                <p class="light">default, the textarea element comes with a vertical scrollbar (and maybe even a horizontal scrollbar). This vertical scrollbar enables the user to continue entering and reviewing their text (by scrolling up and down).</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane active" id="tab3Administrator">
                        @include('school.partials.admins')
                    </div>
                    <div class="tab-pane" id="tab3Inspire">
                        @include('school.partials.profile')
                    </div>
                </div>
            </div>
            @include('school.partials.modal')
        </div>
    </div>
@stop

@section('scripts')
@stop