@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
       
     
<div class="container">
  <div class="col-lg-12">
	<div class="panel panel-default">

<div class="row">
<div class="col-lg-6">
<div class="panel panel-default">
<div class="panel-heading">Member Details Section </div>
<div class="panel-body">
<form method="POST" action="/pems/memberadminq" accept-charset="UTF-8">
{{ csrf_field() }}
	<label for="userid"> Select Member</label>
	<select id="userid" name="userid">
		<option value="0">Select a Member</option>
		@foreach($users as $user)
		<option value="{{$user->student_id}}">{{$user->name}}</option>
		@endforeach
		</select>
	<input class="btn btn-default" type="submit" value="Choose">

</form>
	Or
	
<form method="POST" action="/pems/memberadminq" accept-charset="UTF-8">
{{ csrf_field() }}
 	<label for="userid">Enter Member Number:</label>
	<input name="memberid" type="text" value="{{$member->student_id}}" id="memberid">
 <input class="btn btn-default" type="submit" value="Find">
	


</form>

								<hr/>
<form method="POST" action="/pems/memberadminq/10273/showmemberadminq" accept-charset="UTF-8">
<input name="_token" type="hidden" value="">
<label for="lemail">Legacy Email</label>
<input class="form-control" name="lemail" type="email" value="{{$member->email}}" id="lemail">
<input name="process" type="hidden" value="updatelegacyemail">
<input class="btn btn-default" type="submit" value="Update">
</form>
		<hr/>
		<form method="POST" action="/pems/savenewemail" accept-charset="UTF-8">
		@csrf
 		<label for="email">Enter new Email here</label>
		 <input class="form-input" name="email" type="email" value="" id="email">
		 <input class="form-input" name="emailtype" type="hidden" value="Home" id="email">
		 <input class="form-input" name="student_id" type="hidden" value="{{$member->student_id}}" id="student_id">
		<input name="process" type="hidden" value="addemail">
		<input class="btn btn-default" type="submit" value="Add">
		</form>
			<table class='table'>
				<tr>
					<th>Member</th>
					<th>Email</th>
				</tr>				
				@foreach($emails as $email)
				<tr>
					<td>{{$email->student_id}}</td>
					<td>{{$email->email}}</td>
					<td>
					<form action="/pems/deleteemail">
					@csrf
					<input type="submit" class="btn btn-danger" value="Delete"></td>
					<input type="hidden" name="email_id" value="{{$email->id}}">
					<input type="hidden" name="student_id" value="{{$member->student_id}}">
					</form>
				</tr>
				@endforeach
			</table>
		

							</div>

						 </div>
					</div> <!-- end of 6 -->
				<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">Phones</div>
							<div class="panel-body">
						  	<form method="POST" action="/pems/savenewphone" accept-charset="UTF-8">
							  @csrf
							<div class="form-group">
						  	<label for="phone">Phone</label>
						  	<input class="form-control" name="phone" type="text" value="" id="phone">
						  	<input class="form-control" name="student_id" type="hidden" value="{{$member->student_id}}" id="student_id">
						  	</div>
						  	<div class="form-group">
						  	<label for="phonetype">Type</label>
						  	<select class="form-control" id="phonetype" name="phonetype">
							  <option value="Home">Home</option>
							  <option value="Bussiness">Bussiness</option>
							  <option value="Mobile">Mobile</option></select>
						  	</div>
						  	<input name="process" type="hidden" value="addphone">
						  	<input class="btn btn-default" type="submit" value="Add">

						  	</form>
							  @foreach($phones as $ph)
							  <table class="table"><tr>
							  <td>
							  	{{$ph->phone}}
							</td><td>
																	
							<form action="/pems/deletephone">
							@csrf
							<input type="submit" class="btn btn-danger" value="Delete">
							<input type="hidden" name="phone_id" value="{{$ph->id}}">
							<input type="hidden" name="student_id" value="{{$member->student_id}}">
							</form>
							</td></tr>
							</table>

							  @endforeach
				</div>

						
					</div>
				</div> <!-- end of 6 -->
	</div><!-- end of row -->






	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Member Address </div>
				<div class="panel-body">
					
					<form method="POST" action="/pems/updateaddress" accept-charset="UTF-8">
					@csrf
					<div class="form-group">
					<label for="delivery_address">Delivery Address</label>
					<textarea class="form-control" style="height:90px;" name="deliveryaddress" cols="50" rows="10" id="delivery_address">
					{{$member->deliveryaddress}}
					</textarea>
					</div>
					<div class="form-group">
					<label for="invoice_address">Invoice Address</label>
					<textarea class="form-control" style="height:90px;" name="invoiceaddress" cols="50" rows="10" id="invoice_address">
					{{$member->invoiceaddress}}
					</textarea>
					</div>
					<div class="form-group">

					<label for="transcript_address">Transcript Address</label>
					<textarea class="form-control" style="height:90px;" name="transscriptaddress" cols="50" rows="10" id="transcript_address">
					{{$member->transscriptaddress}}
					</textarea>
					</div>
					<input name="student_id" type="hidden" value="{{$member->student_id}}">
					<input name="process" type="hidden" value="changeaddress">
					<input class="btn btn-default" type="submit" value="Change">
					</form>

				</div>

			</div>

		</div>



		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Resend Member Credentials Section</div>
				<div class="panel-body">
					
					<form method="POST" action="/pems/memberadminq/10273/showmemberadminq" accept-charset="UTF-8"><input name="_token" type="hidden" value="">
					<div class="form-group">
					<label for="newpassword">Proposed New Pwd:</label>
					<input class="form-control" name="newpassword" type="text" value="" id="newpassword">
					</div>
					This email will be send to :{{$memberemail}}<br/>
					<label for="addcc">Add CC</label>
					<input class="form-control" placeholder="CC Email" name="addcc" type="email" value="" id="addcc">
					<input class="btn btn-default" type="submit" value="Send">
					</form>
				</div>
			</div>
		</div>

	</div>

		<div class="row">
			<div class="panel panel-default">
					<div class="panel-heading">Student Information</div>
					<div class="panel-body">
					<form method="POST" action="/pems/updateinformation" accept-charset="UTF-8">
					@csrf
						<div class="form-group">
							<label for="address_type">Type</label>
							<input class="form-control" name="address_type" type="text" id="address_type" value="{{$member->address_type}}">
							<input class="form-control" name="student_id" type="hidden" id="student_id" value="{{$member->student_id}}">
						</div>
						<div class="form-group">
							<label for="house">House</label>
							<input class="form-control" name="house" type="text" id="house" value="{{$member->house}}" >
						</div>
						<div class="form-group">
							<label for="street">Street</label>
							<input class="form-control" name="street" type="text" id="street" value="{{$member->street}}">
						</div>
						<div class="form-group">
							<label for="town">Town</label>
							<input class="form-control" name="town" type="text" id="town"  value="{{$member->town}}">
						</div>
						<div class="form-group">
							<label for="zipcode">ZIPCode</label>
							<input class="form-control" name="ZIPcode" type="text" id="zipcode"  value="{{$member->ZIPcode}}">
						</div>
						
						<div class="form-group">
							<input name="process" type="hidden" value="changeinfo">
							<input class="btn btn-primary" type="submit" value="Save Address">
							</form>
					</div>
			</div>

		</div>

	</div>
				
</div>
 			
</div>

  
</div>
                             
  @endsection