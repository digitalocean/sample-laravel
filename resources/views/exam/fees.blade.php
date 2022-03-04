
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
   

  <div class="col-lg-8"style="background-color:#FFFAF0;color:white;">
		<form action="createfeeq" method="post" enctype="multipart/form-data">
      @csrf
        <input type="text" name="student_id" class="form-control" id="student_id" placeholder="Member ID" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
         <button style="background-color:#DC143C;color:white;" type="submit" >Find Member</button></div>
      </form>
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