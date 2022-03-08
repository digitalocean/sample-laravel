@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')
<h3>Certificates</h3>

<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-16">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Certificates Home Page  </h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">

					<div class="panel-heading"><strong>Welcome  {{Auth::user()->student_id}} : {{Auth::user()->name}}</strong></div>
					<div class="panel-body">
<!--------------------------------------------------------------------------------------------------------------------------->
                    <form action="/findcertificates" method="POST" role="search">
                    {{ csrf_field() }}
					<div class="form-grounp">
					<label for="memberid">Enter the Member ID below, or select from the list. </label>
                    <input type="text" class="form-control" name="q"
                     placeholder="Search users"> <span class="input-group-btn">
                     			</div>
					<div class="form-grounp">
					<input name="process" type="hidden" value="memberdetails">
					<input class="btn btn-success" type="submit" value="Get Member">
					<a href='/pems/certificates' class='btn btn-default'>Clear Member Details</a>
					</div>
				</form>
<!--------------------------------------------------------------------------------------------------------------------------->

                        </div>
		</div>
	</div>


    </div>

    </div>
    </div>
    </div>
    </div>

@endsection


 