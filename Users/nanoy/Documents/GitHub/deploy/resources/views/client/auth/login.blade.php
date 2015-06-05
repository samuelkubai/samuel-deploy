<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>skoolspace | UserLogin </title>

    <link href="http://localhost:8000/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8000/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="http://localhost:8000/css/animate.css" rel="stylesheet">
    <link href="http://localhost:8000/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">
        @include('client.auth.partials.message')
        <div class="col-md-6">
            <div class="ibox-content">
                <form class="m-t" role="form" method="post" action="{{ url('/stema/login') }}">
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
                        <input type="email" class="form-control" placeholder="Email Address" required="" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required="" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="{{ url('/password/email') }}">
                        <small>Forgot password?</small>
                    </a>
                    <div class="form-group">
                        <div class="checkbox i-checks"><label> <input name="remember" type="checkbox"><i></i> Remember Me </label></div>
                    </div>
                    <a href="">
                    <p class="text-muted text-center">
                        <small>Do not have an account?</small>
                    </p>
                    </a>
                    <a class="btn btn-sm btn-white btn-block" href="{{ url('/stema/user/register') }}">Create an account</a>
                </form>
                <p class="m-t">
                    <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright skoolspace.com
        </div>
        <div class="col-md-6 text-right">
            <small>© 2015</small>
        </div>
    </div>
</div>

</body>

</html>
