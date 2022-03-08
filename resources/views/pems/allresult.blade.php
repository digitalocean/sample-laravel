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
		@foreach($users as $user)
		<option value="{{$user->student_id}}">{{$user->name}}</option>
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
@if($member_id > 9999)
<div class="col-lg-8">
<div class="panel panel-default">
<div class="panel-heading">Member Results Section</div>
<div class="panel-body">
 <table class="table">
 <tr><td>Result-ID</td><td>Course Title</td><td>Member-id</td><td>Action</td></tr>
 <?php 
	 $i =1; $tot_marks = 0;
	 $ref_results = DB::table('ref_result')->where('student_id',$member->student_id)->get();
	 

	 ?>
 @foreach($ref_results as $re)
 <?php 

	 $exam = DB::table('exam')->where('examcode',$re->examcode)->first();
	 //$question = DB::table('exam_question')->where('id',$res->ques_id)->first();  

 ?>
 <tr><td>{{$re->id}}</td><td>{{$exam->examtitle}}</td><td>{{$member->student_id}}</td><td>{{$re->pass}}</td>
 <td><a href="/pems/downloadresult/{{$re->id}}">Download</a></td></tr>
@endforeach
 </table>

</div>

	</div>
	</div> <!-- end of 6 -->
@endif

</div>
</div>
</div> <!-- end of 12 -->
				



 

@endsection