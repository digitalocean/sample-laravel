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
    width:100%px;
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
  width:100%px;
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
  width:100%px;
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

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 1.5em;
    font-family: sans-serif;
    width:100%;
    min-width: 400px;
    box-shadow: 0 0 10px rgb(243, 189, 5)
}

.styled-table thead tr {
    background-color: rgb(255, 11, 104);
    color: #ffffff;
    text-align: left;
    padding:5px;
    margin:5px;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color:rgb(255, 11, 104);
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid rgb(255, 11, 104);
}.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #ffffff;
}
</style>
</head>
 @section('PageTitle', 'NBC')

<body >

<img src="{{asset('public/logonbcfull2.jpg')}}" width="100%" heigh="100px">
 
<?php    
$attempno = $lastresult->id; 
    $id = $attempno;
            $id = $attempno;
           /// $lastresult = DB::table('ref_result')->where('id',$attempno)->first();
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
  <div class="controller">
    <div class="row">
        <div class="col-md-12">
        <h3 align="center"><b>Result</b></h3>
      
    <p>Name:  {{$student->name}}</p>
    <p>Payment Date & Tax Point :{{$student->created_at}}</p>
    <p>Member Number: {{$student->student_id}}</p>
        @foreach($resultq as $res)
           <?php $tot_mark = $tot_mark + $res->givenmarks;     ?>
    @endforeach
            
<!--
 <div style="float:right"><a href="http://127.0.0.1:8000/invoice/{ {$ inv_id}}"> Download PDF
 <img src="{{ asset('pdf1.png') }}" width ="150px" height="150px" alt="pdf" /> </a> </div>-->
 <div>
 <!--
 <table class="styled-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Dom</td>
            <td>6000</td>
        </tr>
        <tr class="active-row">
            <td>Melissa</td>
            <td>5150</td>
        </tr>
        <!-- and so on... -- >
    </tbody>
</table>
-->


@foreach($resultq as $res)
  
  <?php $time0 = 120; if($res->timing < $time0){$time0 = $res->timing;}//echo'time 0'. $time0.'<br>';} ?>

@endforeach
<?php
$time01 =  $exam->examtime;
$time01 = number_format($time01, 2);

$time00 = $time01 - $time0; 

?>
<style>
body {
  font-family: 'lato', sans-serif;
}
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
  .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{
      
    }
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
}

    td, th {
  width: 170px;
  border: 1px solid #ccc;
  text-align: center;
}
th {
  background: lightblue;
  border-color: white;
}
body {
  padding: 1.5rem;
}

</style>



<table align="center" ><tr>
<th>This Exam end in  </th><td>   <?php echo $time00; ?> minutes</td>

 </tr>
<tr>
 <th>Reminig Time is  </th><td>   <?php echo $time0; ?> minutes</td>
 </tr>
</table>
<table class="styled-table">
<thead>

 <!--<table  id="nbc2" width="100%">-->
 <tr>

<th>Candidate Name</th>
<th colspan="3"> {{$member->name}}</th>
</tr>
<thead>
<tbody>

<tr>
<td>Cadidate ID</td>
<td colspan="3">{{$member->student_id}}</td>
</tr>
<tr class="active-row">
<td>Examination</td>
<td colspan="3"> {{$exam->realcode}}  {{$exam->examtitle}}</td>
</tr>
<tr>
<td>Date and Time Sat</td>
<td> <?php $d=strtotime($lastresult->created_at); echo date("Y-m-d h:i:sa", $d);  ?></td>
<td></td>
<td></td>
</tr>
<tr class="active-row">
<td>Pass Mark % Required</td>
<td>65%</td>
<td>Time Allowed (mins)</td>
<td>take  <?php echo $time00; ?> minutes of {{$exam->examtime}} minutes</td>
</tr>
<tr>
<td></td>
<td>Answered Correctly</td>
<td>Answered InCorrectly</td>
<td>Total</td>
</tr>
<tr class="active-row">
<td>Number of Questions</td>
<td> {{ $tot_mark/$exam_question->marks }}</td>
<td>{{$totQ - $tot_mark/$exam_question->marks }}</td>
<td>{{$totQ}}</td>
</tr>
<tr>
<td>Percentages</td>
<td>{{$tot_mark}} %</td>
<td>{{100 - $tot_mark}} %</td>
<td>100%</td>
</tr>
<tr class="active-row">
<td>Result For tdis Exam</td>
<td colspan="3"><?php if($tot_mark<65){echo "Failed" ;}else{echo "Pass";} ?></td>
</tr>
<tbody>

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
