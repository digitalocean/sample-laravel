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
     
     
    th{border:solid 1px;}
    td{border:solid 1px;}
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
}#nbc3{
  width:100%;
  border: 2px solid red;
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

<body >

<img src="{{asset('public/logonbcfull2.jpg')}}" width="100%" heigh="150px">
 
<?php     
    $id = $attempno;
            $id = $attempno;
            $lastresult = DB::table('ref_result')->where('id',$attempno)->first();
            $memberid=$lastresult->student_id;
            $member = DB::table('users')->where('student_id',$memberid)->first();
            $student = DB::table('users')->where('student_id',$memberid)->first();
            $exam = DB::table('exam')->where('examcode',$lastresult->examcode)->first();
            $resultq = DB::table('result')->where('attempno',$attempno)->get();
            $exam_question = DB::table('exam_question')->where('examcode',$lastresult->examcode)->first();
            $tot_mark = 0;
            $tot_correct=0;
            if($exam->examtitle === 'Mook Exam'){$totQ=10;}else{$totQ=40;}
     //   echo $lastresult->id;
            ?>
     
<h3 align="center"><b>Result</b></h3>


 <div class="controller">
    <div class="row">
        <div class="col-md-12">
        <br>
      
    <p>Name:  {{$student->name}}</p>
    <p>Payment Date & Tax Point :{{$student->created_at}}</p>
     <p>Member Number: {{$student->student_id}}</p>

  

 
       @foreach($resultq as $res)
           <?php $tot_mark = $tot_mark + $res->givenmarks; 
           
           ?>
            @endforeach
            

 
<!--
 <div style="float:right"><a href="http://127.0.0.1:8000/invoice/{ {$ inv_id}}"> Download PDF
 <img src="{{ asset('pdf1.png') }}" width ="150px" height="150px" alt="pdf" /> </a> </div>-->
 <div>
 <table  id="nbc2" width="100%">
 <tr>

<th>Candidate Name</th>
<th colspan="3"> {{$member->name}}</th>
</tr>
<tr>
<th>Cadidate ID</th>
<th colspan="3">{{$member->student_id}}</th>
</tr>
<tr>
<th>Examination</th>
<th colspan="3"> {{$exam->realcode}}  {{$exam->examtitle}}</th>
</tr>
<tr>
<th>Date and Time Sat</th>
<th>{{$lastresult->created_at}}</th>
<th></th>
<th></th>
</tr>
<tr>
<th>Pass Mark % Required</th>
<th>65%</th>
<th>Time Allowed (mins)</th>
<th>{{$exam->examtime}}</th>
</tr>
<tr>
<th></th>
<th>Answered Correctly</th>
<th>Answered InCorrectly</th>
<th>Total</th>
</tr>
<tr>
<th>Number of Questions</th>
<th> {{ $tot_mark/$exam_question->marks }}</th>
<th>{{$totQ - $tot_mark/$exam_question->marks }}</th>
<th>{{$totQ}}</th>
</tr>
<tr>
<th>Percentages</th>
<th>{{$tot_mark}} %</th>
<th>{{100 - $tot_mark}} %</th>
<th>100%</th>
</tr>
<tr>
<th>Result For This Exam</th>
<th colspan="3"><?php if($tot_mark<65){echo "Failed" ;}else{echo "Pass";} ?></th>
</tr>
  </table>





<table class="table">
	
</table>


<p>
Above are the Results for the Exam You have just completed. <br/>
You Answered  {{ $tot_mark/$exam_question->marks }} Questions correctly from a possible {{$totQ}}, which gives you a correct percentage of {{$tot_mark}}. <br/>
This means you have <?php if($tot_mark<65){echo "Failed" ;}else{echo "Pass";} ?> This Examination. <br/>
</p>
<p>
<?php if($tot_mark<65){echo "Sorry. However, you can attempt this Examination again... " ;}else{echo "Congrateulate .......";} ?>
 <br/>
The above Results have been Logged against your achievement Record, which can be accessed via your Members Page. <br/>
These Results have also been E-mailed to your current E-Mail Address. If appropriate, Certificates will be sent to your current Home Address.
</p>
<p>Examination officer : Reem Mohyeldein. </p>



				</div>
	</div>
	</div>
</div>








<script>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
    var d = new Date();
    var old= document.getElementById("orignalseconds").value;
    var ew= old-1;
    document.getElementById("seconds").value = ew;
     document.getElementById("orignalseconds").value = ew;
}
function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
</script>

                </div>
            </div>
        </div>
        </div>
                              <div class="col-lg-12 " style="height:10px;">

                              </div>


                   
</body></html>
