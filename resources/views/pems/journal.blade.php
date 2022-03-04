@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
       
              
     
<div class="container">
   <div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-heading">Members Journal</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<form method="POST" action="/pems/getmemberjournal" accept-charset="UTF-8">
						@csrf
						<div class="form-grounp">
						<label for="memberid">Enter the Member ID below, or select from the list. </label>
														
						<input class="form-control" required="required" name="memberid" type="text" value="{{$memberid}}" id="memberid">
				</div>
						<div class="form-grounp">
						<input name="process" type="hidden" value="memberdetails">
						<input class="btn btn-default" type="submit" value="Get Member">
						<a href='/ross/Members' class='btn btn-default'>Clear Member Details</a>
						</div>
						</form>
 					<b>   {{$membername}}</b>
 					</div>

<!--- ---------------------------------------------------------------------------------------------------------->
<div class="col-lg-6" style="margin-top:10px;">

	<form method="POST" action="/pems/journal/10313/showjournal/418/show" accept-charset="UTF-8">
@csrf		<label for="journaltitle">Journal Title</label>
 			<input class="form-control" name="journaltitle" type="text" value="{{$examtitle}}" id="journaltitle">
 			<label for="author">Author:ROSS_Country</label>
			<textarea name="author" cols="50" rows="10" id="author">
			
		{{$examstatus}}
		{{$memberid2}}
		{{$subject}}
		{{$subject}}
		</textarea>
																		
	</form>	
					</div>
					<!-- -->
					<div>
					</div>
				</div>
			</div>
	@if($memberid != 0)
<div class="col-lg-6">
		<div class="panel panel-default">
		
			<div class="panel-body">
					<table class="table">
					<tr>
						<th></th>
						<th>PK</th>
						<th>Member</th>
						<th>Title</th>
						<th>Author</th>
						<th>Date</th>
					</tr>
					@foreach($results as $result)<?php $exam=DB::table('exam')->where('examcode',$result->examcode)->first(); 
					$resulrid= $result->id;?>
					<tr><th><a href='/pems/journal/{{$memberid}}/showjournal/{{$resulrid}}/show'>Select</a></th>
						<th>{{$result->id}}</th>
						<th>{{$result->student_id}}</th>
						<th>Exam {{$result->pass}}</th>
						<th>ROSS_Country</th>
						<th>{{$result->created_at}}</th>
					</tr>
					@endforeach
					
				</table>			
			</div>
		</div>
	</div>
@endif
		</div>     
 	</div>
</div>
  
</div>
@endsection