<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SS+ | Login</title>

    <link href="{{asset('inspina/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspina/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('inspina/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('inspina/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">SS+</h1>

            </div>
            <h3>Welcome to skoolspace</h3>
            <p>Perfectly designed and precisely built for school groups event management and file sharing.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p> </p>
            <div class="errorBox" id="error">@include('inspina.partials.error')</div>
                @yield('content')
            <p class="m-t"> <small>skoolspace framework built for school group management <br> &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('inspina/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('inspina/js/bootstrap.min.js')}}"></script>
    <script>
        function validateText(id)
        {
            if($("#" + id).val() == null || $("#" + id).val() == "")
            {
                var div = $("#" + id).closest("div");
                div.addClass("has-error");
                return false;
            }
            else
            {
                var div = $("#" + id).closest("div");
                div.removeClass("has-error");
                return true;
            }
        }
        $(document).ready(
            function(){
                $("#loginbtn").click(function()
                {
                    if(!validateText("loginEmail"))
                        return false;
                    if(!validateText("loginPassword"))
                        return false;
                    $('form#loginForm').submit();

                })
            }
        );
    </script>
</body>

</html>
