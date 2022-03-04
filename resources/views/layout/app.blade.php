<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is the Description for Homepage">
    <meta name="keywords" content="Keyword1, Keyword2, Keyword3, Keyword4, Keyword5, Keyword6">

    <title>NIC</title>
    <!-- Styles -->
    <link href="assets/css/main.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link href="assets/css/bootstrap-grid.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700" rel="stylesheet" type="text/css">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.ico">
  </head>
  <body class="smart-nav">
    <!-- Navigation bar -->
    <nav class="navbar">
      <div class="container">
        <!-- Logo -->
        <div class="pull-left">
      <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>
          <div class="logo-wrapper">
          <a class="logo" href="/"><h4>Laravel.app</h4></a>
          <a class="logo-alt" href="/"><h3>Laravel.app</h3></a>
          </div>
        </div>

    </head>
    <body>
        @include('inc.navbar')
            <div class="container">
                @include('inc.messages')
                @yield('content')

            </div>
