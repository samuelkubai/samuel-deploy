<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>SS+ | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="{{ asset("/assets/plugins/pace/pace-theme-flash.css") }}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{ asset("/assets/plugins/boostrapv3/css/bootstrap.min.css" ) }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/plugins/boostrapv3/css/bootstrap-theme.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/plugins/font-awesome/css/font-awesome.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/css/animate.min.css") }}" rel="stylesheet" type="text/css"/>
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link href="{{ asset("/assets/css/style.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/css/responsive.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/css/custom-icon-set.css") }}" rel="stylesheet" type="text/css"/>
    <!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top lazy"  data-original="assets/img/work.jpg"  style="background-image: url('http://localhost:8000/assets/img/work.jpg')">
<div class="container">
    <div class="row login-container animated fadeInUp">
        <div class="col-md-7 col-md-offset-2 tiles white no-padding">
            <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
                <h2 class="normal">Activate your account</h2>
                <p>A link has been sent to your email account to activate your account.<br></p>
                <p class="p-b-20">Activate your account Now! to enjoy skoolspace, it's free and always will be.</p>
                <a href="{{ url('/login') }}" class="btn btn-info btn-cons"> Back to the login </a>
            </div>
        </div>
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->

<script src="{{ asset('/assets/plugins/jquery-1.8.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/boostrapv3/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/pace/pace.min.js') }}http://localhost:8000" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/jquery-lazyload/jquery.lazyload.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/login_v2.js') }}" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>

</html>