
                                <div class="modal inmodal" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <i class="fa fa-laptop modal-icon"></i>
                                                <h4 class="modal-title">Rename Folder</h4>
                                                <small class="font-bold">Folders help in arranging and retrieving the files.</small>
                                            </div>
                                            <form action="{{ url('manager/'.$folder->id.'/folder/update') }}" method="POST" id="updatefolderform" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="modal-body">
                                                   <div class=" form-group">
                                                   <label for="name">Folder Name:</label>
                                                   <input class="form-control" id="name" name="name"  VALUE="{{$folder->name}}" type="text" />
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                    <button type="button" id="updatefolderbtn" class="btn btn-primary">Rename Folder</button>
                                                    <a href="{{ url('/manager/'.$folder->id.'/delete') }}" class="btn btn-danger">Delete Folder</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>