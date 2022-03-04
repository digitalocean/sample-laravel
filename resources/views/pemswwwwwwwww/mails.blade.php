@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')
<h3>Mails</h3>
<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Mails Home Page  </h4>
                    </div>
                    <div class="panel-body">
                    <div class="row">
	<div class="col-lg-10">
		<div class="panel panel-default">

					<div class="panel-heading"><strong>Welcome {{Auth::user()->student_id}} : {{Auth::user()->name}} </strong></div>
					<div class="panel-body">
            <p>
             
                        </div>
		</div>
	</div>

 

    </div>
    </div>
    </div>
    </div>

@endsection


 