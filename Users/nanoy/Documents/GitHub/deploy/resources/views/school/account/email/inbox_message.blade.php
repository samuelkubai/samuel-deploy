@extends('school')

@section('css')
    <link href="http://localhost:8000/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="http://localhost:8000/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
@stop

@section('sidebar')
    @include('partials.school.mail_nav')
@stop

@section('content')
    @include('partials.email.view_mail')
@stop



@section('scripts')
    <script src="http://localhost:8000/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="http://localhost:8000/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="http://localhost:8000/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <script src="http://localhost:8000/assets/js/demo.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $('#text-editor').wysihtml5();
            $("#quick-access").css("bottom","0px");
        });
    </script>
@stop
