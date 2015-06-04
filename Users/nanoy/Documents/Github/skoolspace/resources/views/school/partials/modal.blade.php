<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <br>
                <h4 id="myModalLabel" class="semi-bold">New Administrator.</h4>
                <p class="no-margin"> An administrator must have already created an account <login class=""></login></p>
                <br>
            </div>
            <form action="{{ url('/' . $school->username .'/admin/register') }}" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="row form-row">
                        <div class="col-md-8 col-md-push-4">
                            <h4 class="semi-bold">Account credentials</h4>
                        </div>
                        <span class="col-md-12"><hr></span>
                        <div class="col-md-6">
                            <input name="email" type="email" class="form-control" placeholder="Administrator's Email">
                        </div>
                        <div class="col-md-6">
                            <input name="password" type="password" class="form-control" placeholder="Administrator's Password">
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-8 col-md-push-4">
                            <h4 class="semi-bold">Administrator details</h4>
                        </div>
                        <span class="col-md-12"><hr></span>
                        <div class="col-md-12">
                            <input name="name" type="text" class="form-control" placeholder="Administrator's Name">
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-6">
                            <input name="class" type="text" class="form-control" placeholder="Class">                                        </div>
                        <div class="col-md-6">
                            <input name="role" type="text" class="form-control" placeholder="Role">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <br>
                <h4 id="myModalLabel" class="semi-bold">New Administrator.</h4>
                <p class="no-margin"> An administrator must have already created an account <login class=""></login></p>
                <br>
            </div>
            <form action="{{ url('/' . $school->username .'/admin/register') }}" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="row form-row">
                        <div class="col-md-8 col-md-push-4">
                            <h4 class="semi-bold">Administrator details</h4>
                        </div>
                        <span class="col-md-12"><hr></span>
                        <div class="col-md-12">
                            <input name="name" type="text" class="form-control" placeholder="Administrator's Name">
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-6">
                            <input name="class" type="text" class="form-control" placeholder="Class">                                        </div>
                        <div class="col-md-6">
                            <input name="role" type="text" class="form-control" placeholder="Role">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>