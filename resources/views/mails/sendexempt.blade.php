<!DOCTYPE html>
<html>
<head>
<style>


/*
tr:nth-child(even) {
  border: 1px solid black;

  background-color: #dddddd;
}*/
body{
    width:95%;
    align:center;
    padding:5px;
    margin:5px;
    }
     
    tr{border:solid 1px;
        padding:5px;
         margin:5px;
    }
    th{border:solid 2px;}
h4{
    color:00F;
}
p.a {   font-style: normal; }

p.b {   font-style: italic;}

p.c {   font-style: oblique; }
#nbc{
  font-family: "Times New Roman", Times, serif;
  background-color: #DA0000;
  color: white;
  font-size:65px;
  text-align: center;
  padding:5px;
         margin:5px;
  
}
#nbc1{
  font-family: "Times New Roman", Times, serif;
  background-color: black ;
  color: #ffffff;
  font-size:25px;
  text-align: center;
  padding:5px;
         margin:5px;
}
#nbc2{
  width:100%;
  border: 2px solid black;
  font-family: "Times New Roman", Times, serif;
  color:  #002002;
  font-size:20px;
  text-align: left;
  margin:3px;padding:3px;
  border-collapse: separate;
  border-spacing: 3px;
  padding:5px;
         margin:5px;
}
</style>

</head>
 @section('PageTitle', 'NBC')

<body>
<img src="{{asset('public/logonbcfull2.jpg')}}" width="100% " heigh="150px">

 <!--<div style="background-color:black;color:silver;padding:20px;  margin:20px;">

   <table><tr><td id="nbc">NBC</td><td id="nbc1">Nazlawi Business College</td></tr></table>
</div>

<div style="float:right; font-size:11px;border:none"><b >Nazlawi Business College</b></div><br>
   <div style="float:right; font-size:11px;"><b>Kafori, Bahry, Khartoumm, SUDAN </b></div><br>
   <a href="http://nbcollege.net/" style="float:right; font-size:11px;"><b>http://nbcollege.net</b></a>

-->

<h1 align="center"> Exempt Exam </h1>

<?php   

    $memberid=$lastresult->student_id;

    $ref_id = DB::table('ref_result')->where('pass','Exempt')->where('student_id',$memberid)->where('examcode',$lastresult->subject_id)->max('id');
    $lastresult2 = DB::table('ref_result')->where('id',$ref_id)->first();
    $member = DB::table('users')->where('student_id',$memberid)->first();
    $exam = DB::table('exam')->where('examcode',$lastresult->subject_id)->first();
  ?>
      
            

 </div>
 
 <div>
 <p> Member Name: {{$member->name}}</p>
 <p>Member Number: {{$member->student_id}}</p>
 <p>Dear {{$member->name}}</p>
 {{$lastresult->amount}}<br>
 <p>I'm pleased to inform you that we have applied the following Exemptions to your Exam ScoreCard:</p>
  <p>Exam Title: {{$exam->realcode}} {{$exam->examtitle}}</p>
  <p>An invoice for the Exemption is attached and has been added to your account.</p>
  <p>If you need any help or advice then please feel free to contact me directly at</p>

  <div style="float:right"><a href="https://acpaglobal.net/sendexamptepdf/{{$ref_id}}/{{$exam->examcode}}/{{$member->student_id}}"> Download PDF
  <img src="{{asset('public/pdf1.jpg')}}">
 </a> 

 </a></div> 
 <br>

  <p>info@acpa-global.com</p>
  <p>Kind regards</p>

  <p>{{Auth::user()->name}}</p>
  <p>NBC MembershiOfficer</p>

  <!--
 <table  id="nbc2" width="100%">
 <tr>

<th>Candidate Name</th>
<th colspan="3"> { { $ member->name}}</th>
</tr>
<tr>
<th>Cadidate ID</th>
<th colspan="3">{ { $ member->student_id}}</th>
</tr>
<tr>
<th>Examination</th>
<th colspan="3"> { { $ exam->realcode}}  { { $ exam->examtitle}}</th>
</tr>
<tr>
<th>Date and Time Sat</th>
<th>{ {$ lastresult->created_at}}</th>
<th></th>
<th></th>
</tr>

  </table>





<table class="table">
	
</table>


<p>
Above are the Results for the Exam You have just completed. <br/>
You Answered    Questions correctly from a possible , which gives you a correct percentage of  . <br/>
This means you have   This Examination. <br/>
</p>
<p>
  <br/>
The above Results have been Logged against your achievement Record, which can be accessed via your Members Page. <br/>
These Results have also been E-mailed to your current E-Mail Address. If appropriate, Certificates will be sent to your current Home Address.
</p>-->



				</div>
	  </div>
	</div>
</div>









                </div>
            </div>
        </div>
        </div>
                              <div class="col-lg-12 " style="height:10px;">

                              </div>


                   
</body></html>
