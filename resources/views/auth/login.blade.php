@extends('app')

@section('content')

	{{-- @if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif --}}

	<div class="login-form padding20 block-shadow">
        <form data-role="validator" data-on-submit="return true" method="POST" action="{{ url('vauth/login') }}">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h1 class="text-light">Sign In</h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login">E-Mail</label>
                <input type="email" data-validate-func="email" data-validate-hint="Not valid email address" name="email" id="user_login">
                <span class="input-state-error mif-warning"></span>
                <span class="input-state-success mif-checkmark"></span>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password">Password</label>
                <input type="password" name="password" id="user_password"  data-validate-hint="Password empty" data-validate-func="required" data-show-error-hint="false">
                <span class="input-state-error mif-warning"></span>
                <span class="input-state-success mif-checkmark"></span>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" class="button primary">Sign In</button>
                <!--a href="{{ url('auth/forgot') }}" class="button link">Forgot password?</a-->
            </div>
        </form>
    </div>
				
@endsection
