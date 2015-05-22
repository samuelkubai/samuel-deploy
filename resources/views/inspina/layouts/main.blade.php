<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SS+ | {{$title}}</title>

             <link href="{{ asset('inspina/css/bootstrap.min.css') }}" rel="stylesheet">
            <link href="{{ asset('/inspina/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

            @yield('styles')

            <link href="{{asset('/inspina/css/animate.css')}}" rel="stylesheet">
            <link href="{{ asset('/inspina/css/style.css') }}" rel="stylesheet">

            <link href="{{asset('inspina/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">


</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="{{ url('/') }}" class="navbar-brand">skoolspace</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="">
                       <a aria-expanded="false" role="button" href="{{ url('/') }}">
                        <i class="glyphicon glyphicon-bookmark"></i>
                        News Feed
                        </a>
                    </li>
                    <li>
                          <a href="" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <i class="glyphicon glyphicon-calendar"></i>
                            Events <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                           @foreach(\Auth::user()->follows()->get() as $group)
                             <li><a href="{{ url($group->username, 'events') }}">{{ $group->name }}</a></li>
                           @endforeach
                          </ul>
                    </li>
                    <li>
                          <a href="" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <i class="glyphicon glyphicon-pushpin"></i>
                            Pins <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                           @foreach(\Auth::user()->follows()->get() as $group)
                             <li><a href="{{ url($group->username, 'notice') }}">{{ $group->name }}</a></li>
                           @endforeach
                          </ul>
                    </li>

                </ul>
                <ul class="nav navbar-top-links navbar-right">

                    <li>

                          <a  href="" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="glyphicon glyphicon-list"></i>
                            Followed Groups <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                           @foreach(\Auth::user()->follows()->get() as $group)
                             <li><a href="{{ url($group->username) }}">{{ $group->name }}</a></li>
                           @endforeach
                             <li class="divider"></li>
                             <li><a href="{{ url('/mygroups') }}">All Groups</a></li>
                          </ul>

                    </li>

                    <li class="active">
                       <a aria-expanded="false" role="button" href="{{ url('/admin/groups') }}"> Manage Your Groups</a>
                    </li>
                    <li>

                          <a  href="" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i>
                            {{\Auth::user()->firstName . ' '. \Auth::user()->lastName }} <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                                <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Log out</a></li>
                                <li><a href="{{url('/profile/update')}}"><i class="fa fa-wrench"></i> Profile</a></li>
                          </ul>

                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <div class="row wrapper ultra-skin border-bottom page-heading " style="color: #ffffff">
            <div class="col-sm-12 ">

                <h2 align="center">{{ $title }}</h2>
                <span><div  class="text-muted" align="center" style="color: wheat">Share, notify, be informed, This is <b>skoolspace</b>.</div></span>
            </div>
        </div>
            <br>

        @include('inspina.partials.messenger')
         <div class="wrapper wrapper-content">
                    <div class="">
                        <div class="">
                            @yield('content')
                        </div>
                    </div>
         </div>
        <div class="footer">
            <div class="pull-right">
                Share, notify, be informed, This is <b>skoolspace</b>.
            </div>
            <div>
                <strong>Copyright</strong> skoolspace &copy; 2015
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

<!-- Custom and plugin javascript -->
<script src="{{ asset('/inspina/js/inspinia.js') }}"></script>
<script src="{{ asset('/inspina/js/plugins/pace/pace.min.js') }}"></script>

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

    <!-- Data picker -->
    <script src="{{ asset('/inspina/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

    <!-- Data picker -->
    <script src="{{ asset('/inspina/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

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
    <script>
        $(document).ready(function() {


            var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
            var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

            var data1 = [
                { label: "Data 1", data: d1, color: '#17a084'},
                { label: "Data 2", data: d2, color: '#127e68' }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    },
                    {
                        label: "Example dataset",
                        fillColor: "rgba(26,179,148,0.5)",
                        strokeColor: "rgba(26,179,148,0.7)",
                        pointColor: "rgba(26,179,148,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(26,179,148,1)",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    }
                ]
            };

            var lineOptions = {
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                bezierCurve: true,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true,
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

        });
    </script>

</body>

</html>
