@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
       
        
     
<div class="container">
  <div class="col-lg-12">
	<div class="panel panel-default">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Pending Members</div>
					<div class="panel-body">
							
							<table class="table">
							<tr>
							<th></th>
								<th>PK</th>
								<th>FirstName</th>
								<th>LastName</th>
								<th>Email</th>
								<th>Password</th>
								<th>Status</th>
								<th>Date</th>
								<th>Country</th>
							</tr>
							@foreach($pendeingusers as $puser)
							<tr>
									<th><form method="POST" action="/pems/deletependingmembers" accept-charset="UTF-8">
									@csrf
									<input name="userid" type="hidden" value="{{$puser->id}}">	
									<input name="id" type="hidden" value="{{$puser->id}}">
									<input class="btn btn-danger" type="submit" value="Delete">
									</form></th>
								<td>{{$puser->id}}</td>
								<td>{{$puser->firstname}}</td>
								<td>{{$puser->lastname}}</td>
								<td>{{$puser->email}}</td>
								<td>{{$puser->password2}}</td>
								<td>{{$puser->type}}</td>
								<td>{{$puser->created_at}}</td>
								<td>{{$puser->country}}</td>

							</tr>
							@endforeach
						</table>
					</div>

				</div>

			</div>
	</div>	





		<div class="row">
			     	<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">Pro Forma Invoices</div>
							<div class="panel-body" style="max-height: 300px;overflow-y: scroll;">
												
									<table class="table">
									<tr>
									
									<th></th>
										<th>PK</th>
										<th>RegID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Country</th>
										<th>Inv No</th>
										<th>Gross</th>
										<th>Net	Date</th>
										<th>Status</th>
									</tr>
									@foreach($invoices as $invoice)
									<?php 
									$student_id  = $invoice->student_id;
									$puser = DB::table('users')->where('student_id',$student_id )->first(); 
									$cpuser = DB::table('users')->where('student_id',$student_id )->count(); 
									if(	$cpuser < 1 ){
										$puser = DB::table('users')->where('student_id',10002)->first(); 

/*
										$puser->student_id =0;
										$puser->name =0;
										$puser->email =0;
										$puser->country =0;*/
									}
									?>
									<tr>
									<th>  
									<form method="POST" action="/pems/deleteinvoice" accept-charset="UTF-8">

									<input name="id" type="hidden" value="{{$invoice->id}}">
									<input class="btn btn-danger" type="submit" value="Delete">
									</form>
									</th>
									<th>{{$invoice->id}}  </th>

									<td>{{$puser->student_id}}</td>

									<th>{{$invoice->student_id}}  </th>
									<td>{{$puser->name}}</td>
									<td>{{$puser->email}}</td>
									<td>{{$puser->country}}</td>
									<th>{{$invoice->student_id}}  </th>
									<th>{{$invoice->student_id}}  </th>
									<th>{{$invoice->created_at}}  </th>
									<th>{{$invoice->paied}}  </th>


									
							</tr>
							@endforeach
						
										
										
									
									</table>
							</div>

						</div>

					</div>
		</div>				
	</div>
</div> <!-- end of 12 -->
				


				


  
</div>
                             
 @endsection