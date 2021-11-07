<!DOCTYPE html>
<html lang="en">
<head>
    <title>DogeGames</title>
    <meta charset="UTF-8">
    <meta name="description" content="Cryptocurrency Landing Page Template">
    <meta name="keywords" content="cryptocurrency, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('styles')
</head>

<body>
<!-- Page Preloader -->
<div id="preloader">
    <div class="loader"></div>
</div>
@include('header')

@yield('content')

@include('footer')

@include('scripts')
</body>

