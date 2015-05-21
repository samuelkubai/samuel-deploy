                    @if (count($errors) > 0)
						<div class=" col-md-10 col-md-offset-1 alert alert-danger">

							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					@if(isset($inputs))
                        @if (count($inputs) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($inputs->all() as $input)
                                        <li>{{ $input }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
					@endif