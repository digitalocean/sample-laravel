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
				<div class="panel-heading">Member Details Section</div>
 <div class="panel-body">
<form method="POST" action="/pems/memberstatusq" accept-charset="UTF-8">
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
	
<form method="POST" action="/pems/memberstatusq" accept-charset="UTF-8">
{{ csrf_field() }}
 	<label for="memberid">Enter Member Number:</label>
	<input name="userid" type="text" value="" id="userid">
	<input name="process" type="hidden" value="byid">
<input class="btn btn-default" type="submit" value="Find">
	


</form>




<form method="POST" action="/pems/memberstatus/10316/showmemberstatus" accept-charset="UTF-8">
											
		<label for="newstatus">New Status</label>
		<select id="newstatus" name="newstatus"><option value="0">{Select a Status}</option><option value="1">AMNBC</option><option value="2">GAT</option><option value="3">GAT, CPM</option><option value="4">AAT</option><option value="5">AAT, CPM</option><option value="6">ACPA, CPM</option><option value="7">ACCEA</option><option value="8">ACPA, ACCEA, CPM </option><option value="9"> ACCEA, CPM</option><option value="10">FCPA</option><option value="11">FCCEA</option><option value="12">FCPA, FCCEA, CPM</option><option value="13">CPM</option><option value="14">ITA</option><option value="15">QAT</option><option value="16">RQA</option><option value="17">FQA</option><option value="Removed">Removed</option></select>
		<input class="btn btn-primary" type="submit" value="Change">
		</form>
								</div>

</div>
</div> <!-- end of 6 -->
						
				
</div> <!-- end of row -->
</div> <!-- end of 12 -->
				


				


  
</div>
@endsection