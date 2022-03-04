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
<script type="text/javascript">
	function Click(){
		//var r=confirm("Are you sure to display the messge");
        var data=prompt("enter name:","hussien");
		if(r=true)
		document.getElementById("re").innerHTML = "welcome      " + data;
		}
</script>
<!--<button onclick="Click()">Click Me</button>-->
<p id="re"></p>
                <table style="widht:60%;font-size:14px;">
			  			<thead>
			  				<tr>
			  					<th>Member</th>
			  					<th>Name</th>
			  					<th>Relationship</th>
			  					<th>Email</th>
			  					<th>Phone</th>
			  					<th>Action</th>
			  				</tr>
                        @if(count($references) != 0)

                <?php
                $id = Auth::user()->id;
                 $references1 = DB::table('references')->where('user_id','=',$id)->get();
                ?>
                             @foreach($references1 as $ref)
			  				<tbody>
                                <td>{{Auth::user()->student_id}}</td>
			  					<td>{{ $ref->name}}</td>
			  					<td>{{ $ref->relationship}}</td>
			  					<td>{{ $ref->email}}</td>
			  					<td>{{$ref->phone}}</td>
			  					<td><a href="/myreferences/{{$ref->id}}/edit" class="btn btn-warning">Edit</a></td>
			  					<td><a href="/map/ref/{{$ref->id}}/delete" class="btn btn-danger">Delete</a></td>
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
			<div class="panel-heading">Add Refence</div>
		  <div class="panel-body">
        <?php echo 'THIS IS PHP TEXT';  ?>
            <div class="panel-heading">Refences</div>
            <form action="/map/myreferences" method="POST" role="search">
                    {{ csrf_field() }}
                   <!-- <input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">-->

					<div class="form-grounp">
					<label for="relationship">Relationship </label>
                    <select class="form-control" name="relationship">
                     <option value="Employer">Employer</option>
                     <option value="Client">Client</option>
                     <option value="Business Partner">Business Partner</option>
                     <option value="eacher / Lecturer / Trainer">Teacher / Lecturer / Trainer</option>
                     </select>
                      <span class="input-group-btn">
                    </div>
                    <div class="form-grounp">
                    <label for="name">Name </label>
                    <input class="form-control" name="name" type="text" value="">
                    </div>

					<div class="form-grounp">
                    <label for="address">Address </label>
                    <input name="address" class="form-control" type="text" value="" placeholder="address">
                    </div>

                    <div class="form-grounp">
                    <label for="phone">Phone </label>
                    <input name="phone" type="text" class="form-control" value="" placeholder="phone">
                    </div>
                    <div class="form-grounp">
                    <label for="email">Email </label>
                    <input name="email" type="text"  class="form-control" value="" placeholder="email">
                    </div>



					<div class="form-grounp">

					<input name="process" type="hidden" value="memberdetails">
					<input class="btn btn-success" type="submit" value="Add Refrence">
					</div>
				</form>
 
		  </div>
		</div>
	</div>
</div>

                    </div>
              </div>
            </div>
        </div>

@endsection



