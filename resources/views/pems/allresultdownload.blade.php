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
    width:675px;
    align:center;
    padding:5px;
    margin:5px;
    }
     
     
    th{border:solid 1px;}
    td{border:solid 1px;}
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
  width:675px;
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
}#nbc3{
  width:675px;
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
</style>
</head>
 @section('PageTitle', 'NBC')

<body style="border:solid 1px;">

<img src="logonbcfull2.jpg" width="675px" heigh="150px">

<h3 align="center"><b>Result (Exam Result)</b></h3>

 <!--<div><div style="float:right;width:50%;"><p><img src="ministrylogo.jpg" width="100px" heigh="100px"></p>-->
 </div>

<div style="width:675px;">
<table  id="nbc3" width="675px" style="background-color:#DCDCDC;">
<tr><th width="60%">Exam Title: {{$exam->examtitle}}</th><td>Exam Date: {{$ref_result->created_at}}</td><th>Time: {{$exam->examtime}} min</th></tr>
<tr><th>Name: {{$member->name}}</th><th>ID: {{$member->student_id}}</th><th></th></tr>

</table>
 </div>

</div>
<br>
  
<div >
<table  id="nbc2" width="675px">
<tr>
<th width="30px">No</th><th widht="400px">Question</th><th width="70px">Answer</th><th width="30px">Degree</th><th width="10px">%</th></tr>
<?php $i =1; $tot_marks = 0;?>
@foreach($results as $res)
<?php $question = DB::table('exam_question')->where('id',$res->ques_id)->first();  ?>
<tr>
<td width="30px">{{$i}}</td><td widht="400px"><?php echo "<div width='300px'><h6>".$question->question.'</h6></div>' ?></td><?php if($res->givenmarks > 0){echo '<td style="background-color:#228B22;color:#FFFFFF;">Correct</td>';}else{echo '<td style="background-color:#B22222;color:#FFFFFF;">Wrong</td>';}  ?> <td>{{$res->givenmarks}}</td><td>{{$res->givenmarks}}%</td></tr>
<?php $i = $i+1; $tot_marks = $tot_marks + $res->givenmarks ;?>
@endforeach
<tr><th> </th><th>Total Dgree</th><th></th><th>  {{$tot_marks}}</th><th>{{$tot_marks}}% </th></tr>
</table>
</div>
 

</table>
<br> 
<div style="float:left;width:450px;">
    <p>Teachher: .............................................</p><br>
    <p>Signature: .............................................</p>

</div>
<div style="float:right;width:250px;">
  <img src="{{$member->avatar}}" width="120px" heigh="120%">
</div>
</body>
</html>
