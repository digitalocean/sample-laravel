@extends('admin.layout');

@section('mycontent')
	<div class="col-4">
		<div class="row">
			<label for="">Name:</label>
			<label for="">{{$data->name}}</label>
		</div>
		<div class="row">
			<label for="">Mobile:</label>
			<label for="">{{$data->mobile}}</label>
		</div>
		<div class="row">
			<label for="">Email:</label>
			<label for="">{{$data->email}}</label>
		</div>
		<div class="row">
			<label for="">Gender:</label>
			<label for="">{{$data->gender}}</label>
		</div>
		<div class="row">
			<label for="">City:</label>
			<label for="">{{$data->city}}</label>
		</div>
		<div class="row">
			<div class="col-2">
				<a href="/uc/{{$data->id}}/edit" class="btn btn-primary">Edit</a>
			</div>
			<div class="col-2">
				<form method="post" action="/uc/{{$data->id}}">
					{{csrf_field()}}
					{{method_field('delete')}}
					<input type="submit" value="Delete" class="btn btn-warning"/>
				</form>
			</div>	
		</div>
	</div>	
	<!-- This is my show blade where in the single record is displayed.
	We have created this page in the previous video.
	If you havent watched it then you must go back and scroll that video first. 
	 -->
	<!--  Let;s have a look at this page first. 
	  -->
@endsection