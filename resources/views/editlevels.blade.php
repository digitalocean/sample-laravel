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
<form method="POST" action="/pems/allresultq" accept-charset="UTF-8">
{{ csrf_field() }}
	<label for="userid"> Select Member</label>
	<select id="userid" name="userid">
		<option value="0">Select a Member</option>
		@foreach($levels as $level)
		<option value="{{$level->id}}">{{$level->id}}</option>
		@endforeach
		</select>
	<input name="process" type="hidden" value="byselect">
	<input class="btn btn-default" type="submit" value="Choose">

</form>
	Or
	
<form method="POST" action="/pems/allresultq" accept-charset="UTF-6">
{{ csrf_field() }}
 	<label for="memberid">Enter Member Number:</label>
	<input name="userid" type="text" value="" id="memberid">
	<input name="process" type="hidden" value="byid">
<input class="btn btn-default" type="submit" value="Find">
	


</form>

				
</div>

	</div>
	</div> <!-- end of 6 -->
 <div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">Member Results Section</div>
<div class="panel-body">
 <table class="table">
 <tr><td>Result-ID</td><td>Course Title</td><td>Member-id</td><td>Action</td></tr>
 <?php 
 	 

	 ?>
 @foreach($levels as $level)
  <form action="editlevelname" >
  @csrf
 <tr><td>{{$level->id}}</td>

 <td><input type="text" name="id" value="{{$level->id}}"></td>
 <td><input type="text" name="levelcode" value="{{$level->levelcode}}"></td>
 <td><input type="text" name="level" value="{{$level->level}}"></td>
 <td><input type="text" name="certificate" value="{{$level->certificate}}"></td>
 <td><input type="text" name="certificate2" value="{{$level->certificate2}}"></td>
<td> <input type="submit" value="Edit"></td></tr>
 </form>
@endforeach
 </table>

</div>

	</div>
	</div> <!-- end of 6 -->
 
</div>
</div>
</div> <!-- end of 12 -->
				



 

@endsection