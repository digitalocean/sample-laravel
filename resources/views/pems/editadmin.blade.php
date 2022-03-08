@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
       
       
<div class="container">
    <div class="row">
     	<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Admin</div>
		 		<div class="panel-body">
		 		<form method="POST" action="/pems/posteditadmin" accept-charset="UTF-8">
				 @csrf
		 		<div class="form-group">
				 <input name="process" type="hidden" value="add">
				 <input name="id" type="hidden" value="{{$admin->id}}">
   					<label for="name">Name</label>
   					<input class="form-control" name="name" type="text" value="{{$admin->name}}" id="name">
   				</div>
   				<div class="form-group">
   					<label for="email">Email</label>
   					<input class="form-control" name="email" type="email" value="{{$admin->email}}" id="email">
   				</div>
   				<div cass="form-group">
   					<label for="password">Password</label>
   					<input class="form-control" name="password" type="password" value="{{$admin->password2}}" id="password">
   				</div>
   				<div class="form-group">
   				<input class="btn btn-primary" type="submit" value="Edit">
   				</div>
   					</form>

                </div>
   					
            </div>
       </div>





       <div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">Admins</div>
		 		<div class="panel-body">

				 <table class="table">
		 			<tr>
 		 				<th>Name</th>
		 				<th>Password</th>
						 <th>Edit</th>
		 				<th>Delete</th>
		 			</tr> 	 
					 @foreach($admins as $admin)
		 			<tr>
		 				 <td>{{$admin->name}}</td><td>{{$admin->password2}}</td>
		 				<td>
						 <form method="POST" action="/pems/editadmin" >
							 @csrf
		 					<input name="process" type="hidden" value="edit">
		 					<input name="id" type="hidden" value="{{$admin->id}}">
		 					<input class="btn btn-danger" type="submit" value="Edit">
		 					</form>		 				
							</td> <td>
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