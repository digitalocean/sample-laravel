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

<img src="{{asset('public/logonbcfull2.jpg')}}" width="100% " heigh="150px">

 <h4> Dear  {{ Auth::user()->name}}</h4>

 <h1>This is Sended Email data</h1>
 <p  class="a">Membership: {{ Auth::user()->student_id}}</p>
 <p class="b">Name: {{  Auth::user()->name}}</p>
 <p class="c`">Email: {{  Auth::user()->email}}</p>
    <!-- END Site header -->
    <!-- Main container -->
<br>
<?php
$i = 1;
$id = Auth::user()->student_id;
//echo $id.'<br>';
//$userscount = DB::table('users')->count();
//$refcount = DB::table('ref_result')->count();
//echo $userscount.'<br>';
//echo $refcount.'<br>';

////$maxid = DB::table('users')->max('id');
//echo $maxid;
$exams = DB::table('ref_result')->where('student_id','=',$id)->get();
//echo $exams;
?>
 <br>
<table style="width:100%">
  <tr style="  background-color: red;color:white;">
    <th>SUbject ID</th>
    <th>Subject</th>
    <th>Score</th>
    <th>Membership</th>
  </tr>
  @foreach($exams as $exam)
   <tr>
     <td>{{$i}}</td>
     <td>{{$exam->id}}</td>
    <td>{{$exam->examcode}}</td>
    <td>{{$exam->student_id}}</td>
    <?php $i= $i+1; ?>
  </tr>
  @endforeach
</table>
<br>
<!---------------------------------------
<div class="panel-heading">Member Details Section</div>
			<div class="panel-body">
                <form action="/sendmail3" method="POST" role="search">
                    { { csrf_field() }}
					<div class="form-grounp">
					<label for="memberid">name. </label>
                    <input type="text" class="form-control" name="name" value="ali 2020 " placeholder="name"> <span class="input-group-btn">
                    </div>
					<div class="form-grounp">
					<label for="memberid">phone. </label>
                    <input type="text" class="form-control" name="phone" value="012333333 " placeholder="phone"> <span class="input-group-btn">
                    </div>
					<div class="form-grounp">
					<label for="memberid">ID. </label>
                    <input type="text" class="form-control" name="email" value="ali@ali.ali " placeholder="email"> <span class="input-group-btn">
                    </div>
					<div class="form-grounp">
					<label for="memberid">ID. </label>
                    <input type="text" class="form-control" name="checkbox" value="1 " placeholder="checkbox"> <span class="input-group-btn">
                    </div>
					<div class="form-grounp">
					<label for="memberid">ID. </label>
                    <input type="text" class="form-control" name="message" value="message message message message " placeholder="message"> <span class="input-group-btn">
                    </div>

					<input class="btn btn-success" type="submit" value="Get Member">
					</div>
				</form>
			</div>
		</div>
-->
@include('includes.footer')

</body>
</html>
