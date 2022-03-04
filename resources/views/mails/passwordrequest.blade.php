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
				<div class="panel-heading">Forget Data</div>
				<div class="panel-body" style="padding:10px;">
	 

 <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('resetpassword3') }}">
                        @csrf
 
                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send My Data') }}
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
