
<body>
<style>
   </style>
<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top " style="background-color:#00008B;padding15px !important;">
  <div class="container d-flex align-items-center" style="background-color:#00008B;padding15px !important;">
<div class="contact-info mr-auto">
    <ul style="background-color:#00008B ;padding15px ;">
       <li><i class="icofont-clock-time icofont-flip-horizontal"></i> <?php  echo date('Y-m-d'); ?></li>
    </ul>
  </div>
  <div class="cta">
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
      <li ><a href="/selectexamx2">Welcome</a></li>
       

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
