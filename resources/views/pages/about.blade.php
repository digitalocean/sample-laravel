@extends('layouts.master')
@section('PageTitle', 'NBC')
@section('Description',('This is Home Page Description'))
@section('content')

<br>



<h2>About</h2>

                <select class="select4" name="country" id="country">
                <option value="">Please Select</option>
                    @foreach($country_data as $country)
                <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                    @endforeach</select>

@endsection
