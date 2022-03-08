@extends('layouts.master')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')
<div class="container">
<br>
<br>
<br>
<br>
<br>
<div class="row justify-content-center">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Login') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  
<div class="row">
	<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Map Sign In</div>
				<div class="panel-body">
	<table>

            <tr style=" margin:10px; ">

            <th valign="middle" style="width:280px;"> <label for="username" class="col-md-6 col-form-label text-md-right">{{ __('Username') }}</label></th>
            <td> <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror</td>
            </tr>

            <tr style=" margin:10px; ">

            <th valign="middle" style="width:280px;"> <label for="student_id" class="col-md-6 col-form-label text-md-right">{{ __('Username') }}</label></th>
            <td> <input id="student_id" type="student_id" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{ old('student_id') }}" required autocomplete="student_id" autofocus>

            @error('student_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror</td>
            </tr>

		
		<tr style=" margin:10px;">
			<th valign="middle"><label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label></th>
			<td><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror</td>
		</tr>
	
		<tr>
			<th>     
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                           

                        
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                     
                           
                    </th>
			<td><a class="btn btn-link" href="{{ URL::route('resetpassword2') }}" >
                                      Forgot Your Password? 
                                    </a></td>
		</tr>
	</table>
</form>
	
	
		
	</div>
	</div>








 
              

                   

 
        </div>
    </div>
</div>
@endsection
