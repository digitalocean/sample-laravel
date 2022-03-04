@extends('layouts.master')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')
<form action="selectattemp" method="post">
@csrf
<input type="text" name="attempno" value="">
<input type="submit" value="Select Attemp">

@endsection