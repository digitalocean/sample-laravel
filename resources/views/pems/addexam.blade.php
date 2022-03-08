@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
       
       
<div class="container">
    <div class="row">
     	<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Add Exam</div>
		 		<div class="panel-body">
		 		<form method="POST" action="/postaddexam" accept-charset="UTF-8">
				 @csrf
		 		<div class="form-group">
   					<input name="process" type="hidden" value="add">
   					<label for="examcode">ID</label>
   					<input class="form-control" name="examcode" type="text" value="" id="name">
   				</div>
   				<div class="form-group">
   					<label for="realcode">Exam Code</label>
   					<input class="form-control" name="realcode" type="text" value="" id="realcode">
   				</div>
   				<div class="form-group">
   					<label for="realcode">Exam Title</label>
   					<input class="form-control" name="examtitle" type="text" value="" id="realcode">
   				</div>
   				 
   				<div class="form-group">
   				<input class="btn btn-primary" type="submit" value="Add Exam">
   				</div>
   					</form>

                </div>
   					
            </div>
       </div>





       <div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Exams</div>
		 		<div class="panel-body">

				<table class="table">
		 			<tr>
 		 				<th>Exam Id</th>
						  <th>Exam Code</th>
						  <th>Exam Title</th>
						 <th>Edit</th>
		 				<th>Delete</th>
		 			</tr> 	 
					 @foreach($exams as $exam)
		 			<tr>
					 <td>{{$exam->examcode}}</td><td>{{$exam->realcode}}</td><td>{{$exam->examtitle}}</td> 
		 				<td>
						 <form method="POST" action="/pems/editadmin" >
							 @csrf
		 					<input name="process" type="hidden" value="edit">
		 					<input name="id" type="hidden" value="{{$exam->examcode}}">
		 					<input class="btn btn-danger" type="submit" value="Edit">
		 					</form>		 				
							</td> <td>
							 <form method="POST" action="/pems/deleteadmin" >
							 @csrf
		 					<input name="process" type="hidden" value="delete">
		 					<input name="id" type="hidden" value="{{$exam->examcode}}">
		 					<input class="btn btn-danger" type="submit" value="Delete">
		 					</form>
		 				</td>
		 			</tr>
					@endforeach
		 			 
					</table>
				</div>
		 	</div>
		</div>
		 	

 </div>     

  
</div>
                             
 @endsection