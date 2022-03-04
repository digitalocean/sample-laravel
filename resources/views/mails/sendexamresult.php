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
<!--
<div style="float:right; font-size:11px;border:none"><b >Nazlawi Business College</b></div><br>
   <div style="float:right; font-size:11px;"><b>Kafori, Bahry, Khartoumm, SUDAN </b></div><br>
   <a href="http://acpaglobal.net/" style="float:right; font-size:11px;"><b>http://acpaglobal.net</b></a>
   <table><tr><td id="nbc">NBC</td><td id="nbc1">Nazlawi Business College</td></tr></table>
-->

 <!-- Site header
 <table style="border:none"><h1>
   <tr style="border:none">

   <div style="float:right; font-size:11px;border:none"><b>Nazlawi Business College</b></div><br>
   <div style="float:right; font-size:11px;"><b>Kafori, Bahry, Khartoumm, SUDAN </b></div><br>
   <a href="http://acpaglobal.net/" style="float:right; font-size:11px;"><b>http://acpaglobal.net</b></a>
<td style="background-color:red;color:white;width:160;font-size:130px;border:none">NBC<td>
<td style="background-color:white;color:red;font-size:50px;family-font:arial; vertical-align: bottom;border:none">Nazlawi Business College</td>
</tr>
</table> -->
<h1 align="center"> Exam Result</h1>

  
<div style="float:left">
<br>
        Name:  {{$member['name']}}<br>
        <p>Invoice Date & Tax Point :{ {$ user->created_at}}</p>
        <p>Invoice Number: { { $ inv->id}}</p>
        <p>Member Number: { {$ user->student_id}}</p>
 </div>
 <div style="float:right"><a href="http://acpaglobal.net/invoice/{ {$ inv_id}}">
 <img src="{{asset('public/pdf1.jpg')}}"> <br>Download PDF
</a> </div>
 <div>
 <br>
  <br>
 <br>
 <br>
 <p>  </p>
 <!--Name: {{ $user->name }}<br>
 Member id:  {{ $user->student_id }}-->
 <table  id="nbc2" width="100%">
  <tr>
    <td  id="nbc2">invoice ID  </td>
    <td  id="nbc2">Amount</td>
   </tr>
  <tr>
     <th  id="nbc2">{ {$ inv->id}}</th>
     <th  id="nbc2">{ {$ inv->amount}} $</th>
  </tr>
  </table>
</div>
 <!--<p  class="a">Membership: { { Auth::user()->student_id}}</p>-->
 <!--<p class="b">Name: {{ $user->name }}</p>-->
 <!--<p class="c`">Email: { {  Auth::user()->email}}</p>-->
    <!-- END Site header -->
    <!-- Main container 
<br>

<a href="{{ url('completeregister/'.$id) }}" type="submit" value="" style="background-color:green;color:#FFF;heigh:20px; width:500px;font-size:25px;">Click Here To complete your registeration</a>
 		-->

     
    <div class="panel panel-default">
 
      
            Total Marks : { { $ tot_mark }} 
            Correct Answers : { { $ tot_mark/$exam_question->marks }}

<p>
Name: { {$member->name}} - Member ID: { {$member->student_id}} <br/>
- This is Examination: { {$exam->realcode}}  { {$exam->examtitle}}  
</p>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
				<div class="panel-heading" style="font-size:15pt;">Exam Results Transcript</div>
				<div class="panel-body">
<table class="table">
	<tr>

		<th>Candidate Name</th>
		<td colspan="3"> { {$member->name}}</td>
	</tr>
	<tr>
		<th>Cadidate ID</th>
		<td colspan="3">{ {$member->student_id}}</td>
	</tr>
	<tr>
		<th>Examination</th>
		<td colspan="3"> { {$exam->realcode}}  {{$exam->examtitle}}</td>
	</tr>
	<tr>
		<th>Date and Time Sat</th>
		<td>{ {$lastresult->created_at}}</td>
	</tr>
	<tr>
		<th>Pass Mark % Required</th>
		<td>65%</td>
		<th>Time Allowed (mins)</th>
		<td>{ {$exam->examtime}}</td>
	</tr>
	<tr>
		<td></td>
		<th>Answered Correctly</th>
		<th>Answered InCorrectly</th>
		<th>Total</th>
	</tr>
	<tr>
		<th>Number of Questions</th>
		<td> { { $ tot_mark/$exam_question->marks }}</td>
		<td>{ { $ totQ - $ tot_mark/$exam_question->marks }}</td>
		<td>10</td>
	</tr>
	<tr>
		<th>Percentages</th>
		<td>{ {$tot_mark}} %</td>
		<td>{ {100 - $tot_mark}} %</td>
		<th>100%</th>
	</tr>
	<tr>
		<th>Result For This Exam</th>
		<td colspan="3"> STATUS</td>
	</tr>
</table>


<p>
Above are the Results for the Exam You have just completed. <br/>
You Answered  {{ $tot_mark/$exam_question->marks }} Questions correctly from a possible {{$totQ}}, which gives you a correct percentage of {{$tot_mark}}. <br/>
This means you have < php if($tot_mark<65){echo "Failed" ;}else{echo "Pass";} ?> This Examination. <br/>
</p>
<p>
<  ?php if($ tot_mark<65){ echo "Sorry. However, you can attempt this Examination again... " ;}else{echo "Congrateulate .......";} ?>
 <br/>
The above Results have been Logged against your achievement Record, which can be accessed via your Members Page. <br/>
These Results have also been E-mailed to your current E-Mail Address. If appropriate, Certificates will be sent to your current Home Address.
</p>


     
     
     	</div>
		</div>
    <br>
    <br>


@include('includes.footer')

</body>
</html>
