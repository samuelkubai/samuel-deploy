<div class="row">
    <div class="col-md-12">
        @include('partials.errors')
        <div class="grid simple ">
            <div class="grid-title no-border">
                <h4>School  <span class="semi-bold">Administrators</span></h4>
                <div class="tools">	<a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>


            <div class="grid-body no-border">
                <h3>All  <span class="semi-bold">Administrators</span>
                    <button class="btn btn-primary pull-right " data-toggle="modal" data-target="#myModal">+ New Administrator</button>
                </h3>


                <table class="table no-more-tables">
                    <thead>
                    <tr>
                        <th style="width:1%" >
                            <div class="checkbox check-default">
                                <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                <label for="checkbox10"></label>
                            </div>
                        </th>
                        <th style="width:21%">Administrator's Name</th>
                        <th style="width:9%">Role</th>
                        <th style="width:10%">Class</th>
                        <th style="width:3%"> &nbsp;</th>
                        <th style="width:3%"> &nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $admins as $admin )
                        <tr>
                            <td class="v-align-middle">
                                <div class="checkbox check-default">
                                    <input id="checkbox11" type="checkbox" value="1">
                                    <label for="checkbox11"></label>
                                </div>
                            </td>
                            <td class="v-align-middle">{{ $admin->name }}</td>
                            </td>
                            <td><span class="muted">{{ $admin->role }}</span>
                            </td>
                            <td class="v-align-middle">
                                {{ $admin->class }}
                            </td>
                            <td > <a class="btn btn-white"  href="">Edit</a> </td>
                            <td > <a class="btn btn-danger" href="">Delete</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>