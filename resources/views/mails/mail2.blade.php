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
p.a {   font-style: normal; }

p.b {   font-style: italic;}

p.c {   font-style: oblique; }
</style>
</head>
 @section('PageTitle', 'NBC')

<body>

 <!-- Site header -->
 <table><h1>
   <tr>
<td style="background-color:red;color:white;width:140;font-size:60px;">NBC<td>
<td style="background-color:white;color:red;font-size:30px;family-font:arial">Nazlawi Business College</td>
</tr>
</table>
 <h4> Dear  { { Auth::user()->name}}</h4>

 <h1>YOUR Exam Result</h1>
 <p  class="a">Membership: { {  Auth::user()->id}}</p>
 <p class="b">Name: { {  Auth::user()->name}}</p>
 <p class="c`">Email: { {  Auth::user()->email}}</p>
    <!-- END Site header -->
    <!-- Main container -->
<br>

<table style="width:100%">
  <tr style="  background-color: red;color:white;">
    <th>SUbject ID</th>
    <th>Subject</th>
    <th>Score</th>
  </tr>
  @ foreach( $data as $key => $exam)
  <tr>
    <td>{ {$exam->id}}</td>
    <td>{ {$exam->subject_id}}</td>
    <td>{ {$exam->score}}</td>
  </tr>
@ endforeach
</table>
<br>
<div class="panel-heading">Member Details Section</div>
			<div class="panel-body">
                <form action="/sendmail" method="POST" role="search">
                    {{ csrf_field() }}
					<div class="form-grounp">
					<label for="memberid">Enter the Member ID below, or select from the list. </label>
                    <input type="text" class="form-control" name="user_id" value="{ {  Auth::user()->id}} " placeholder="user_id"> <span class="input-group-btn">
                     			</div>
					<div class="form-grounp">
					<input name="client_name" type="text" value="{ {  Auth::user()->name}}">
					<input name="email" type="text" value="ser@s.ss">
					<input class="btn btn-success" type="submit" value="Get Member">
					</div>
				</form>
			</div>
		</div>


@include('includes.footer')

</body>
</html>
