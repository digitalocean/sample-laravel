@extends('admin.layout')

@section('mycontent')
	<div class="row">
		<ul>
		@foreach($data as $d)
			<li><a href="/uc/{{$d->id}}">{{$d ->name}}</a></li>	
		@endforeach
		</ul>
	</div>
@endsection