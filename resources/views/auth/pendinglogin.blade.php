@extends('layouts.master')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">

            <div class="row">
	<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Pending Login</div>
				<div class="panel-body" style="padding:10px;">
	<!--<table>

		<tr style=" margin:10px; ">
        <th valign="middle" style="width:80px;"><label for="usename">Email</label></th>
			<td><input class="form-control  @error('email') is-invalid @enderror" name="email" type="text">
             @error('student_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                </td>
		</tr>

		<tr style=" margin:10px;">
			<th valign="middle"><label for="accountid">MemberID</label></th>
			<td><input class="form-control  @error('MemberID') is-invalid @enderror" name="MemberID" type="text" id="MemberID"></td>
		</tr>

		<tr style=" margin:10px;">
			<th valign="middle">	<label for="password">Password</label></th>
			<td><input class="form-control" name="password" type="password" value="" id="password">
                 @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror</td>
		</tr>
		<input name="canlogin" type="hidden" value="Yes">
		<tr>
			<th></th>
			<td><input class="btn btn-default" type="submit"></td><td>@if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif</td>
		</tr>


	</table>-->

              <!--  <div style="align:Right" class="btn btn-primary btn-block"> {{ __('Login') }}</div>-->
<br>
                <div class="card-body">
                <form method="POST" action="/postpendinglogin">
                   <!-- <form method="POST" action="{{ route('login') }}"> -->
                        @csrf
<!--
                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
-->

<!--
                            <div class="form-group row">
                            <label for="username" class="col-md-6 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="useranme" type="text" class="form-control @error('useranme') is-invalid @enderror" name="useranme" value="{{ old('useranme') }}" required autocomplete="useranme" autofocus>

                                @error('useranme')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 -->
                        <div class="form-group row">
                            <label for="id" class="col-md-6 col-form-label text-md-right">{{ __('Pending ID') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="id" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>

                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ URL::route('resetpassword2') }}" >
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
