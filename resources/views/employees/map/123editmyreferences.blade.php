@extends('layouts.mastermap')
@section('content')

<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>  </h4>
                    </div>
                    <div class="panel-body">
                    <div style="width:100%">
<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">Refences</div>

		  <div class="panel-body">
<table class="table">
			  			<thead>
			  				<tr>
			  					<th>Member</th>
			  					<th>Reference ID</th>
			  					<th>Date</th>
			  					<th>Name</th>
			  					<th>$ Amount</th>
			  					<th>Action</th>
			  				</tr>
                        @if(count($references) != 0)
                             @foreach($references as $ref)
			  				<tbody>

                                <td>{{Auth::user()->id}}</td>
			  					<td>{{ $ref->id}}</td>
			  					<td>{{ $ref->created_at}}</td>
			  					<td>{{ $ref->name}}</td>
			  					<td>+249-{{$ref->phone}}</td>
			  					<td><a href="/map/myreferences/{{$ref->id}}/edit" class="btn btn-default">Edit</a></td>
			  				</tbody>
                              @endforeach
			  			</thead>
			  		</table>
@else

		  	<h4>No Refrences</h4>
 @endif

		  </div>
		</div>
	</div>
    <!------------------------------------------------------->

<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">Update Refence</div>
		  <div class="panel-body">
             <div class="panel-heading">Refences</div>
            {!! Form::open(['action' => ['MapController@updateRef',$references->id], 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
             <div class="form-group">
             {{Form::label('relationship', 'Relationship')}}<br>
            {!! Form::select('relationship', array('Employer' => 'Employer', 'Client' => 'Client', 'Business Partner ' => 'Business Partner ', 'Teacher / Lecturer / Trainer' => 'Teacher / Lecturer / Trainer', 'Friend / Family' => 'Friend / Family', 'Other' => 'Other'), 'S'); !!}</div>
             <div class="form-group">
             {{Form::label('name', 'Name')}}<br>
                {{Form::text('name', $references->name, ['class' => 'from-control', 'placeholder' => 'Name','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('address', 'Address')}}<br>
                {{Form::text('address', '', ['class' => 'from-control', 'placeholder' => 'Address','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('phone', 'Phone')}}<br>
                {{Form::text('phone', '', ['class' => 'from-control', 'placeholder' => 'Phone','required'=>'required'])}}
             </div>
             <div class="form-group">
             {{Form::label('email', 'Email')}}<br>
                {{Form::text('email', '', ['class' => 'from-control', 'placeholder' => 'Email','required'=>'required'])}}
             </div>
             {{Form::hidden('_method','PUT')}}
             {{Form::submit('Update Refrence', ['class' => 'btn btn-success'])}}
             {!! Form::close() !!}
		  </div>
		</div>
	</div>
</div>

                    </div>
              </div>
            </div>
        </div>

@endsection



