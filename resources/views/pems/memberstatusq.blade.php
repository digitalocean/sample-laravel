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
<form method="POST" action="/pems/memberstatus" accept-charset="UTF-8">
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
	
<form method="POST" action="/pems/memberstatus" accept-charset="UTF-8">
{{ csrf_field() }}
 	<label for="memberid">Enter Member Number:</label>
	<input name="memberid" type="text" value="{{$member->student_id}}" id="memberid">
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
											
					     	<div class="col-lg-6">
								<div class="panel panel-default">
									<div class="panel-heading">Graduation History (From Graduation Table)</div>
									<div class="panel-body">
										<table class="table">
										<?php 
										$i = 1;
										$levels = DB::table('memberlevel')->where('student_id',$member->student_id)->get(); ?>


										<tr>
												<th>Grad ID</th>
												<th>	Member</th>
												<th>	Status</th>
												<th>	Grad Date</th>
											</tr>
										@foreach($levels as $level)
											<tr>
												<th>{{$i}}</th>
												<th>	{{$level->student_id}}</th>
												<th>	{{$level->levelname}}</th>
												<th>	{{$level->created_at}}</th>
											</tr>
											<?php $i = $i+1; ?>
										@endforeach
										
										</table>
									

									</div>

								</div>

							</div>


						
				
								</div> <!-- end of row -->
<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Apply Exemptions Section</div>
				<div class="panel-body">
				Exam ScoreCard for: {{$member->name}}


				<table class="table">
				<thead>
					<tr>
					<th>Code</th>
						<th>Title</th>
						<th>Exam Status</th>
						<th>Attemp</th>
						<th>Date</th>
					</tr>
				</thead>
						<?php $exams = DB::table('exam')->where('examtitle','!=','Empty')->get(); ?>
						@foreach($exams as $e)
						<tr>	
						<th>	{{$e->realcode}}</th>
						<th>	{{$e->examtitle}}</th>
   						<th>
						   
	 <?php $res =DB::table('ref_result')->where([['examcode',$e->examcode],['student_id',$member->student_id]])->get();
		$count =DB::table('ref_result')->where([['examcode',$e->examcode],['student_id',$member->student_id]])->count();
		if($count == 0){echo 'Available';
			}else{
				$exempt = 'Exempt';
				$countExempt =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->count();
				$ref_result =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->first();
					if($countExempt != 0)
					{echo $ref_result->pass;
						  
						}else{
						$passing = 'Pass';
						$countpass =DB::table('ref_result')->where('pass',$passing )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->count();
							if($countpass != 0){echo 'Pass';

							}else{
								echo 'Faield';
 
							}

 						}
			}
			//$countall = $countavilable + $countExempt + $countpass; echo '<br>'.$countall.'<br>';
?>

						   </th>
						  
						   <td>
	<?php $res =DB::table('ref_result')->where('examcode',$e->examcode)->where('student_id',$member->student_id)->get();
		$count =DB::table('ref_result')->where('examcode',$e->examcode)->where('student_id',$member->student_id)->count();
		if($count == 0){ $countavilable = 0;echo 0;
			}else{
				$exempt = 'Exempt';
				$countExempt =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->count();
				$ref_result =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->first();
					if($countExempt != 0)
					{echo $countExempt;
 						  
						}else{
						$passing = 'Pass';
						$countpass =DB::table('ref_result')->where('pass',$passing )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->count();
							if($countpass != 0){echo $countpass;
 
							}else{
								//echo 'Faield';
 							}
 					}
			}
			//$countall = $countavilable + $countExempt + $countpass; echo '<br>'.$countall.'<br>';
?>
						   </td>
						   <td>
						   
	<?php $res =DB::table('ref_result')->where('examcode',$e->examcode)->where('student_id',$member->student_id)->get();
		$count =DB::table('ref_result')->where('examcode',$e->examcode)->where('student_id',$member->student_id)->count();
		if($count == 0){ $countavilable = 0;
			}else{
				$exempt = 'Exempt';
				$countExempt =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->count();
				$ref_result =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->first();
					if($countExempt != 0)
					{echo $ref_result->created_at;
 						  
						}else{
						$passing = 'Pass';
						$countpass =DB::table('ref_result')->where('pass',$passing )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->count();
						$ref_result =DB::table('ref_result')->where('pass',$passing )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->first();
							if($countpass != 0){echo  $ref_result->created_at;
 
							}else{
								$passing = 'Pass';
								$ref_result =DB::table('ref_result')->where('pass',$passing )->where('examcode',$e->examcode)->where('student_id',$member->student_id)->first();
								echo  $ref_result->created_at;
								//echo 'Faield';
 							}
 					}
			}
			//$countall = $countavilable + $countExempt + $countpass; echo '<br>'.$countall.'<br>';
?>
						   </td>
						</tr>
						@endforeach
 				</table>

				</div>
				</div>
			</div>
			</div>
						
	</div>
</div> <!-- end of 12 -->
				


				


  
</div>
@endsection