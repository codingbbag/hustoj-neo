@extends('web.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">@lang('auth.register')</div>
				<div class="card-body">
					@include('web.auth.errors')

					<form class="form-horizontal" role="form" method="POST" action="{{ url(route('register')) }}">
                        @csrf

						<div class="form-group row">
							<label class="col-md-4 control-label text-md-right" for="username">@lang('auth.name')</label>
							<div class="col-md-6">
								<input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
							</div>


                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
						</div>

						<div class="form-group row">
							<label class="col-md-4 control-label text-md-right">@lang('auth.nick')</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nick" value="{{ old('nick') }}">
							</div>


						</div>

						<div class="form-group row">
							<label class="col-md-4 control-label text-md-right">@lang('auth.email')</label>
							<div class="col-md-6">
								<input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
							</div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
						</div>

						<div class="form-group row">
							<label class="col-md-4 control-label text-md-right">@lang('auth.password')</label>
							<div class="col-md-6">
								<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
							</div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>

						<div class="form-group row">
							<label class="col-md-4 control-label text-md-right">@lang('auth.confirm_password')</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									@lang('auth.register')
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
