
<body>
<style>
   </style>
<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top " style="background-color:#00008B;padding15px !important;">
  <div class="container d-flex align-items-center" style="background-color:#00008B;padding15px !important;">
<div class="contact-info mr-auto">
    <ul style="background-color:#00008B ;padding15px ;">
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
<header id="header" class="fixed-top " style="background-color:#00008B;padding:15px;">
  <div class="container d-flex align-items-center" style="background-color:#00008B;padding15px !important;">

    <h1 class="logo mr-auto"><a href="#header" class="scrollto">
  <img src="{{asset('public/logonbcfull3.png')}}" style="width:200px; height: 150px; float :left; margin:2px; margin-right:10px; margin-top:5px; margin-bottom: -15px;  "/>

    </a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="#header" class="logo mr-auto scrollto"><img src="/public/assets/img/logo.png" alt="" class="img-fluid"></a>-->

<nav class="nav-menu d-none d-lg-block" >
  <ul>
      <li ><a href="/">Home</a></li>
      <li class="drop-down"><a href="#">About NBC <!--<b class="caret">--></b></a>
        <ul>
        <li><a href="/about-nbc">About NBC</a></li>
        <li><a href="/chairman">chairman</a></li>
       </ul>
      </li>  
      <li><a href="/bscnbc">BSC NBC</a></li>
      <li class="drop-down"><a href="#"> Membership </a>
        <ul>
          <li><a href="/overview_and_fees">Overview</a></li>
          <li><a href="/prospectus">Prospectus</a></li>
          <li><a href="/login">Members Sign In (MAP)</a></li>
           <li><a href='/pendinglogin'>Pending Member Sign In</a></li>
       </ul>
      </li> 
      <li class="drop-down"><a href="#"> Qualifications</a>
        <ul>
          <li><a href="/qualifications_overview">Overview</a></li>
          <li><a href="/fundamentallevel">Fundamental Level</a></li>
          <li><a href="/advancedlevel">Advanced Level</a></li>
          <li><a href="/professionallevel">Professional Level</a></li>
          <li><a href="/strategiclevel">Strategic Level</a></li>
          <li><a href="/projectmanagment">Project Managment</a></li>
          <li><a href="/informationtechnology">Information Technology </a></li>
       </ul>
      </li> 
      <li><a href="/register2">Register</a></li>
      <li class="drop-down"><a href="#"> Resources <!--<b class="caret">--></b></a>
        <ul>
           <li><a href="/bookstore">BookStore</a></li>
          <li><a href="/ross/login">ROSS login</a></li>
          <li><a href="http://wikipedia.org">Get Wiki Info</a></li>
       </ul>
      </li> 
      
      <li><a href="/contact">Contacts</a></li>

    </ul>
    </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= 
<section id="hero" class="d-flex justify-cntent-center align-items-center">
  <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
</div>
</section>-->
<br><br><br><br> 
<main id="main">

@guest
<div style="background-color:#f00;

position: fixed;
margin-top:400px;
margin-left:-3px;
padding:5px;
font-size;10pt;
border-radius: 7px;"><a href="/register2" style="color:#fff;
font-weight: bold;">Register NOW</a>
</div>
@endguest   
