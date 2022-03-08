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

 <!-- Site header 
 <table style="border:none"><h1>
   <tr style="border:none">

   <div style="float:right; font-size:11px;border:none"><b>Nazlawi Business College</b></div><br>
   <div style="float:right; font-size:11px;"><b>Kafori, Bahry, Khartoumm, SUDAN </b></div><br>
   <a href="http://acpaglobal.net/" style="float:right; font-size:11px;"><b>http://acpaglobal.net</b></a>
<td style="background-color:red;color:white;width:160;font-size:130px;border:none">NBC<td>
<td style="background-color:white;color:red;font-size:50px;family-font:arial; vertical-align: bottom;border:none">Nazlawi Business College</td>
</tr>
</table>-->
<img src="{{asset('public/logonbcfull2.jpg')}}" width="100% " heigh="150px">

 <h4> Dear :{{ Auth::user()->name}}</h4>

 <h1>Email for some data</h1>
 <p  class="a">Membership: {{ Auth::user()->student_id}}</p>
 <p class="b">Name: {{  Auth::user()->name}}</p>
 <p class="c`">Email: {{  Auth::user()->email}}</p>
    <!-- END Site header -->
    <!-- Main container -->
<br>
<?php
$i = 1;
$id = Auth::user()->id;
echo $id.'<br>';
$userscount = DB::table('users')->count();//users counts
$refcount = DB::table('ref_result')->count();//count res_results
//echo 'Users Accounts: '.$userscount.'<br>';
//echo 'Exams Accounts: '.$refcount.'<br>';

$maxid = DB::table('users')->max('student_id');//Max members_id
echo '<h3>Maximum Member _id: '.$maxid.'</h3>';
$exams = DB::table('ref_result')->where('student_id','=',$id)->get();
//echo $exams;
?>
<!--<embed src="{ { asset('cv1_28.pdf') }}" width="600" height="500" alt="pdf" />-->
<?php
$nextWeek = time() + (7 * 24 * 60 * 60);
                   // 7 days; 24 hours; 60 mins; 60 secs
echo 'Now:       '. date('Y-m-d') ."\n";
echo 'Next Week: '. date('Y-m-d', $nextWeek) ."\n";
// or using strtotime():
echo '<br>Next Week: '. date('Y-m-d', strtotime('+1 week')) ."\n";
echo '<br>Next Year: '. date('Y-m-d', strtotime('+1 year')) ."\n";

//$date = '2010-09-16';
$date = Auth::user()->created_at;//'2010-09-16';
echo '<br>Expire Date : '.date('Y-m-d', strtotime("+12 months $date"));
?>

<?php
/*
$tested_date = strtotime('2017-04-09');
$tested_date1 = strtotime('2018-04-09');
$tested_date2 = strtotime('2019-04-09');
echo '<h2>Test Date 0: '.$tested_date.'</h2>';
$diff1 = $tested_date1 - $tested_date;
echo '<br> Diff01 = '.$diff1.'<br>';
echo '<h2>Test Date 1 - Test Date 0: '.$tested_date1 .'  |||||||  '.  $tested_date.'</h2>';
echo '<h2>Test Date 1: '.$tested_date1.'</h2>';
echo '<h2>Test Date 2: '.$tested_date2.'</h2>';
$diff2 = $tested_date2 - $tested_date1;
echo '<br><h3> Diff02 = '.$diff2.'</h3><br>';
$registered_date = strtotime(Auth::user()->created_at); //--> which results to 1332866820
echo '<h1>'.date('Y-m-d H:i:s', $registered_date).'</h1><h1>Registered Date as Number1: '.$registered_date.'</h1>';
echo '<h1>'.date('Y-m-d', $registered_date).'</h1><h1>Registered Date as Number2: '.$registered_date.'</h1>';
echo strtotime("now")-$registered_date, "\n"
;echo '<br>';
//$now_date = strtotime(now_date);
$regdae_plus_one_year = $registered_date + $diff1;

echo '<h3> Register date Plus one year : '.$regdae_plus_one_year;
echo '<h3> This time date as Number: ';
echo strtotime("now"), "\n"
//echo $now_date.'<br>';*/
/*
echo '<h3><br>•	B - Swatch Beat/Internet Time: '.idate("B") . "<br>";
echo '•	d - Day of the month'.idate("d") . "<br>";
echo '•	h - Hour (12 hour format)'.idate("h") . "<br>";
echo '•	H - Hour (24 hour format)'.idate("H") . "<br>";
echo '•	i - Minutes'.idate("i") . "<br>";
echo '•	I - returns 1 if DST (daylight saving time) is activated, 0 otherwise'.idate("I") . "<br>";
echo '•	L - returns 1 for leap year, 0 otherwise'.idate("L") . "<br>";
echo '•	m - Month number'.idate("m") . "<br>";
echo '•	s - Seconds'.idate("s") . "<br>";
echo '•	t - Days in current month'.idate("t") . "<br>";
echo '•	U - Seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)'.idate("U") . "<br>";
echo '•	w - Day of the week (Sunday=0)'.idate("w") . "<br>";
echo '•	W - ISO-8601 week number of year (week starts on Monday)'.idate("W") . "<br>";
echo '•	y - Year (1 or 2 digits)'.idate("y") . "<br>";
echo '•	Y - Year (4 digits)'.idate("Y") . "<br>";
echo '•	z - Day of the year'.idate("z") . "<br>";
echo '•	Z - Timezone offset in seconds'.idate("Z") . "</h3><br>";*/
?>
<!--<embed src="{ { asset('cv1_28.pdf') }}" width="600" height="500" alt="pdf" />-->

<!--<img src="data:image/png;base64,{ {base64_encode(file_get_contents(resource_path('img/email/logo.png')))}}" alt="">-->
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
     <td>{{$exam->id}}</td>
    <td>{{$exam->examcode}}</td>
    <td>{{$exam->student_id}}</td>
    <td>{{$exam->student_id}}</td>
    <?php $i= $i+1; ?>
  </tr>
  @endforeach
</table>
<br>
<a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-warning">
<img src="{{asset('public/pdf1.jpg')}}">


        </a>
        <!--
<a href="{ { asset('cv1_28.pdf') }}" width="600" height="500" alt="pdf" />
<img src="{ { asset('pdf1.png') }}" width ="250px" height="250px" alt="pdf" /> </a>-->
<div class="panel-heading">Member Details Section</div>
			<div class="panel-body">
                <form action="/sendmail3" method="POST" role="search">
                    {{ csrf_field() }}
                        <div class="form-grounp">
                        <label for="memberid">name. </label>
                        <input type="text" class="form-control" name="name" value="ali 2020 " placeholder="name"> <span class="input-group-btn">
                    </div>
<!--					<div class="form-grounp">
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
-->
					<input class="btn btn-success" type="submit" value="Get Member">
					</div>
				</form>
			</div>
		</div>


@include('includes.footer')

</body>
</html>
