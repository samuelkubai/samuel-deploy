@extends('home')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">

                    <div class="col-sm-5">
                        <h2>Welcome Amelia</h2>
                        <small>You have 42 messages and 6 notifications.</small>
                        <ul class="list-group clear-list m-t">
                            <li class="list-group-item fist-item">
                                <span class="pull-right">
                                    09:00 pm
                                </span>
                                <span class="label label-success">1</span> Please contact me
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    10:16 am
                                </span>
                                <span class="label label-info">2</span> Sign a contract
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    08:22 pm
                                </span>
                                <span class="label label-primary">3</span> Open new shop
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    11:06 pm
                                </span>
                                <span class="label label-default">4</span> Call back to Sylvia
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    12:00 am
                                </span>
                                <span class="label label-primary">5</span> Write a letter to Sandra
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-7">
	                   	<div class="	">
		                    <div class="iboxa float-e-margins">
		                        <div>
		                            <div class="iboxa-content no-padding border-left-right">
		                                <img alt="image" class="img-responsive" src="http://localhost:8000/inspina/img/profile_big.jpg">
		                            </div>
		                            <br>
		                            <div class="iboxa-content profile-content">
		                                <div class="user-button">
		                                    <div class="row">
		                                        <div class="col-md-6">
		                                            <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-laptop"></i> New Client</button>
		                                        </div>
		                                        <div class="col-md-6">
		                                            <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-file"></i> Edit Profile</button>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                  		</div>
		                	</div>
	                    </div>
                    </div>
            </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="wrapper wrapper-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3 align="center">News Feed</h3>
                                        <div class="ibox-tools">
                                           </div>
                                    </div>
                                    <div class="ibox-content">

                                        <div>
                                            <div class="feed-activity-list">

                                                <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="http://localhost:8000/inspina/img/profile.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">5m ago</small>
                                                        <strong>Monica Smith</strong> posted a new blog. <br>
                                                        <small class="text-muted">Today 5:60 pm - 12.06.2014</small>

                                                    </div>
                                                </div>

                                                <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="http://localhost:8000/inspina/img/a2.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">2h ago</small>
                                                        <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                        <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="http://localhost:8000/inspina/img/a3.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">2h ago</small>
                                                        <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                                                        <small class="text-muted">2 days ago at 8:30am</small>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="http://localhost:8000/inspina/img/a4.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right text-navy">5h ago</small>
                                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                        <div class="actions">
                                                            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                            <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="http://localhost:8000/inspina/img/a5.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">2h ago</small>
                                                        <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                        <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                                        <div class="well">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                            Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                        </div>
                                                        <div class="pull-right">
                                                            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="http://localhost:8000/inspina/img/profile.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">23h ago</small>
                                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="http://localhost:8000/inspina/img/a7.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">46h ago</small>
                                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>

                                        </div>

                                    </div>
                                </div>

                            </div>
                      

                        </div>
                </div>
@stop

@section('scripts')
	 <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

            }, 1300);


            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#464f88"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            var doughnutData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 50,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 100,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var doughnutOptions = {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                percentageInnerCutout: 45, // This is 0 for Pie charts
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };

            var ctx = document.getElementById("doughnutChart").getContext("2d");
            var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

            var polarData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 140,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 200,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var polarOptions = {
                scaleShowLabelBackdrop: true,
                scaleBackdropColor: "rgba(255,255,255,0.75)",
                scaleBeginAtZero: true,
                scaleBackdropPaddingY: 1,
                scaleBackdropPaddingX: 1,
                scaleShowLine: true,
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-4625583-2', 'webapplayers.com');
        ga('send', 'pageview');

    </script>
@stop