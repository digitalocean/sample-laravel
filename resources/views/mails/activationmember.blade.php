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

<div style="float:right; font-size:11px;border:none"><b >Nazlawi Business College</b></div><br>
   <div style="float:right; font-size:11px;"><b>Kafori, Bahry, Khartoumm, SUDAN </b></div><br>
   <a href="http://acpaglobal.net/" style="float:right; font-size:11px;"><b>http://acpaglobal.net</b></a>
   <table><tr><td id="nbc">NBC</td><td id="nbc1">Nazlawi Business College</td></tr></table>

 
<h1 align="center"> Activation Data</h1>

<?php
$student_id= $user->student_id;
$inv_id= $user->id;
$user = DB::table('users')->where('student_id','=', $student_id)->first();  
$inv = DB::table('invoices')->where('id','=', $inv_id)->first();  
$email = $user->email;
$memberid = $user->student_id;
// echo '<h1>'.$inv_id.'</h1>';
   ?>
<?php $id = $user->id;
//echo $id;
?>
<div>
<br>
        <p>Affiliate Member Name:  {{$user->name}}</p>
        <p>Affiliate Member Number: {{$user->student_id}}</p>
        <p>Affiliate Member Designation: AMNBC</p>


        <p>Invoice Date & Tax Point :{{$user->created_at}}</p>
        <p>Invoice Number: {{$inv->id}}</p>
        <p>Member Number: {{$user->student_id}}</p>

        Dear {{$user->name}}

 </div>
 
 <div>

  
<P>Congratulations on becoming an Affiliate Member of Nazlawi Bussiness College.
Your Registration Invoice is attached, and you can pay this by paying our MEA Director in Khartoum.
You can now access your Members Access Portal (MAP) account using the following credentials:</p>
<p>Name: {{$user->name}}</p>
<p>MemberID: {{$user->student_id}}</p>
<p>Password: {{$user->password2}}</p>
<p>To do so follow the MAP link from our website: <a href="http://acpaglobal.net">acpaglobal.net</a></p>

<p>You can then print out your Affiliate Member Certificate, and order a hardcopy to be delivered if you wish.
Also, you can access a copy of your invoice/receipt for printing.</p>

<p>If you need any help or advice then please feel free to contact me directly at info@acpaglobal.net
Kind regards</p>

<p>Mohyeldein</p>
<p>NBC MembershiOfficer</p>
 
 <br>
  <br>
 <br>
 <br>
 <p>  </p>
     	</div>
         <div ><a href="http://acpaglobal.net/sendregisterationdatapdf/{{$inv_id}}"> Download PDF
         <img src="{{asset('public/pdf1.jpg')}}">
 </a> </div>
		</div>
    <br>
    <br>


@include('includes.footer')

</body>
</html>
