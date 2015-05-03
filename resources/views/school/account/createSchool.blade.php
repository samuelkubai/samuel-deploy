@extends('school')

@section('sidebar')
    @include('partials.school.default_nav')
@stop

@section('content')

    <h4 class="mb">Create a school</h4>
    <form method="post" action="{{ url('/admin/create/school') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('school.partials.schoolForm')
    </form>

@stop
