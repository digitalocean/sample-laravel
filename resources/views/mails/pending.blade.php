@extends('layouts.master')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')

@section('content')




<div class="container">


<h2>Pending Page</h2>
	<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading">Member Details Section</div>
			<div class="panel-body">
            <div class="card-header">Welcome {{$user->name}}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in as pending member you must visit your email to complete your registeration form<br><br>
        <h1 style="color:red">Look at your email to regiter your self? </h1>
                </div>
            </div>
        </div>


  
        <div class="col-md-9">
            <div class="card">

                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
