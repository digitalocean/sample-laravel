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
<!-- Page preloader -->
<div id="preloader">
    <div class="loader"></div>
</div>
<header class="header-section clearfix">
    <div class="container-fluid">
        <a href="{{ url('/') }}" class="site-logo">
            <img src="img/logo.png" alt="">
        </a>
        <div class="responsive-bar"><i class="fa fa-bars"></i></div>
    </div>
</header>
@yield('content')

@include('scripts')
</body>

