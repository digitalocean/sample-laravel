@extends('layouts.mastermap')
@section('title','Edit Form')
@push('link')
	<link rel="stylesheet" href="/css/style.css" >
@endpush

@section('content')

<div class="container">
<div class="row">
<br><br>
	<b><h4>Edit Form</h4></b>

	<div class="row">
		<div class="col"></div>
		<div class="col">
		<form action="/address/data/{{$data->id}}" method="post">

				{{csrf_field()}}
				{{method_field('patch')}}
				<div class="form-group">
					<input type="text" name="type" placeholder="name" class="form-control" value="{{$data->type}}">
				</div>
				<div class="form-group">
					<input type="text" name="house" placeholder="house" class="form-control" value="{{$data->house}}">
				</div>
				<div class="form-group">
					<input type="text" name="street" placeholder="street" class="form-control" value="{{$data->street}}">
				</div>
                <div class="form-group">
					<input type="text" name="town" placeholder="town" class="form-control" value="{{$data->town}}">
				</div>
				<div class="form-group">
					<input type="text" name="email" placeholder="email" class="form-control" value="{{$data->email}}">
				</div>
				<div class="form-group">
					<input type="text" name="ZIPcode" placeholder="ZIPcode" class="form-control" value="{{$data->ZIPcode}}">
				</div>
                <div class="form-group">
					<input type="text" name="country" placeholder="country" class="form-control" value="{{$data->country}}">
				</div>
				<div class="form-group">
					<input type="text" name="phone" placeholder="phone" class="form-control" value="{{$data->phone}}">
				</div>
				<div class="form-group">
					<input type="text" name="deliveryaddress" placeholder="deliveryaddress" class="form-control" value="{{$data->deliveryaddress}}">
				</div>
				<div class="form-group">
					<input type="text" name="invoiceaddress" placeholder="invoiceaddress" class="form-control" value="{{$data->invoiceaddress}}">
				</div>
				<div class="form-group">
					<input type="text" name="transscriptaddress" placeholder="transscriptaddress" class="form-control" value="{{$data->transscriptaddress}}">
				</div>
                <!--
				<div class="form-check">
					<label for="">Owner Gender: </label>
					<input type="radio" name="gender" value="male" @ if($data->gender=="male") checked @ endif>
					<label for="">Male</label>
					<input type="radio" name="gender" value="female" @ if($data->gender=="female") checked @ endif>
					<label for="">Female</label>
				</div>
			<div class="form-group">
					<label for="">town:</label>
					<select name="town" id="" class="form-control">
						<option value="Rajkot" @ if($data->city=="Rajkot") selected @ endif>Rajkot</option>
						<option value="Ahmedabad" @ if($data->city=="Ahmedabad") selected @ endif>Ahmedabad</option>
						<option value="Vadodara" @ if($data->city=="Vadodara") selected @ endif>Vadodara</option>
						<option value="Surat" @ if($data->city=="Surat") selected @ endif>Surat</option>
					</select>
				</div>-->

				<div class="mt-2 form-group">
					<input type="submit" value="submit" class="btn btn-primary">
				<!--	<input type="reset" value="reset" class="btn btn-secondary">-->
				</div>

			</form>
		</div>
		<div class="col"></div>
	</div>

    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">My Address</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">

                  <table class="table">
                    <thead class=" text-primary">
                      <th>Type</th>
                      <th>House</th>
                      <th>Street</th>
                      <th>Town</th>
                      <th>ZIPcode</th>
                      <th>Country</th>
                      <th>Phone</th>
                      <th>Deliveryaddress</th>
                      <th>invoiceaddress</th>
                      <th>Transscriptaddress</th>
                      <th>Email</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $data->type }} </td>
                        <td>{{ $data->house }} </td>
                        <td>{{ $data->street }} </td>
                        <td>{{ $data->town }} </td>
                        <td>{{ $data->ZIPcode }} </td>
                        <td>{{ $data->country }} </td>
                        <td>{{ $data->phone }} </td>
                        <td>{{ $data->deliveryaddress }} </td>
                        <td>{{ $data->invoiceaddress }} </td>
                        <td>{{ $data->transscriptaddress }} </td>
                        <td>{{ $data->email }} </td>
                        <td><a href="/address/data/{{ $data->id }}" class="btn btn-success">Edit</a></td>
                        <td><form action="/role-delete/{{ $data->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <br>

@endsection
