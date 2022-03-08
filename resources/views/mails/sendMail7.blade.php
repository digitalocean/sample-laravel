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
  width:150px;
  border: 1px solid black;
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
<!--
<div style="float:right; font-size:11px;border:none"><b >Nazlawi Business College</b></div><br>
   <div style="float:right; font-size:11px;"><b>Kafori, Bahry, Khartoumm, SUDAN </b></div><br>
   <a href="http://acpaglobal.net/" style="float:right; font-size:11px;"><b>http://acpaglobal.net</b></a>
   <table><tr><td id="nbc">NBC</td><td id="nbc1">Nazlawi Business College</td></tr></table>


<h1 align="center"> Receipt</h1>-->
<img src="{{asset('public/logonbcfull2.jpg')}}" width="100% " heigh="150px">

<?php
$email = $name[3];
$user = DB::table('users')->where('email','=', $email)->first();  
$student_id= $user->student_id;
$inv_id= $user->id;
$user = DB::table('users')->where('student_id','=', $student_id)->first();  
$inv = DB::table('invoices')->where('id','=', $inv_id)->first();  
$email = $user->email;
$memberid = $user->student_id;
// echo '<h1>'.$inv_id.'</h1>';
   ?>
  <div>
 <?php
 $email = $name[3];
 $user = DB::table('users')->where('email','=', $email)->first(); 
 $id=$user->id;
 ?>
   <br>
  <!--{{$user->id}}-- >
  <br><br><br><br><br><br>
</div>
 <h1>This is Peding Registeration Mail Click Down to Register</h1>
 <p  class="a">Membership: {{ $user->student_id}}</p>
 <p class="b">Name: {{ $name[1] }}</p>
 <p class="c`">Email: {{  $user->email}}</p>
-->
 <h3>Dear {{$user->name}} </h3>
 <!--<h4>Pending Id   : {{$user->id}}</h4>
 <h4>Pending Pass : {{$user->password2}}</h4>-->
<p>I'm pleased to inform you that the first step of your registration with Nazalwi Business College was successful.

You now need to activate your account so that we can confirm that your email address is valid.</p>

<p>To activate your account please click the link button below:</p>

<p>After you have validated your account you will be able to pay for your Affiliate Membership, and we'll then send your final credentials to you.</p>

<p>Kind regards</p>

<p>Mohyeldein, FQA</p>
<p>NBC MembershipOfficer </p>

    <!-- END Site header -->
    <!-- Main container -->
<br>
 
<a href="{{ url('completeregister1/'.$id) }}" type="submit" value="" style="background-color:green;color:#FFF;heigh:20px; width:500px;font-size:25px;">
  <button style="background-color:green;color:#FFF;heigh:20px; width:500px;font-size:25px;">Click Here</button></a>
			</div>
		</div>
    <br>
    <br>


@include('includes.footer')

</body>
</html>
