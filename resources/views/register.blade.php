@extends('layout')
@section('title','Register')
@section('menu_register', 'active')
@push('link')
	<!-- Do not forget to put the correct path as 
	/css/style.css.
	if you put css/style.css it will not be able to find the file as
	we are using controller :) -->
	<link rel="stylesheet" href="/css/style.css" >
@endpush

@section('mycontent')
	<h1>Registration</h1>
<!-- 	Let's now start making the registration form by our own
	using bootstrap and emmet coding. :) -->
	<!-- Now lets add some css to it :) -->
<!-- 	Okay now let's integrate it to our layout file :)-->	
	<div class="row">
		<div class="col"></div>
		<div class="col">
			<!-- I am using the convention of resources to pass the value here
			but for testing purpose i have mentioned the get method then
			i will change to post method. -->
			<!-- Now let's change it to the post method -->
			<form action="/uc" method="post">
				<!-- Thus, now we need to add csrf field here for post method -->
				<!-- You may see that there is no token values or hidden input here.  -->
				{{csrf_field()}}
				<!-- csrf_field is convereted to hidden input with proper token for security reason :)-->
				<div class="form-group">
					<input type="text" name="name" placeholder="name" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="email" placeholder="email" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="mobile" placeholder="mobile" class="form-control">
				</div>
				<div class="form-check">
					<label for="">Owner Gender: </label>
					<input type="radio" name="gender" value="male">
					<label for="">Male</label>
					<input type="radio" name="gender" value="female">
					<label for="">Female</label>
				</div>
				<div class="form-group">
					<label for="">City:</label>
					<select name="city" id="" class="form-control">
						<option value="0" selected disabled>Select City</option>
						<option value="Rajkot">Rajkot</option>
						<option value="Ahmedabad">Ahmedabad</option>
						<option value="Vadodara">Vadodara</option>
						<option value="Surat">Surat</option>
					</select>
				</div>
				<!-- here I have mentioned mt-2 for proper spacing between two elements :) -->
				<div class="mt-2 form-group">
					<input type="submit" value="submit" class="btn btn-primary">
					<input type="reset" value="reset" class="btn btn-secondary">
				</div>
				<!-- This must be submitted to store method in controller as per resource rule 
				so let's create it there :) -->
			</form>
		</div>
		<div class="col"></div>
	</div>
@endsection