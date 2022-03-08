@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')      
     <br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading " style="background-color:#DC143C;color:white;">Fees</div>
      <div class="panel-body">
   

  <div class="col-lg-4"style="background-color:#FFFAF0;color:white;">
  <div class="panel-heading " style="background-color:#DC143C;color:white;">Find Member</div>

		<form action="createfeeq" method="post" enctype="multipart/form-data">
      @csrf
        <input type="text" name="student_id" class="form-control" id="student_id" placeholder="Member ID" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
        <button style="background-color:#DC143C;color:white;" type="submit" >Find Member</button></div>
      </form>
   

     <div class="col-lg-8">
     <div class="panel-heading " style="background-color:#DC143C;color:white;">Add New Fees</div>

    <form action="insertexplainfee" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="student_id"  id="student_id" value="{{$student_id}}"  />
      <?php $subjects = DB::table('subjects')->get();
      ?>
<select name="subject_id">
  @foreach($subjects as $subj)
  <option value="{{$subj->id}}">{{$subj->name}}</option>
  @endforeach
  </select>

   <!--   <input type="text" name="subject_id" class="form-control" id="subject_id" placeholder="subject_id"   />-->
      <input type="text" name="fee" class="form-control" id="fee" placeholder="fee"   />
       
          <button style="background-color:#DC143C;color:white;" type="submit" >Insert Fee</button></div>
      </form>
      </div>
      <br>
      <div class="col-lg-12">
      <div class="panel-heading " style="background-color:#DC143C;color:white;">Member_id : {{$student_id}} Fees</div>

        <table class="table">
            <thead><tr>
            <th>ID</th><th>Member_ID</th><th>Subject_ID</th><th>Fee</th><th>Comment</th>
</tr></thead>
<tbody>        
@foreach($explain_fee as $ex)
<tr>
<?php $subject_fee = DB::table('subjects')->where('id',$ex->subject_id)->first();
$teacher = DB::table('teachers')->where('id',$subject_fee->teacher_id)->first();
?>
    <td>{{$ex->id}}</td><td>{{$ex->student_id}}</td><th>{{$subject_fee->name}}</th><th>{{$ex->fee}}</th><th>{{$teacher->name}}</th>
</tr>
        @endforeach

</tbody></table>
     </div>
          </div>

        </div>

      </div>

 						<!--	<img src='images/PEMS-Logo.png' style="float:left"/>-->
                </div>
            </div>
       </div>
 </div>     

  
</div>
@endsection