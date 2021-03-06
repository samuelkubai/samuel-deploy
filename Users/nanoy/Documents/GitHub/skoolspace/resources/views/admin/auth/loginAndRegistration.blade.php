<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>skoolspace | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="http://localhost:8000/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="http://localhost:8000/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link href="http://localhost:8000/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="http://localhost:8000/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
    <!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top lazy"  data-original="assets/img/work.jpg"  style="background-image: url('http://localhost:8000/assets/img/work.jpg')">
<div class="container">
    <div class="row login-container animated fadeInUp">
        <div class="col-md-7 col-md-offset-2 tiles white no-padding">
            <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
                <h2 class="normal"> {{ $school->schoolName . "'s Administrators" }}</h2>
                <p>Use Facebook, Twitter or your email to sign in.<br></p>
                <p class="p-b-20">Sign up Now! for skoolspace accounts, it's free and always will be.</p>
            </div>
            <div class="tiles grey p-t-20 p-b-20 text-black">
                <form id="frm_login" class="animated fadeIn" method="post" action="{{ url($school->username. '/admin/login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Sorry but there's a problem.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                        <div class="col-md-6 col-sm-6 ">
                            <input name="email" id="login_username" type="text"  class="form-control" placeholder="Email" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <input name="password" id="login_pass" type="password"  class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                        <div class="control-group  col-md-9">
                            <div class="checkbox checkbox check-success"> <a href="login_v2.html#">Trouble login in?</a>&nbsp;&nbsp;
                                <input name="remember" type="checkbox" id="checkbox1" value="1">
                                <label for="checkbox1">Keep me reminded </label>
                            </div>

                        </div>
                        <div class="control-group col-md-3 pull-right">
                            <button type="submit" class="btn btn-primary btn-cons"  >Login</button>
                        </div>
                    </div>
                </form>
                <form id="frm_register" class="animated fadeIn" style="display:none" method="post" action="{{ url($school->username. '/admin/register') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                        <div class="col-md-12 ">
                            <input name="email" id="reg_email" type="text"  class="form-control" placeholder="Email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                        <div class="col-md-6 col-sm-6">
                            <input name="password" id="reg_pass" type="password"  class="form-control" placeholder="Password">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <input name="password_confirmation" id="reg_pass" type="password"  class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                          <div class="control-group  col-md-9">
                              <input name="terms" type="checkbox" id="checkbox1" value="1">
                              <label for="checkbox1">I agree to the terms and conditions </label>
                          </div>

                          <div class="control-group col-md-3 pull-right">
                              <button type="submit" class="btn btn-info btn-cons">Register</button>
                          </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="http://localhost:8000/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<script src="http://localhost:8000/assets/js/login_v2.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>

</html>