@extends('layouts.master')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')

<br>

	
<div class="container">

<!-- Marketing Icons Section -->
<div class="row">
	<div class="col-lg-12">

		 <div class="panel panel-default">
			<div class="panel-heading">
				<h4>Comments  </h4>
			</div>
			<div class="panel-body">
			Import Excell File in Laravel <br>
			@if(count($errors) > 0)
			
				<div class="alert alert-danger">
					Upload Validation errors<br><br>
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			@if($message = Session::get('Success'))
				<div class="alert alert-success alsert-block">
					<button type="button" class="close" data-dismiss="alert">
						X					
					</button>
				</div>
			@endif
			<form method="post" enctype="multipart/form-data" action="{{url('/import_excell/import')}}">
				@csrf
				<div class="form-group" >
						<table class="table">
						<tr><td width="40%" align="right"><lable >Select File For Upload</lable></td><td width="30%">
						<input type="file" name="select_file" /></td><tr>
						<tr><td><input type="submit" value="Upload Excell File"></td><td></td><tr>
						</table>
 					</div>
				</form>
			<div class="row">
<div class="col-lg-8">
<div class="panel panel-default">

<div class="panel-heading"><strong>All Comments </strong></div>
	<div class="panel-body">
		<table class="table">
				<tr><th>ID</th><th>Comment</th><th>Subject</th></tr>

				@foreach($data as $row)
				<tr><td>{{ $row->id}}</td><td> {{$row->message}}</td><td>  {{ $row->subject}}</td></tr>
				@endforeach
				</table>
				</div>
		</div>
</div>


</div>
</div>

</div>
</div>
</div>
</div>
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 5.7 Import Export Excel to database Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
            </form>
        </div>
    </div>
</div>
   


@endsection
