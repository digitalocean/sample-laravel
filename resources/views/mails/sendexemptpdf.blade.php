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

<h3 align="center"><b>INVOICE (Exam Exemption)</b></h3>


<div >
<table  id="nbc2" width="100%">
<tr>
<th width="71%">Description</th><th widht="10%">Item Code</th><th width="15%">Amount Eue In $</th></tr>
<tr><td>Exam Exemption Fee Gross Value</td><td>2</td><td>{{$invoice->amount}} $</td></tr>
<tr><th>Total Amount Due In $:</th><th></th><th>{{$invoice->amount}} $</th></tr>
</table>
</div>
 
        <br>
        <br>
          
     
  <br>
 
<br>
<p>This Invoice is due for payment in Euro currency upon receipt.</p>
<p>Sudan Members should make payment directly to the NBC AR in Khartoum.</p>
<p>All enquiries concerning this Invoice should be make to: info@acpaglobal.net
PLEASE QUOTE YOUR MEMEBER NUMBER IN ALL CASES.</p>
 
  <br>



  </body>
</html>
