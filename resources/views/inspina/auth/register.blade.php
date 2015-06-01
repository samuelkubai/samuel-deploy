<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SS+ | Register</title>

    <link href="{{ asset('/inspina/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/inspina/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/inspina/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/inspina/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/inspina/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to IN+</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                @include('inspina.partials.error')
                    <form class="m-t" id="registrationForm" role="form" action="{{ url('/register') }}" method="post" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="email" id="registrationEmail" value="{{ old('email') }}" class="form-control" placeholder="Email" required="" name="email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="registrationFirstName" value="{{ old('firstName') }}" type="text" placeholder="First Name" required="" name="firstName"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="registrationLastName" value="{{ old('lastName') }}"  type="text" placeholder="Last Name" required="" name="lastName"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="registrationTelNumber" value="{{ old('telNumber') }}" type="text" placeholder="Telephone Number" required="" name="telNumber"/>
                        </div>
                        <div class="form-group">
                             <input class="form-control" id="registrationPassword" type="password" placeholder="Password" required="" name="password"/>
                         </div>
                        <div class="form-group">
                            <input type="password" id="registrationPasswordConfirmation" class="form-control" placeholder="Confirm Password" name="password_confirmation" required="">
                        </div>
                        <div class="form-group">
                            <div class="checkbox i-checks"><label> <input type="checkbox" id="registrationTerms" name="terms"><i></i> Agree the terms and policy </label></div>
                        </div>
                        <button type="button" id="registrationbtn" class="btn btn-primary block full-width m-b">Create an account</button>

                        <p class="text-muted text-center">
                            <small>Already have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}">Login</a>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Welcome to skoolspace.com
            </div>
            <div class="col-md-6 text-right">
               <small>© 2015-2016</small>
            </div>
        </div>
    </div>
    <script src="{{asset('inspina/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('inspina/js/bootstrap.min.js')}}"></script>s
    <script>
            function validateText(id)
            {
                if($("#" + id).val() == null || $("#" + id).val() == "")
                {
                    var div = $("#" + id).closest("div");
                    div.addClass("has-error");
                    $("#errorBox").innerHTML = id + "field is required";
                    return false;
                }
                else
                {
                    var div = $("#" + id).closest("div");
                    div.removeClass("has-error");
                    return true;
                }
            }

            function isPasswordConfirmed(password , confirmation)
            {

                if(!($("#"+ password).val() == $("#"+ confirmation).val()))
                {
                     var div = $("#" + password).closest("div");
                     div.addClass("has-error");
                     var div = $("#" + confirmation).closest("div");
                     div.addClass("has-error");
                     return false;
                }else{
                     var div = $("#" + password).closest("div");
                     div.removeClass("has-error");
                     var div = $("#" + confirmation).closest("div");
                     div.removeClass("has-error");
                     return true;
                }
            }
            $(document).ready(
                function(){

                    $("#registrationbtn").click(function()
                    {

                        if(!validateText("registrationEmail"))
                            return false;
                        if(!validateText("registrationFirstName"))
                            return false;
                        if(!validateText("registrationLastName"))
                            return false;
                        if(!validateText("registrationTelNumber"))
                            return false;
                        if(!validateText("registrationPassword"))
                            return false;
                        if(!validateText("registrationPasswordConfirmation"))
                            return false;
                        if(!isPasswordConfirmed("registrationPassword", "registrationPasswordConfirmation"))
                            return false;
                        $('form#registrationForm').submit();

                    })
                }
            );
        </script>

</body>

</html>
