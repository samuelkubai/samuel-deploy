                    @if (count($errors) > 0)
						<div class=" col-md-10 col-md-offset-1 alert alert-danger">

							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif