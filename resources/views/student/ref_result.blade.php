<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{$student->name}}</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
      body {
  background-color: white;
}

h1 {
  color: #000;
  text-align: center;
}

p {
  font-family: verdana;
  font-size: 12px;
}
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
  border: 1px solid black;
  font-family: "Times New Roman", Times, serif;
  background-color: white ;
  color: #8B0000;
  font-size:18px;
  text-align: center;
  border-collapse: separate;
  border-spacing: 3px;
  padding:1px;
  margin:1px;
}
#myHeader {
  background-color: lightblue;
  color: black;
  padding: 40px;
  text-align: center;
}

/* Style all elements with the class name "city" */
.city {
  background-color: tomato;
  color: white;
  padding: 10px;
} 
</style>
  </head>
  <body>

 <!-- Site header -->

<div style="float:right; font-size:11px;border:none"><b >Nazlawi Business College</b></div><br>
<div style="float:right; font-size:11px;"><b>Kafori, Bahry, Khartoumm, SUDAN </b></div><br>
<a href="http://nbcollege.net/" style="float:right; font-size:11px;"><b>http://nbcollege.net</b></a>
<table><tr><td id="nbc">NBC</td><td id="nbc1">Nazlawi Business College</td></tr></table>


 <div class="controller">
    <div class="row">
        <div class="col-md-12">
        <br>  <br>
        Name:  {{$student->name}}<br>
        <p>Result Date & Tax Point :{{$student->created_at}}</p>
        <p>Result Number: {{$ref_result->id}}</p>
        <p>Member Number: {{$student->student_id}}</p>
       <!-- <div style="float:right"><a href="http://127.0.0.1:8000/invoice/ id}}"> Download PDF
 <img src="{{ asset('pdf1.png') }}" width ="150px" height="150px" alt="pdf" /> </a> </div>-->
        <br>
      
          </div>
        
<br>

<h1 align="center"> Result</h1>



<?php       $id = DB::table('ref_result')->max('id');
            $lastresult = DB::table('ref_result')->where('id',$id)->first();
            $memberid=$lastresult->student_id;
            $member = DB::table('users')->where('student_id',$memberid)->first();
            $exam = DB::table('exam')->where('examcode',$lastresult->examcode)->first();
            $resultq = DB::table('result')->where('attempno',$id)->get();
            $exam_question = DB::table('exam_question')->where('examcode',$lastresult->examcode)->first();
            $tot_mark = 0;
            $tot_correct=0;
            if($exam->examtitle === 'Mook Exam'){$totQ=10;}else{$totQ=40;}
     //   echo $lastresult->id;
            ?>
            @foreach($resultq as $res)
           <?php $tot_mark = $tot_mark + $res->givenmarks; 
           
           ?>
            @endforeach
            
        <div class="col-md-12">
        <table id="nbc2">
        <thead>
        <tr id="nbc2">
        <td style="text-align:left;" id="nbc2">Candidate Name</td>
        <td id="nbc2" style="text-align:left;">{{$member->name}} </td>
        <td id="nbc2" style="text-align:left;"> </td>
        <td id="nbc2" style="text-align:left;"> </td>
        </tr>
        
        </thead><tbody>
        <tr id="nbc2">
        <td id="nbc2" style="text-align:left;">Cadidate ID</td>
        <td id="nbc2" style="text-align:left;"> {{$member->student_id}}</td>
        <td id="nbc2" style="text-align:right;"> </td>
        <td id="nbc2" style="text-align:right;"> </td>
        </tr>

        <tr id="nbc2">
        <td id="nbc2" style="text-align:left;">Examination</td>
        <td id="nbc2" style="text-align:left;"> {{$exam->realcode}}  {{$exam->examtitle}}</td>
        <td id="nbc2" style="text-align:right;"> </td>
        <td id="nbc2" style="text-align:right;"> </td>
        </tr>
        <tr id="nbc2">
        <td id="nbc2" style="text-align:left;">Date and Time Sat</td>
        <td id="nbc2" style="text-align:left;"> {{$lastresult->created_at}}</td>
        <td id="nbc2" style="text-align:left;"></td>
        <td id="nbc2" style="text-align:left;"></td>
        </tr>

        <tr id="nbc2">
        <td id="nbc2" style="text-align:left;">Pass Mark % Required</td>
        <td id="nbc2" style="text-align:left;">65%</td>
        <td id="nbc2" style="text-align:left;">Time Allowed (mins)</td>
        <td id="nbc2" style="text-align:left;">{{$exam->examtime}}</td>
        </tr>
        <tr id="nbc2">
        <td id="nbc2" style="text-align:left;">
         </td><td id="nbc2" style="text-align:left;"> 
         </td><td id="nbc2" style="text-align:left;">Answered Correctly</td>
         <td id="nbc2" style="text-align:left;">Total</td>
        </tr>
        <tr id="nbc2">
        <td id="nbc2" style="text-align:left;">Number of Questions</td>
        <td id="nbc2" style="text-align:left;"> {{ $tot_mark/$exam_question->marks }}</td>
        <td id="nbc2" style="text-align:left;">{{$totQ - $tot_mark/$exam_question->marks }}</td>
        <td id="nbc2" style="text-align:left;">{{$totQ}}</td>
        </tr>
        <tr id="nbc2">
      <td id="nbc2" style="text-align:left;">Percentages</td>
      <td id="nbc2" style="text-align:left;">{{$tot_mark}} %</td>
      <td id="nbc2" style="text-align:left;">{{100 - $tot_mark}} %</td>
      <td id="nbc2" style="text-align:left;">100%</td>
        </tr>

        <tr id="nbc2">
        <td id="nbc2" style="text-align:left;">Result For This Exam</td>
        <td id="nbc2" style="text-align:left;"><?php if($tot_mark<65){echo "Failed" ;}else{echo "Pass";} ?></td>
        <td id="nbc2" style="text-align:right;"> </td>
        <td id="nbc2" style="text-align:right;"> </td>
        </tr>

        </tbody>
</table>

 </div>
 <!--
 <div style="float:right"><a href="http://127.0.0.1:8000/invoice/{ {$ inv_id}}"> Download PDF
 <img src="{{ asset('pdf1.png') }}" width ="150px" height="150px" alt="pdf" /> </a> </div>-->
 <div>
 <br>
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

<!--
  <p>This is your recept for monies paid locally by you to the NBC Regional Representative.</p>
  <p>Because your payment will take some time to reach the NBC Central Office it will be relflected in your MAP its is received by our Accouts Receivable Accountant. We'll credit your MAP Account with the Dollar Amount when</p>
  <p>we receive the funds into our central account. In the meantime, we are currently processed your request that is related to this payment.</p>
  <p>All enquiries concerning this Receipt should be made to: AR@Nazalwi.BusinessCollege</p>
  <p>PLEASE QUOTE YOUR MEMBER NUMBER IN ALL CASES.</p>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
