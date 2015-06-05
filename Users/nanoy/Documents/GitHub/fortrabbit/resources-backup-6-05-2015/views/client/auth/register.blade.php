<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link href="http://localhost:8000/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8000/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="http://localhost:8000/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="http://localhost:8000/css/animate.css" rel="stylesheet">
    <link href="http://localhost:8000/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">IN+</h1>

        </div>
        <h3>Register to skoolspace</h3>
        <p>Create account to be part of the revolution.</p>
        <form class="m-t" role="form" method="post" action="{{ url('/stema/user/register') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="Email"  value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password" >
            </div>
            <div class="form-group">
                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" >
            </div>
            <div class="form-group">
                <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ url('/stema/login') }}">Login</a>
        </form>
        <p class="m-t"> <small>skoolspace school community framework &copy; 2015</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</body>

</html>
