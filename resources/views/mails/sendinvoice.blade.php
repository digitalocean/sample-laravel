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
<div style="float:left">
<br>
        Name:  {{$user->name}}<br>
        <p>Invoice Date & Tax Point :{{$user->created_at}}</p>
        <p>Invoice Number: {{$inv->id}}</p>
        <p>Member Number: {{$user->student_id}}</p>
 </div>
 <div style="float:right"><a href="http://acpaglobal.net/invoice/{{$inv_id}}"> 
 <img src="{{asset('public/pdf1.jpg')}}"><br>Download PDF
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
     <th  id="nbc2">{{$inv->id}}</th>
     <th  id="nbc2">{{$inv->amount}} $</th>
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
     
     
     	</div>
		</div>
    <br>
    <br>


@include('includes.footer')

</body>
</html>
