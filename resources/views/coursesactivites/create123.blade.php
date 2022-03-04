@extends('layouts.mastermap')
@section('title','Edit Form')
@push('link')
	<link rel="stylesheet" href="/css/style.css" >
@endpush

@section('content')
<h1>Create NEW Blade Need Changes</h1>
<!--<div class="container">

<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>  </h4>
                    </div>
                    <div class="panel-body">
                    <div style="width:100%">


<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">STEP 1: Enter & Save a Course/Activity</div>
		  <div class="panel-body">
		  <form method="POST" action="/coursesactivites/create1/" accept-charset="UTF-8">
		  <!--<input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">-->
                {{csrf_field()}}
                {{method_field('post')}}
            <div class="form-group">
				<label for="courseid2">Member: </label>
				<input name="courseid" type="hidden" value="{{Auth::user()->id}}">
				<input class="form-control" disabled="disabled" name="courseid2" type="text" value='{{Auth::user()->id}}' id="courseid2">
			</div>
		  	<div class="form-group">
				<label for="coursetitle">Course Title: </label>
				<input class="form-control" required="required" name="coursetitle" type="text" id="coursetitle">
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<input class="form-control" required="required" name="description" type="text" id="description">
			</div>
			<div class="form-group">
				<label for="numberofhours">Number of Hours:</label>
				<input class="form-control" required="required" name="numberofhours" type="number" id="numberofhours">
			</div>
			<div class="form-group">
				<label for="coursestartedate">Course StartDate:</label>
				<input class="form-control" required="required" id="datepicker" name="coursestartedate" type="text">
			</div>
			<div class="form-group">
				<label for="courselocation">Course Location: </label>
				<input class="form-control" required="required" name="courselocation" type="text" id="courselocation">
			</div>
		    <input name="process" type="hidden" value="addcppd">
		    <input class="btn btn-Success" type="submit" value="Save to your CPD record">

			</form>
		  </div>
		</div>
	</div>

<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Avialabe Courses/Activities</div>
			  <div class="panel-body">
			  				  </div>
			</div>
	</div>
	<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">STEP 2: Upload Supporting Evidence </div>
			  <div class="panel-body">
			  	<form method="POST" action="/uploadfile" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">
			  		<input class="btn btn-default" name="image" type="file">
			  		<input class="btn btn-default" type="submit" value="Upload">
			  	</form>
			  </div>
			</div>
	</div>

	<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Uploaded Course / Activity Supporting Documents: </div>
			  <div class="panel-body">

                </div>
</div>
</div>

</div>

    </div>
</div>


</div>
</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">

                  <table class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>UserType</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{ { $data->user_id }} </td>
                        <td>{ { $data->type }} </td>
                        <td>{ { $data->house }} </td>
                        <td>{ { $data->street }} </td>
                        <td>{ { $data->town }} </td>
                        <td>{ { $data->ZIPcode }} </td>
                        <td>{ { $data->country }} </td>
                        <td>{ { $data->phone }} </td>
                        <td>{ { $data->deliveryaddress }} </td>
                        <td>{ { $data->invoiceaddress }} </td>
                        <td>{ { $data->transscriptaddress }} </td>
                        <td>{ { $data->user_id }} </td>
                        <td>{ { $data->updated_at }} </td>
                        <td>{ { $data->email }} </td>
                        <td>{ { $data->creates_at }} </td>
                        <td><a href="/address/data/ { { $data->id }}" class="btn btn-success">Edit</a></td>
                        <td><form action="/role-delete/{ { $data->id }}" method="post">
                            { { csrf_field() }}
                            { { method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form></td>


<br>

@endsection
