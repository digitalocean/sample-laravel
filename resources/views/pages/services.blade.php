@extends('layouts.master')
@section('content')
        <h1>Services</h1>
        @if(count($services)>0)
            @foreach($services as $service)
                <li>{{$service}}</li>

            @endforeach

        @endif

@endsection
