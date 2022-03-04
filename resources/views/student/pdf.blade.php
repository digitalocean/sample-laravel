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

<img src="logonbcfull2.jpg" width="675px" heigh="150px">

<h3 align="center"><b>Invoice</b></h3>


 <div class="controller">
    <div class="row">
        <div class="col-md-12">
        <br>
        Name:  {{$student->name}}<br>
        <p>Invoice Date & Tax Point :{{$student->created_at}}</p>
        <p>Invoice Number: {{$invoice->id}}</p>
        <p>Member Number: {{$student->student_id}}</p>
       <!-- <div style="float:right"><a href="http://127.0.0.1:8000/invoice/{{$invoice->id}}"> Download PDF
 <img src="{{ asset('pdf1.png') }}" width ="150px" height="150px" alt="pdf" /> </a> </div>-->
        <br>
        <br>
          </div>
        <div class="col-md-12">
        <table id="nbc2">
        <thead><tr id="nbc2">
        <td style="text-align:left;" id="nbc2">Id</td><td id="nbc2" style="text-align:right;">Invoice Amount</td>
        </tr></thead><tbody><tr id="nbc2">
        <td id="nbc2" style="text-align:left;">{{$invoice->id}}</td><td id="nbc2" style="text-align:right;"> {{$invoice->amount}}$</td>
        </tr>
        </tbody>

</table>
<br>
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
