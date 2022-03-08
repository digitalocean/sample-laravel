@extends('layouts.masterpems')
@section('PageTitle', 'NBC Nazlawi Business College')
@section('Description',('This is Home Page Description'))
@section('content')  
<h1 align="center">Upload video </h1>
     <form action="uploadfile"  method="post">
        @csrf
            <input type="file" name="video">
            <input type="submit" class="btn btn-success" value="Upload Video">
     </form>

@endsection