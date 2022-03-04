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
                    <div>
<h2>My Email:</h2>

	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Available Certificates</div>
			<div class="panel-body">
				<form method="POST" action="/map/myemail" accept-charset="UTF-8">
					@csrf				
					<div class="form-group">
						<label for="oldemail">Current Email:</label>
						<input class="form-control" disabled="disabled" name="oldemail" type="text" value="{{Auth::user()->email}}">

					</div>
					<div class="form-group">
						<label for="email">New Email:</label>
						<input class="form-control" required="required" name="email" type="email" value="" id="email">

					</div>
					<div class="form-group">

						<input class="btn btn-default" type="submit" value="Change Email">

					</div>

				</form>
			</div>
		</div>
	</div>


                    </div>
                </div>


            </div>
        </div>

@endsection



