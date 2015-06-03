                   @if(\Session::has('message'))
                        <div class="alert alert-info {{ \Session::has('message_important')?'alert-important':'' }}" id="messenger">

                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>

                            {{ \Session::get('message') }}
                        </div>
                   @endif
                    @if (count($errors) > 0)
						<div class=" col-md-10 col-md-offset-1 alert alert-danger">

							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif