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



<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Change My Password:</div>
		  <div class="panel-body">
		  	<form method="POST" action="/map/mypassword" accept-charset="UTF-8">
              <input name="_token" type="hidden" value="ZM2mBbTtkKCPrMhboXs5un7EMZgchrhKepL6iPla">
		  		<div class="form-group">
		  			<label for="oldpassword">Old Password</label>
		  			<input class="form-control" required="required" name="oldpassword" type="password" value="" id="oldpassword">
		  		</div>
		  		<div class="form-group">
		  			<label for="password">Your Password</label>
		  			<input class="form-control" required="required" name="password" type="password" value="" id="password">
		  		</div>
		  		<div class="form-group">
		  			<label for="password_confirmation">Confirm Password</label>
		  			<input class="form-control" required="required" name="password_confirmation" type="password" value="" id="password_confirmation">
		  		</div>
		  		<div class="form-group">
		  			<input class="btn btn-default" type="submit" value="Save New Password">
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



