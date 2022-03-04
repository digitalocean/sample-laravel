@extends('layouts.master')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')

<br>

	
<div class="container">
<script>
///alert('Hi from Java Script');
</script>
<!-- Marketing Icons Section -->
<div class="row">
	<div class="col-lg-12">

		 <div class="panel panel-default">
			<div class="panel-heading">
				<h4>MAP Home Page  </h4>
			</div>
			<div class="panel-body">
			<div class="row">
<div class="col-lg-8">
<div class="panel panel-default">

			<div class="panel-heading"><strong>All Payments </strong></div>
			<div class="panel-body">
 @foreach($allpayment as $pay)
	<a href="payment/{{$pay->id}}"> <p>{{$pay->id}} User ID{{$pay->student_id}}</p></a>
@endforeach
				</div>
</div>
</div>


<div class="col-lg-4">
<img src="{{ asset('images/WorldMap.jpg') }}"/>
<div style="padding:10px; background-color: #5280c7; border-radius: 5px; width:280px; margin-top:15px; color:#fff;">

"You are the point of origin for
everything in your world:<br/>
You set the standard for yourself." <br/>
(Steve Maraboli) 1975−
</div>
</div>
</div>

</div>
</div>
</div>
</div>



@endsection
