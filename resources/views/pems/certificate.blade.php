@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
       
  
              
     
<div class="container">
<div class="col-lg-12">
	<div class="panel panel-default">
			
<div class="row">
<div class="col-lg-4">
<div class="panel panel-default">
<div class="panel-heading">Member Details Section</div>
<div class="panel-body">
<form method="POST" action="/pems/certificateq" accept-charset="UTF-8">
{{ csrf_field() }}
	<label for="userid"> Select Member</label>
	<select id="userid" name="userid">
		<option value="0">Select a Member</option>
		@foreach($users as $user)
		<option value="{{$user->student_id}}">{{$user->name}}</option>
		@endforeach
		</select>
	<input name="process" type="hidden" value="byselect">
	<input class="btn btn-default" type="submit" value="Choose">

</form>
	Or
	
<form method="POST" action="/pems/certificateq" accept-charset="UTF-6">
{{ csrf_field() }}
 	<label for="memberid">Enter Member Number:</label>
	<input name="userid" type="text" value="" id="memberid">
	<input name="process" type="hidden" value="byid">
<input class="btn btn-default" type="submit" value="Find">
	


</form>

				
</div>

	</div>
	</div> <!-- end of 6 -->
	</div>
</div> <!-- end of 12 -->
				



  
</div>
                             
@endsection