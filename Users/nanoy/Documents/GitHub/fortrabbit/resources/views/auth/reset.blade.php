@extends('passwords')

@section('content')

					<form class="m-t" role="form" method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<label class="">E-Mail Address</label>
							<div class="">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="">Password</label>
							<div class="">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="">Confirm Password</label>
							<div class="">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="">
								<button type="submit" class="btn btn-primary block full-width m-b">
									Reset Password
								</button>
							</div>
						</div>
					</form>

@endsection
