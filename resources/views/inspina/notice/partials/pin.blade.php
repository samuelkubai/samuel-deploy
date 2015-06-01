            <form action="{{ url('/'.$group->username.'/notice') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                         <div class="row form-group">
                            <div class="col-lg-12">
                                <h2 class="font-big">Pin a new notice</h2>
                            </div>
                        </div>
                       <div class="row form-group">
                            <div class="col-md-12">
                                    <input name="title" type="text" class="form-control" placeholder="Event title">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <textarea class="form-control message-input" name="message" placeholder="Event Description"></textarea>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Pin Notice</button>
                        <button type="reset" class="btn btn-white" data-dismiss="modal">Cancel</button>
                    </div>
            </form>