<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>skoolspace</title>

        <link href="{{ asset('inspina/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/inspina/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

        @yield('styles')

        <link href="{{asset('/inspina/css/animate.css')}}" rel="stylesheet">
        <link href="{{ asset('/inspina/css/style.css') }}" rel="stylesheet">

</head>

<body>

<div id="wrapper" class="skin-3">
    @include('partials.inspina.nav')
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to <b>skoolspace</b>.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i> 
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                                            <div class="dropdown-messages-box">
                                                                <a href="" class="pull-left">
                                                                    <img alt="image" class="img-circle" src="{{asset('inspina/img/a7.jpg')}}">
                                                                </a>
                                                                <div class="media-body">
                                                                    <small class="pull-right">46h ago</small>
                                                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <div class="dropdown-messages-box">
                                                                <a href="" class="pull-left">
                                                                    <img alt="image" class="img-circle" src="{{asset('inspina/img/a4.jpg')}}">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-right text-navy">5h ago</small>
                                                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <div class="dropdown-messages-box">
                                                                <a href="" class="pull-left">
                                                                    <img alt="image" class="img-circle" src="{{asset('inspina/img/profile.jpg')}}">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-right">23h ago</small>
                                                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <div class="text-center link-block">
                                                                <a href="">
                                                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                                                </a>
                                                            </div>
                                                        </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{ url('/auth/logout') }}">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>{{ $title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('/inspina/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('/inspina/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/jeditable/jquery.jeditable.js') }}"></script>



 <!-- Flot -->
    <script src="{{ asset('/inspina/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/flot/jquery.flot.pie.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('/inspina/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('/inspina/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('/inspina/js/inspinia.js') }}"></script>
    <script src="{{ asset('/inspina/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('/inspina/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- GITTER -->
    <script src="{{ asset('/inspina/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('/inspina/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset('/inspina/js/demo/sparkline-demo.js') }}"></script>

    <!-- ChartJS-->
    <script src="{{ asset('/inspina/js/plugins/chartJs/Chart.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('/inspina/js/plugins/toastr/toastr.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('/inspina/js/inspinia.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/pace/pace.min.js') }}"></script>

    <script>
        $(document).ready(function(){

            var $image = $(".image-crop > img")
            $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function() {
                window.open($image.cropper("getDataURL"));
            });

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            $('.demo1').colorpicker();

            var divStyle = $('.back-change')[0].style;
            $('#demo_apidemo').colorpicker({
                color: divStyle.backgroundColor
            }).on('changeColor', function(ev) {
                        divStyle.backgroundColor = ev.color.toHex();
                    });


        });
        var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

        $("#ionrange_1").ionRangeSlider({
            min: 0,
            max: 5000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_3").ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            postfix: "°",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_4").ionRangeSlider({
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ],
            type: 'single',
            hasGrid: true
        });

        $("#ionrange_5").ionRangeSlider({
            min: 10000,
            max: 100000,
            step: 100,
            postfix: " km",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });

        $(".dial").knob();

        $("#basic_slider").noUiSlider({
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#range_slider").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#drag-fixed").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });


    </script>

</body>

</html>
