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
 
<img src="{{asset('public/logonbcfull2.jpg')}}" width="100% " heigh="150px">

  <div>
  
   <br>
   
   

  <h3>Dear {{$user->name}} </h3>

I'm pleased to inform you that your email activation with Nazlawi Bussiness College was successful.
Below are your Pending Member Sign In credentials, which you can use to complete the registration process:

<p>Your Login information:</p>
<p>Name: {{$user->name}}</p>

<p>PendingID:  {{$user->id}}</p>
<p>Password: {{$user->password2}}</p>
<br>
 <p>To complete the registration process please click the link button below, which will take you to the Pending Member Sign In Page:
Or you can navigate to the page using this link: https://acpaglobal.net/pendinglogin</p>
<br>

<p>Kind regards</p>

<p>Mohyeldein, FQA</p>
 <p>NBC MembershiOfficer (CLICK THE BUTTON BUT PLEASE DO NOT REPLY TO THIS EMAIL)</p>

    <!-- END Site header -->
    <!-- Main container -->
<br>
 
<a href="{{ url('/pendinglogin') }}" type="submit" value="" style="background-color:green;color:#FFF;heigh:20px; width:500px;font-size:25px;">
  <button style="background-color:green;color:#FFF;heigh:20px; width:500px;font-size:25px;">Click Here to Login</button></a>
			</div>
		</div>
    <br>
    <br>


@include('includes.footer')

</body>
</html>
