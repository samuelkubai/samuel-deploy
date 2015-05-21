@extends('inspina.layouts.main')

@section('styles')

    <link href="http://localhost:8000/inspina/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="http://localhost:8000/inspina/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="http://localhost:8000/inspina/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <style>
        body.DTTT_Print {
            background: #fff;

        }
        .DTTT_Print #page-wrapper {
            margin: 0;
            background:#fff;
        }

        button.DTTT_button, div.DTTT_button, a.DTTT_button {
            border: 1px solid #e7eaec;
            background: #fff;
            color: #676a6c;
            box-shadow: none;
            padding: 6px 8px;
        }
        button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
            border: 1px solid #d2d2d2;
            background: #fff;
            color: #676a6c;
            box-shadow: none;
            padding: 6px 8px;
        }

        .dataTables_filter label {
            margin-right: 5px;

        }
    </style>
@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
               

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>All Groups</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th style="width:20%">Group Name</th>
                                <th style="width:9%">Group Username</th>
                                <th style="width:10%">Group Email</th>
                                <th style="width:7%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             @if($groups != null)
                                @foreach($groups as $group)
                                    <tr class="gradeX">
                                        <td class="v-align-middle">{{ $group->name }}</td>
                                        <td><span class="muted">{{ $group->username }}</span> </td>
                                        <td class="v-align-middle"> {{ $group->email }} </td>
                                        <td class="v-align-middle">
                                        @if($group->isFollowedBy(\Auth::user()))
                                            <b>Joined</b>
                                        @else
                                         <a href="{{url($group->username.'/join/group')}}" class="btn btn-primary">Join</a>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="width:20%">Group Name</th>
                                <th style="width:9%">Group Username</th>
                                <th style="width:10%">Group Email</th>
                                <th style="width:7%">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                @include('inspina.partials.back_button')
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <!-- Data Tables -->
    <script src="http://localhost:8000/inspina/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="http://localhost:8000/inspina/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="http://localhost:8000/inspina/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="http://localhost:8000/inspina/js/plugins/dataTables/dataTables.tableTools.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "http://localhost:8000/inspina/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>

@endsection