                            <div class="ibox-content">
                               <form action="{{ url( $group->username . '/update/') }}" method="POST" >
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <div>
                                          @if (count($errors) > 0)
                                              <div class="alert alert-danger">
                                                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                  <ul>
                                                      @foreach ($errors->all() as $error)
                                                          <li>{{ $error }}</li>
                                                      @endforeach
                                                  </ul>
                                              </div>
                                          @endif

                                              <div class="row form-group">
                                                  <div class="col-md-12">
                                                      <input name="name" type="text" class="form-control" placeholder="Group Name" value="{{$group->name}}" required = "required">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <a href="{{url('admin',$group->username)}}" class="btn btn-default">Close</a>
                                              <button type="submit" class="btn btn-info">Update</button>
                                          </div>
                                      </form>
                            </div>