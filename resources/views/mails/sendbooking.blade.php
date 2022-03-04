<!DOCTYPE html>
<html>
<head>
<style>

/*
tr:nth-child(even) {
  border: 1px solid black;

  background-color: #dddddd;
}*/
h4{
    color:00F;
}
p.a {   font-style: normal; }

p.b {   font-style: italic;}

p.c {   font-style: oblique; }
#nbc{
  font-family: "Times New Roman", Times, serif;
  background-color: #8B0000;
  color: white;
  font-size:45px;
  text-align: center;
}
#nbc1{
  font-family: "Times New Roman", Times, serif;
  background-color: white ;
  color: #8B0000;
  font-size:30px;
  text-align: center;
}
#nbc2{
  width:100%;
  border: 3px solid black;
  font-family: "Times New Roman", Times, serif;
  background-color: white ;
  color: #8B0000;
  font-size:20px;
  text-align: center;
  border-collapse: separate;
  border-spacing: 3px;
}
</style>
</head>
 @section('PageTitle', 'NBC')

<body>
 
<img src="{{asset('public/logonbcfull2.jpg')}}" width="100% " heigh="150px">

<h1 align="center"> Receipt</h1>

<?php
$student_id= $booking->student_id;
$inv_id= $booking->id;
$user = DB::table('users')->where('student_id','=', $student_id)->first();  
$proctor = DB::table('proctordate')->first();  
$exam = DB::table('exam')->where('examcode','=', $booking->subject_id)->first();  
$email = $user->email;
$memberid = $user->student_id;
    ?>
<?php $id = $user->id;
 ?>
<div style="float:left">
<p> Dear :{{ $user->name}}</p> 
<p> Member Id :{{ $user->student_id}}</p>

 </div>
 <div style="float:right"><a href="https://acpaglobal.net/sendbookingpdf/{{$booking->id}}"> 
  <img src="{{asset('public/pdf1.jpg')}}"><br>
  Download PDF

   </a>

 </a></div>
 <div>
 <br>
  <br>
 <br>
 <br>
 <p>  </p>
 <div style="width:100%">
<p>Receipt ID: {{$booking->id}}</p>
<p align='left'>Dear Mr {{ $user->name}},<p>
<p>Affliate Member (AM)</p>

<p>Exam To Be Sat{{$exam->realcode}} {{$exam->examtitle}}</p>
<p>Date To Be Sat. {{ $proctor->id}}</p>
<p>Dear {{ $user->name}}</p>
<p>I am pleased to inform you that the above Exam has been booked to be sat, and I'd like to take this opportunity to with you an enjoyable and successful exam sitting.
<p>Kind regards.</p>
<!--<p>Almontga Ahmed</p>-->
<p>NBC Examination officer</p>


 </div> 
  
</div>

 
       
     	</div>
		</div>
    <br>
    <br>


@include('includes.footer')

</body>
</html>
