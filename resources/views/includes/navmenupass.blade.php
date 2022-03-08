 
<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top " style="background-color:#00008B;padding15px;">
  <div class="container d-flex align-items-center">
<div class="contact-info mr-auto">
    <ul>
      <li><i class="icofont-envelope"></i><a href="info@acpaglobal.net">info@acpaglobal.net</a></li>
      <li><i class="icofont-phone"></i> 00249912327066</li>
      <li><i class="icofont-clock-time icofont-flip-horizontal"></i> <?php  echo date('Y-m-d'); ?></li>
    </ul>
  </div>
  <div class="cta">
    <a href="register2" class="scrollto">Get Started</a>
  </div>
  </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top " style="background-color:#00008B;padding15px;">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="#header" class="scrollto">
  <img src="{{asset('public/logonbcfull3.png')}}" style="width:200px; height: 150px; float :left; margin:2px; margin-right:10px; margin-top:5px; margin-bottom: -15px;  "/>

    </a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="#header" class="logo mr-auto scrollto"><img src="/public/assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav class="nav-menu d-none d-lg-block">
  <ul>
  <li><a href="/">Home</a></li>     
  <li><a href="/pass/home" > Pass </a></li>
        
<!--------------------------------LOGOUT----------------------------------------------->
          <li>
            <a class="item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
          </li>
<!--------------------------------END  LOGOUT----------------------------------------------->

<li style="float:right">
            <a href="#">
                <img src="{{asset('public/'.Auth::user()->avatar)}}" style="border-radius: 50%; width:100px; height: 100px; float :right;  margin-right:10px; margin-top:-35px;  ">
            </a>
            <!--  <li><a href="/logout">/////////////////Logout</a></li> -->
</li>
     

    </ul>
    </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= 
<section id="hero" class="d-flex justify-cntent-center align-items-center">
  <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
</div>
</section>-->

@if(Auth::user()->scholarship == 1)
<div style="float:right">
<img src="{{asset('public/scholarship.png')}}"  
style="border-radius: 50%; width:120px; height: 120px; float :right;  margin-right:-410px; margin-top:-5px;  ">
</div>
@endif
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>

<main id="main">

 
 
 
 <!-- Navigation -- >
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" >
<img src="/images/nbclogo.jpg" style="width:100px; height: 100px; float :left; margin:2px; margin-right:3px; margin-top:5px; margin-bottom: -15px;  "/>
            <!-- Brand and toggle get grouped for better mobile display -- >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
             
                </button>

 <a class="navbar-brand" href="/home" style="margin-top:25px; color:#fff;font-family: 'Amaranth', sans-serif;
font-family: 'Source Sans Pro', sans-serif; font-face:'Amaranth'">Nazlawi Bussiness College</a>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -- >
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top:30px;padding-bottom:30px; ">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <ul class="nav navbar-nav navbar-left">
       <li><a href="/pass/home" > Pass </a></li>
       <!--
       <li><a href="/profile" >Profile Settings </a></li>
            <li><a href="{!! route('changepassword') !!}" >Change Password </a></li>
            <li><a href="{!! route('profileavatar') !!}" >Profile Upload</a></li>

       <!--                    
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">MY Map <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="/map/myaccount">My Account</a></li>
            <li><a href="/address/data/{{Auth::user()->id}}">My Addresses</a></li>
            <li><a href="/map/mycertificates">My Certificates</a></li>
            <li><a href="/map/mysqcpd">My CPD</a></li>
            <li><a href="/address/editaddamail/{{Auth::user()->id}}/edit">My Email</a></li>
            <li><a href="/address/datapass/{{Auth::user()->id}}/edit">My Password</a></li>
            <li><a href="/map/myqualifications">My Qualifications</a></li>
            <li><a href="/map/myreferences">My References</a></li>

            </ul>
            </li>

        <li><a href="/pass">Sign In to PassPort</a></li>

                <!-- Right Side Of Navbar -->

                    <!-- Authentication Links -- >

        
        <li><a href="/profile">Profile</a></li>


         
<!--------------------------------LOGOUT----------------------------------------------->


         
                    <!-- Right Side Of Navbar -- >
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -- >
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                  

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                        <li></li>
                        <li></li>
        
    </ul>
    </nav>-->
