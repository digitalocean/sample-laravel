@extends('layouts.masterpass1')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')

 

<div class="container">    
<div class="row">
  <div class="col-lg-12">
         <div class="panel panel-default">   
<?php    $today = date('Y-m-d');
         $n_today = strtotime($today);
                 // echo $today.'Date as number'.$n_today; ?>            
        <div class="panel-heading">PassPort Home Page: You are Signed In as: {{Auth::user()->name}}</div>
			<div class="panel-body">
				<P>Welcome {{Auth::user()->name}} to the Nazlawi Bussiness College Examination Hall. </P>
                <div id="examstatus">
                Please Confirm Below the Exam you Wish to Sit... <br/>
                If the Exam is set to Open you'll be allowed to enter the Exam room.  <br/>
                Once inside, you'll still have the opportunity to cancel your sitting before the exam starts, without any consequences. 
                </div>
                <br/>
                <div class='col-lg-12'>

    <form action="attempno" method="post">
        @csrf
            <?php
                foreach($exams as $exam){
                    $ref_results1 = DB::table('ref_result')->where('examcode',$exam->examcode)->where('student_id',$student_id)->where('mailing',0)->max('id');
                    if($ref_results1 > 0){
                    // echo 'Open Exam';
                    }
                ///  echo'<p>'.$exam->examcode.' '.$exam->examtitle.'</p>';
            }
        ?>
    </form>
    <br>
<form action="selectexam3" method="post">
        @csrf
    <select name="examcode">
        <option value="">Select Exam </option>

        @foreach($exams as $exam)
            <option value="{{$exam->examcode}}"> {{$exam->realcode}}: {{$exam->examtitle}} </option>
         @endforeach
    </select>
    <input type="submit" class="btn btn-warning" value="Select">
    </form>

 @if($attempno > 1)
<form action="instruction" method="post">
    @csrf

    <input type="hidden" name="attempno" value="{{$attempno}}">
    <input type="hidden" name="examcode" value="{{$examcode}}">
    <input type="text" name="examrealcode" value="<?php $exam = DB::table('exam')->where('examcode',$examcode)->first(); echo $exam->realcode; ?>">
    <input type="text" name="examtitle" value="<?php $exam = DB::table('exam')->where('examcode',$examcode)->first(); echo $exam->examtitle; ?>" >
     <?php 
    $ref_result = DB::table('ref_result')->where('id',$attempno)->first(); 
    $result = DB::table('result')->where('attempno',$attempno)->where('givenmarks',Null)->first(); 
    //echo  $result= $result->timing;
   // echo $exam->examtitle; ?>
       <input type="hidden" name="timeing" value="<?php
       $ref_result = DB::table('ref_result')->where('id',$attempno)->first(); 
       $result = DB::table('result')->where('attempno',$attempno)->where('givenmarks',Null)->first(); 
       echo   $result= $result->timing; ?>" >

    <input type="submit" class="btn btn-success" value="Select Exam">
</form>
@endif



</div>




			</div>
		</div>
	</div>



</div>
	
@endsection

 