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

        @yield('message')
        <div class="col-md-6">
            <div class="ibox-content">
                <form class="m-t" role="form" action="">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="#">
                        <small>Forgot password?</small>
                    </a>

                    <p class="text-muted text-center">
                        <small>Do not have an account?</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
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
