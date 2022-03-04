@extends('layout')
@section('title','Edit Form')
@push('link')
	<link rel="stylesheet" href="/css/style.css" >
@endpush

@section('mycontent')
	<h1>Edit Form</h1>
	
	<div class="row">
		<div class="col"></div>
		<div class="col">
		<form action="/uc/{{$data->id}}" method="post">

				{{csrf_field()}}
				{{method_field('patch')}}
				<div class="form-group">
					<input type="text" name="name" placeholder="name" class="form-control" value="{{$data->name}}">
				</div>
				<div class="form-group">
					<input type="text" name="email" placeholder="email" class="form-control" value="{{$data->email}}">
				</div>
				<div class="form-group">
					<input type="text" name="mobile" placeholder="mobile" class="form-control" value="{{$data->mobile}}">
				</div>
				<div class="form-check">
					<label for="">Owner Gender: </label>
					<input type="radio" name="gender" value="male" @if($data->gender=="male") checked @endif>
					<label for="">Male</label>
					<input type="radio" name="gender" value="female" @if($data->gender=="female") checked @endif>
					<label for="">Female</label>
				</div>
			<div class="form-group">
					<label for="">City:</label>
					<select name="city" id="" class="form-control">
						<option value="Rajkot" @if($data->city=="Rajkot") selected @endif>Rajkot</option>
						<option value="Ahmedabad" @if($data->city=="Ahmedabad") selected @endif>Ahmedabad</option>
						<option value="Vadodara" @if($data->city=="Vadodara") selected @endif>Vadodara</option>
						<option value="Surat" @if($data->city=="Surat") selected @endif>Surat</option>
					</select>
				</div>

				<div class="mt-2 form-group">
					<input type="submit" value="submit" class="btn btn-primary">
					<input type="reset" value="reset" class="btn btn-secondary">
				</div>

			</form>
		</div>
		<div class="col"></div>
	</div>
@endsection