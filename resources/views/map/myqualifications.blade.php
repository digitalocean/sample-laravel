@extends('layouts.mastermap')
@section('content')

<div class="container">
<?php
            $id = Auth::user()->student_id;
            // echo $id;
            $payments1 = DB::table('payments')->where('user_id','=',$id)->get();
            $proctordate = DB::table('proctordate')->where('user_id','=',$id)->get();
            $payments1 = DB::table('payments')->where('user_id','=',$id)->get();
             // echo  $proctordate;
             $usr= DB::table('users')->where('student_id',$id)->first();
             $fullname  = $usr->fullname;
          ?>
    <!-- Marketing Icons Section -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading"> My Nazlawi business College Qualifications: 
        <br/>{{Auth::user()->student_id}} {{Auth::user()->name}}<br/>
         My member Status is Affliate Member (AM) since {{Auth::user()->created_at}}.
      </div>
      <div class="panel-body">
           <form method="POST" action="/changefullname">
           @csrf

             <div class="form-group">
              <label for="username">IMPORTANT: Your name will appear on Certificates as: </label>
              <input class="form-control" name="fullname" type="text" value="{{ $fullname}}" id="fullname">
            </div>
             <div class="form-group">
              <input class="btn btn-success" type="submit" value="Enable Name Change">
            </div>
          </form>
        </div>
        </div>
        </div>
      

	<div class="col-lg-6">
			<div class="panel panel-default">
      <div class="panel-heading"> Qualification State</div>

			  <div class="panel-body">
			  
  <table class="table">
      <thead>
        <tr>
        <th>Code</th>
          <th>Title</th>
          <th>Exam Status</th>
          <th>Attempt </th>
          <th>Exam date </th>
        </tr>
      </thead>
<?php
$student_id = Auth::user()->student_id;
  $usr= DB::table('users')->where('student_id',$student_id)->first();
?>
    <?php $exams = DB::table('exam')->get(); ?>
    @foreach($exams as $e)
    <tr>	
      

    
    <td>	{{$e->realcode}}</td>
    <td>	{{$e->examtitle}}</td>
        <td>
        
<?php $res =DB::table('ref_result')->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->get();
  $count =DB::table('ref_result')->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->count();
  if($count == 0){echo 'Available';
    }else{
      $exempt = 'Exempt';
      $countExempt =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->count();
      $ref_result =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->first();
        if($countExempt != 0)
        {echo '<p style="background-color: GreenYellow; padding:10px;">Exempt';
          }else{
          $passing = 'Pass';
          $countpass =DB::table('ref_result')->where('pass',$passing )->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->count();
            if($countpass != 0){echo 'Pass';}else{
              echo 'Faield';}

           }
    }
?>

      </td>
    <td>
<?php

$count =DB::table('ref_result')->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->count();
echo $count;
?>
</td>
<td>
  <?php $res =DB::table('ref_result')->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->get();
  $count =DB::table('ref_result')->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->count();
  if($count == 0){echo ' ';
    }else{
      $exempt = 'Exempt';
      $countExempt =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->count();
      $ref_result =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->first();
        if($countExempt != 0)
        {echo $ref_result->created_at;
          }else{          
          $passing = 'Pass';
          $ref_result =DB::table('ref_result')->where('pass',$passing )->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->first();
          $countpass =DB::table('ref_result')->where('pass',$passing )->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->count();
            if($countpass != 0){
              echo $ref_result->created_at;}else{
                $exempt = 'Faield';
                $countExempt =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->count();
                $ref_result =DB::table('ref_result')->where('pass',$exempt )->where('examcode',$e->examcode)->where('student_id',$usr->student_id)->first();
                if($countpass != 0){
                  echo $ref_result->created_at;}else{
                    echo date('Y-m-d');
                  }  
              echo date('Y-m-d');
            } }}
?>
</td>
          </tr>
          @endforeach
      </table>


			  </div>
			</div>
	</div>

<div class="col-lg-6">
    <div class="panel panel-default">
    <div class="panel-heading"> Qualification picture</div>

<div class="panel-body">
If you would like your picture to be Cembedded into your qualification documents then please check the box: Embed My Picture:
Current Status:
My Picture WILL be included on Certificates.
  <hr/>
  <form enctype="multipart/form-data" method="POST" action="{!! route('profileavatar') !!}">
            @csrf

                <div class="form-group row">

                    <div class="col-md-8">
                        <input  type="file" class="form-control" name="avatar">
                        <input  type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">

                    </div>
                </div>
                <div class="form-group row mb-8">
                        
    <input class="btn btn-success" type="submit" value="Upload and Save the above file">
  </form>

               <!--   <a href="" @ click.prevent="printme" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>Print</a>-->
               </div>
               </div>
               </div>
               </div>
              
			  	
 
 



@endsection


