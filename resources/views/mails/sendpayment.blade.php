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
    $student_id= $user->user_id;
    $pay_id= $user->id;
    $user = DB::table('users')->where('student_id','=', $student_id)->first();  
    $pay = DB::table('payments')->where('id','=', $pay_id)->first();  
    $email = $user->email;
    $memberid = $user->student_id;
// echo '<h1>'.$pay_id.'</h1>';
   ?>
<?php $id = $user->id;
 ?>
<div style="float:left">
<p> Dear :{{ $user->name}}</p> 
<p>Member Id :{{ $user->student_id}}</p>

 </div>
 <div style="float:right">
 <a href="http://acpaglobal.net/payment/{{$pay_id}}">
 <img src="{{asset('public/pdf1.jpg')}}"> <br>Download PDF
</a> 

 </a></div>
 <div>
 <br>
 <br>
 <br>
 <br>
 <p>  </p>
 <div style="width:100%">
<p>Receipt ID: {{$pay->id}}</p>
<p align='left'>Dear Mr {{ $user->name}},<p>
<p>Affliate Member (AM)</p>

<p>I am pleased to inform you that we have today received your Cash In Transit payment (paid in to the Regional Office).</p>

<p>Thank you for your prompt payment, and if you have any questions concerning this please contact me directly at this email address:
info@acpaglobal.net</p>

<p>Our Examination Officer has been informed of this payment, and if documents are due to you either she or the Membership Officer will be in contact with you soon.
NOTE: if you are expecting documents please make sure that you have confirmed your delivery addresses, and uploaded your picture as appropriate. This will ensure that we can dispatch your documents to you as quickly as possible.
To check your addresses and upload documents please sign in to your Member account (MAP)
on our website: acpaglobal.net</p>
 </div> 
 <!--<table  id="nbc2" width="100%">
  <tr>
    <td  id="nbc2">Payment ID  </td>
    <td  id="nbc2">Amount</td>
   </tr>
  <tr>
     <th  id="nbc2">{ { $ pay->id}}</th>
     <th  id="nbc2">{ { $ pay->payment}} $</th>
  </tr>
  </table>-->
</div>

<p>Kind regards.</p>

<p>{{Auth::user()->name}}</p>
<p>NBC Account Receivable</p>
     
     	</div>
		</div>
    <br>
    <br>


@include('includes.footer')

</body>
</html>
