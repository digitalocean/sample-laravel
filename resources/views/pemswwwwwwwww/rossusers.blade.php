@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
       
       
<div class="container">
    <div class="row">
     	<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Add User</div>
		 		<div class="panel-body">
		 		<form method="POST" action="http://acpaglobal.net/pems/addadmin" accept-charset="UTF-8">
				 @csrf
		 		<div class="form-group">
   					<input name="process" type="hidden" value="add">
   					<label for="username">Username</label>
   					<input class="form-control" name="username" type="text" value="" id="username">
   				</div>
   				<div class="form-group">
   					<label for="email">Email</label>
   					<input class="form-control" name="email" type="email" value="" id="email">
   				</div>
   				<div cass="form-group">
   					<label for="password">Password</label>
   					<input class="form-control" name="password" type="password" value="" id="password">
   				</div>
   				<div class="form-group">
   				<input class="btn btn-primary" type="submit" value="Add">
   				</div>
   					</form>

                </div>
   					
            </div>
       </div>





       <div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Users</div>
		 		<div class="panel-body">

		 				 		<table class="table">
		 			<tr>
		 				<th>Username</th>
		 				<th>Email</th>
		 				<th>Password</th>
		 				<th>Delete</th>
		 			</tr>
		 			
		 			 
		 			 
					 @foreach($admins as $admin)
		 			<tr>
		 				<td>{{$admin->student_id}}</td><td>{{$admin->email}}</td><td>{{$admin->password2}}</td>
		 				<td>
		 					<form method="POST" action="/pems/deleteadmin" >
							 @csrf
		 					<input name="process" type="hidden" value="delete">
		 					<input name="id" type="hidden" value="{{$admin->id}}">
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