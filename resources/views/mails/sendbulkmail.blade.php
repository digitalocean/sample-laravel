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
    color:#000080;
    }
     
     
    th{ 
      border:solid 1px;   
      background-color:#F5FFFA;
      padding:10px;
      margin:10px;}
    td{
      border:solid 1px;
      padding:10px;
      margin:10px;}
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
#nbc3{
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

textarea {
  
  font-family: "Times New Roman", Times, serif;
   font-size:20px;
    width: 80%;
    height: 200px;
    padding: 15px 22px;
    box-sizing: border-box;
    border: 3px solid #ccc;
    border-radius: 5px;
    background-color: gray;
    color:white;
    font-size:18px;
 }
input[type=text] {

  
  font-family: "Times New Roman", Times, serif;
  color:  #002002;
  font-size:20px;
    width: 80%;
    padding: 15px 22px;
    margin: 10px 5px;
    box-sizing: border-box;  
    background-color: gray;
    color:white;
    font-size:16px;
}
</style>
</head>
 @section('PageTitle', 'NBC')

<body style="border:solid 1px;">
<img src="{{asset('public/logonbcfull2.jpg')}}" width="100% " heigh="150px">


 
<?php
$student_id = $msg['receiptiont'];
$name = $msg['name'] ;
$email = $msg['email']  ;
$subject =  $msg['subject']  ;
$body =  $msg['body'] ;
$studebt_id =  $msg['studebt_id']  ;
$attach = $msg['pdfname'];
 
$user = DB::table('users')->where('student_id','=', $student_id)->first();  
$email = $user->email;
$memberid = $user->student_id;
    ?>
<?php $id = $user->id;
//echo $id;
?>

<div style="width:100%;">

<p> Dear :{{ $user->name}}</p> 
<p>Member Id :{{ $user->student_id}}</p>

 <br>


    </div>

 
 <br>
<br>


<div >
<table  id="nbc2" width="100%">
<tr><th>
Name: {{$name}}<br>
Email: {{$email}}<br>
Subject: {{$subject}}<br>
</th></tr>

<tr>
<th width="80%">Message</th></tr>
<tr><td>{{$body}}</td></tr>
<tr><th> <a href="{{asset('public/uploads/'.$attach)}}">  <img src="{{asset('public/pdf1.jpg')}}">

Download Pdf</a></th></tr>
</table>
</div>
 

</table>
 
</body>
</html>
