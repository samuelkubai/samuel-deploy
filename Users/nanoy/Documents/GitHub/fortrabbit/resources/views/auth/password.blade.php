@extends('passwords')

@section('content')


					<form class="m-t" role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label for="email"  >E-Mail Address</label>
							<input  id="name" type="email" class="form-control" name="email" value="{{ old('email') }}">
						</div>

						<div class="form-group">
							<div class="btn btn-primary block full-width m-b">
								<button type="submit" class="btn btn-primary">
									Send Password Reset Link
								</button>
							</div>
						</div>
					</form>

@endsection
