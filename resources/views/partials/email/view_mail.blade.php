<div id="portlet-config" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
    </div>
    <div class="modal-body"> Widget settings form goes here </div>
</div>
<div class="clearfix"></div>

<div class="content">

    <div class="row">
        <div class="col-md-12" id="preview-email-wrapper" style="">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid simple">
                        <div class="grid-title no-border">
                            <h4></h4>
                            <div class="tools">
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="grid-body no-border" style="min-height: 850px;">
                            <div class="" >
                                <h1 id="emailheading">{{ $mail->subject }}</h1>
                                <br>
                                <div class="control">
                                    <div class="pull-left">
                                        <label class="inline"><span class="muted">From:</span> <span class="bold small-text">{{ ($admin != null)?(($admin->role != null)?$admin->role: $admin->firstName ." ". $admin->lastName): 'Admin' }}</span></label>
                                    </div>
                                    <div class="pull-right">
                                        <span class="muted small-text">{{ $mail->updated_at }}</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <br>
                                <div class="email-body">
                                    <p>{{ $mail->message }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="admin-bar" id="quick-access" style="">
    <div class="admin-bar-inner">

        <button class="btn btn-danger  btn-add" type="button"><i class="icon-trash"></i> Move to trash</button>
        <button class="btn btn-white  btn-cancel" type="button">Cancel</button>
    </div>
</div>
</div>