<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
h4{
    color:00F;
}
p.a {   font-style: normal;
        font-size:18px;
        align:center;
        margin:30px;
        color:blue;
         }

p.b {   font-style: italic;
         font-size:18px;
        align:center;
        margin:30px;
        color:green;
         }

p.c {   font-style: oblique; 
        font-size:18px;
         }
</style>
</head>
 @section('PageTitle', 'NBC')

<body>

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
<img src="{{asset('public/logonbcfull2.jpg')}}" width="100% " heigh="150px">

<h2>This is Registeration Mail With Pending and Member Id</h2>

<?php
 $email = $user->email;
 $user = DB::table('users')->where('email', $email)->get();  ?>
 <br>
 @foreach($user as $users)
 <!--{{$users->id}}-->
<?php $id = $users->id;
//echo $id;
?>
 <h2> Dear :{{ $users->name}}</h2>
 <div>
<div >
 <!--Name: {{ $users->name }}<br>-->
 <p  class="a">Username:  {{ $users->name }}</p>
 <p  class="a">Member id:  {{ $users->student_id }}</p>

 <p  class="a"> Password:  {{ $users->password2 }}</p>
 </div>
 <div  >
 <p  class="b">Pendind id:  {{ $users->id }}</p>
 <p  class="b"> Password:  {{ $users->password2 }}</p>
 <br><br><br><br><br>
</div><!--
 <p  class="a">Membership: {{ $users->student_id}}</p>
 <p class="b">Name: {{ $users->name }}</p>
 <p class="c`">Email: {{$users->email}}</p>-->
    <!-- END Site header -->
    <!-- Main container -->
<br>
<!--
<a href="{{ url('completeregister/'.$id) }}" type="submit" value="" style="background-color:green;color:#FFF;heigh:20px; width:500px;font-size:25px;">Click Here To complete your registeration</a>

-->@endforeach
			</div>
		</div>
    <br>
    <br>


@include('includes.footer')

</body>
</html>
