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
}
</style>
</head>
 @section('PageTitle', 'NBC')

<body>

<img src="logonbcfull.jpg" width="700px">

<h3 align="center"><b>Payment</b></h3>


<div><div style="float:right;width:50%;"><p><img src="ministrylogo.jpg" width="100px" heigh="100px"></p>
 </div>

<div style="width:50%;">
<p>{{$student->name}}</p>
<p>729</p>


    <p>Name:  {{$student->name}}</p>
    <p>Payment Date & Tax Point :{{$student->created_at}}</p>
    <p>Payment Number: {{$payment->id}}</p>
    <p>Member Number: {{$student->student_id}}</p>



</div>

</div>

<div >
<table  id="nbc2" width="100%">
<tr>
<th width="71%">Description</th><th widht="10%">Item Code</th><th width="15%">Amount Eue In $</th></tr>
<tr><td>Exam Exemption Fee Gross Value</td><td>2</td><td> {{$payment->payment}} $</td></tr>
<tr><th>Total Amount Due In $:</th><th></th><th> {{$payment->payment}} $</th></tr>
</table>
</div>
 

</table>



<br>
<p>This is your Cash In Transit receipt for monies paid locally by you to the NBC Regional Representative.</p>
<p>Because your payment will take some time to reach the NBC Central Office it will not be reflected in your MAP
Account until it is received by our Accounts Receivable Accountant.</p>
<p>We'll credit your MAP Account with Euro Amount when we receive the funds into our central account. In the
meantime, rest assured that the payment you have made has been recorded as Cash In Transit,
and has been properly allocated to you All enquiries concerning this Receipt should be make to
ar@nbcollege.net Please QUOTE YOUR MEMBER NUMBER IN ALL CASES.</p>
<br>
<br>

   

  </body>
</html>
