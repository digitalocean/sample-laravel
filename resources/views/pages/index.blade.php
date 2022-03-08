
<?php  
  $comments = DB::table('comments')->where('online', 1)->get(); 
?>
<!DOCTYPE html>
<html lang="en"
xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml"> 
>

<head>
  <meta charset="utf-8">
  <meta property="og:image" content="https://www.telotrovo.it/wp-content/uploads/2016/02/siteimage.jpg">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="200">
<meta property="og:image:height" content="200">


  <meta property="og:title" content="Site Title" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://my.website.com" />
<meta property="og:image:url" content="http://my.website.com/images/thumb.png" />
<meta property="og:description" content="Site description" />


  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>The Global College For Professional Accountants - NBC</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">




  <!-- Favicons -->
  <link href="{{asset('/public/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('/public/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('/public/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/public/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('/public/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('/public/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('/public/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('/public/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('/public/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('/public/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('/public/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Anyar - v2.1.0
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
 
  <style>
.panel-heading {
  color : #00008B;padding:5px;margin-bottom:5px;border:1px solid #0000CD;
  height: 50px;
  background-color: blue; /* For browsers that do not support gradients */
  background-image: linear-gradient(45deg, #E0FFFF, #00BFFF); /* Standard syntax (must be last) */
}
  .grade1	{background-color:#0000CD;color:white;padding:5px;margin-bottom:5px;border:1px solid #0000CD;}
    .panel-title{color:#fff;padding:5px;border:1px solid #0000CD;}
    .panel-body{border:1px solid #0000CD;padding:15px;}
    .col-lg-12{border:1px solid #0000CD;padding:15px;}
    .col-lg-8{border:1px solid #DCDCDC;padding:15px;}
    .col-lg-6{border:1px solid #DCDCDC;padding:15px;}
    .col-lg-4{border:1px solid #DCDCDC;padding:15px;}
    
  </style>


<!--------------Prevent CoPyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy-->
<script type="text/JavaScript">
//courtesy of BoogieJack.com
function killCopy(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function ("return false")
if (window.sidebar){
document.onmousedown=killCopy
document.onclick=reEnable
}
</script>
<!--------------Prevent CoPyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy-->

</head>
  
<script>/*
    document.write("<h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br><em>Hello world, again!</em></h2>");
    document.write("<p>This document was last modified on "
        + document.lastModified + ".</p>");*/
  </script>
  
  <script>/*
    var username = prompt("Enter your name: ", "");
    if (confirm("Your name is " + username)) {
       document.write("<h1>Hello, " + username + "!</h1>");
    } else {
       document.write("<h1>Hello, world!</h1>");
    }*/
  </script>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center" style="font-size:20px !important;">

      <h1 class="logo mr-auto"><a href="#header" class="scrollto">
	  <img src="{{asset('public/logonbcfull3.png')}}" style="width:200px; height: 150px; float :left; margin:2px; margin-right:10px; margin-top:5px; margin-bottom: -15px;  "/>

		  </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="#header" class="logo mr-auto scrollto"><img src="{{asset('/public/assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
	  <ul>
        <li><a href="/">Home</a></li>
        <li class="drop-down"><a href="#">About NBC <b class="caret"></b></a>
          <ul>
          <li><a href="/about-nbc">About NBC</a></li>
          <li><a href="/chairman">chairman</a></li>
         </ul>
        </li>  
        <li><a href="/bscnbc">BSC NBC</a></li>
        <li class="drop-down"><a href="#"> Membership <b class="caret"></b></a>
          <ul>
            <li><a href="/overview_and_fees">Overview</a></li>
            <li><a href="/prospectus">Prospectus</a></li>
            <li><a href="/login">Members Sign In (MAP)</a></li>
             <li><a href='/pendinglogin'>Pending Member Sign In</a></li>
         </ul>
        </li> 
        <li class="drop-down"><a href="#"> Qualifications <b class="caret"></b></a>
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
        <li class="drop-down"><a href="#"> Resources <b class="caret"></b></a>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active"   >
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">

 

<div align="right" style="background-color:#f00;
  text-align: center;


position: fixed;
padding:5px;
margin-top:375px;
font-size;10pt;
border-radius: 7px;"><a href="/announcement" style="color:#fff;
font-weight: bold;">Announcement 
<h4>Sudanese Association of Certified Accountants ( SACA)</h4></a>

</div>

 

          <img  width="100%" src="{{asset('public/assets/slide/slide-1.jpg')}}">
          </h2>
           <!--  <h2 style="margin-top:-200px;">The Global College For Professional Accountants</h2>
         <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>-->
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown"> 
          

<div align="right" style="background-color:#f00;
  text-align: center;


position: fixed;
padding:5px;
margin-top:375px;
font-size;10pt;
border-radius: 7px;"><a href="/announcement" style="color:#fff;
font-weight: bold;">Announcement 
<h4>Sudanese Association of Certified Accountants ( SACA)</h4></a>

</div>         
          <img  width="100%" src="{{asset('public/assets/slide/slide-2.jpg')}}">
</h2>
           <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

<!-- Slide 3 -->
<div class="carousel-item">
  <div class="carousel-container">
    <h2 class="animate__animated animate__fadeInDown">          
    

<div align="right" style="background-color:#f00;
  text-align: center;


position: fixed;
padding:5px;
margin-top:375px;
font-size;10pt;
border-radius: 7px;"><a href="/announcement" style="color:#fff;
font-weight: bold;">Announcement 
<h4>Sudanese Association of Certified Accountants ( SACA)</h4></a>

</div>
    <img  width="100%" src="{{asset('public/assets/slide/slide-3.jpg')}}">
</h2>
     <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
  </div>
</div>

<!-- Slide 4 -->
<div class="carousel-item">
  <div class="carousel-container">
    <h2 class="animate__animated animate__fadeInDown">      
    

<div align="right" style="background-color:#f00;
  text-align: center;


position: fixed;
padding:5px;
margin-top:375px;
font-size;10pt;
border-radius: 7px;"><a href="/announcement" style="color:#fff;
font-weight: bold;">Announcement 
<h4>Sudanese Association of Certified Accountants ( SACA)</h4></a>

</div>
        <img  width="100%" src="{{asset('public/assets/slide/slide-4.jpg')}}">
</h2>
     <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
  </div>
</div>

<!-- Slide 5 -->
<div class="carousel-item">
  <div class="carousel-container">
    <h2 class="animate__animated animate__fadeInDown">          <img  width="100%" src="{{asset('public/assets/slide/slide-5.jpg')}}">
</h2>
     <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
  </div>
</div>

<!-- Slide 6 -->
<div class="carousel-item">
  <div class="carousel-container">
    <h2 class="animate__animated animate__fadeInDown">          <img  width="100%" src="{{asset('public/assets/slide/slide-6.jpg')}}">
</h2>
     <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
  </div>
</div>

<!-- Slide 7 -->
<div class="carousel-item">
  <div class="carousel-container">
    <h2 class="animate__animated animate__fadeInDown">          <img  width="100%" src="{{asset('public/assets/slide/slide-7.jpg')}}">
</h2>
     <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
  </div>
</div>

<!-- Slide 8 -->
<div class="carousel-item">
  <div class="carousel-container">
    <h2 class="animate__animated animate__fadeInDown">          <img  width="100%" src="{{asset('public/assets/slide/slide-8.jpg')}}">
</h2>
     <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
  </div>
</div>

<!-- Slide 9 -->
<div class="carousel-item">
  <div class="carousel-container">
    <h2 class="animate__animated animate__fadeInDown">          <img  width="100%" src="{{asset('public/assets/slide/slide-9.jpg')}}">
</h2>
     <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
  </div>
</div>


      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->	







  <main id="main">

    <!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">GAT</a></h4>
              <p class="description">Qualifications in this group provide a number of Core Essential Skills that are ideally .</p>
              <a href="/fundamentallevel" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>

            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">AAT</a></h4>
              <p class="description">
              Qualifications in this group provide a number of Core Essential Skills that you can add to those you have gained at Fundamental Level. </p>
              <a href="/advancedlevel" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">ACPA</a></h4>
              <p class="description">The Project Accountant – is regarded as a Fully Academically Qualified Professional Accountant specialising in.</p>
              <a href="/professionallevel" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4 class="title"><a href="">ACCEA</a></h4>
              <p class="description">Level of Professional Academic Qualifications for Corporate Accountants  

          </p>
          <a href="/professionallevel" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>

        </div>
      </div>

      </div>
    </section><!-- End Icon Boxes Section -->



 


    <!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">FCPA</a></h4>
              <p class="description">The Advanced  Project Accountant –- is regarded as a Fully Academically Qualified Professional Accountant  . </p>
              <a href="/strategiclevel" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> 
              </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">FCCEA</a></h4>
                <p class="description">The Advanced  Corporate Accountant –- is regarded as a Fully Academically Qualified Professional Accountant specialising in all aspects of Project and Programme  . </p>
                <a href="/strategiclevel" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>

         </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">CPM</a></h4>
              <p class="description">Project Management is about the efficient and successful control of change within an organization.  </p>
              <a href="/projectmanagment" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4 class="title"><a href="">CIT</a></h4>
              <p class="description">The Certificate in Information Technology is designed to provide Accountants and Project Professionals with a solid understanding of the technology that forms the foundation of all modern organizations. .  </p>
              <a href="/informationtechnology" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
          </div>

        </div>

      </div>
    </section><!-- End Icon Boxes Section -->

  <!-- ======= Top Bar ======= -- >
  <div id="topbar" class="d-none d-lg-flex align-items-center  ">
    <div class="container d-flex align-items-center">
	<div class="contact-info mr-auto">
      <ul>
        <li><i class="icofont-envelope"></i><a href="info@acpaglobal.net">info@acpaglobal.net</a></li>
        <li><i class="icofont-phone"></i> 00249912327066</li>
        <li><i class="icofont-clock-time icofont-flip-horizontal"></i><!-- hitwebcounter Code START -- >
          <a href="https://www.hitwebcounter.com" target="_blank">
          <img src="https://hitwebcounter.com/counter/counter.php?page=7650057&style=0006&nbdigits=7&type=page&initCount=781001" title="Free Stats for webpages" Alt="hitwebcounter"   border="0" >
          </a>    <?php // echo date('Y-m-d'); ?></li>
      </ul>
    </div>
    <div class="cta">
    <form action="/checkmembership" method="post">
@csrf
<input name="id" style="background-color:#FF8C00; 
 border-radius: 3px;" placeholder="Member ID" >
<input type="submit"  class="scrollto" style="background-color:#FF8C00; 
 border-radius: 3px;"  value="Chick Youe Professional Membership Status">

</form>
      <a href="register2" class="scrollto">Get Started</a>
    </div>
    </div>
  </div>-->





    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <p>Nazlawi Business College® is a modern and progressive Qualification Awarding College & Professional Membership Organization devoted to Specialist Accountants world-wide. Our Membership is comprised of professionals from a broad spectrum of industries, organizations, and academia. Although vastly diverse in our cultures we all share one thing in common: the desire to achieve the very best we can through; vision, determination, and focused dedication.</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
            <form action="/checkmembership" method="post">
@csrf
<input name="id" style="background-color:#FF8C00; 
 border-radius: 3px;" placeholder="Member ID" >
<input type="submit"  class="scrollto" style="background-color:#FF8C00; 
 border-radius: 3px;"  value="Chick Youe Professional Membership Status">

</form>
            </p>
         <!--   <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>-->
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
           <!-- <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>-->
            <a href="/about-nbc" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Clients Section ======= -- >
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="owl-carousel clients-carousel">
          <img src="{{asset('/public/assets/img/clients/client-1.png')}}" alt="">
          <img src="{{asset('/public/assets/img/clients/client-2.png')}}" alt="">
          <img src="{{asset('/public/assets/img/clients/client-3.png')}}" alt="">
          <img src="{{asset('/public/assets/img/clients/client-4.png')}}" alt="">
          <img src="{{asset('/public/assets/img/clients/client-5.png')}}" alt="">
          <img src="{{asset('/public/assets/img/clients/client-6.png')}}" alt="">
          <img src="{{asset('/public/assets/img/clients/client-7.png')}}" alt="">
          <img src="{{asset('/public/assets/img/clients/client-8.png')}}" alt="">
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -- >
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <i class="icofont-computer"></i>
              <h4><a href="#">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <i class="icofont-chart-bar-graph"></i>
              <h4><a href="#">Dolor Sitema</a></h4>
              <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <i class="icofont-image"></i>
              <h4><a href="#">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <i class="icofont-settings"></i>
              <h4><a href="#">Nemo Enim</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <i class="icofont-earth"></i>
              <h4><a href="#">Magni Dolore</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <i class="icofont-tasks-alt"></i>
              <h4><a href="#">Eiusmod Tempor</a></h4>
              <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -- >
    <section id="cta" class="cta">
      <div class="container">

        <div class="row" data-aos="zoom-in">
          <div class="col-lg-9 text-center text-lg-left">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfoio Section ======= -- >
    <section id="portfolio" class="portfoio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfoio</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{asset('/public/assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="{{asset('/public/assets/img/portfolio/portfolio-1.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{asset('/public/assets/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="{{asset('/public/assets/img/portfolio/portfolio-2.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{asset('/public/assets/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="{{asset('/public/assets/img/portfolio/portfolio-3.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{asset('/public/assets/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <a href="{{asset('/public/assets/img/portfolio/portfolio-4.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{asset('/public/assets/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <a href="{{asset('/public/assets/img/portfolio/portfolio-5.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{asset('/public/assets/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <a href="{{asset('/public/assets/img/portfolio/portfolio-6.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{asset('/public/assets/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <a href="{{asset('/public/assets/img/portfolio/portfolio-7.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{asset('/public/assets/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <a href="{{asset('/public/assets/img/portfolio/portfolio-8.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{asset('/public/assets/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="{{asset('/public/assets/img/portfolio/portfolio-9.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfoio Section -->

    <!-- ======= Team Section ======= -- >
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset('/public/assets/img/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset('/public/assets/img/team/team-2.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="300">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset('/public/assets/img/team/team-3.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="fade-up" data-aos-delay="400">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset('/public/assets/img/team/team-4.jpg')}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -- >
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <span class="advanced">Advanced</span>
              <h3>Ultimate</h3>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -- >
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <div class="row">

<div class="col-lg-4">
	<div class="panel panel-primary ">
			   <div class="panel-heading">BSC Academy</div>
	 <div class="panel-body">
	 <p style=" text-align: justify; padding-bottom:5px;">
		 NBC - Nazlawi Business College is a modern and progressive Qualification Awarding College devoted to Specialist Accountants in Sudan approved by Sudan Ministry of higher education, to offer Bachelor degree for specialist Accountants in Project Accountancy and Corporate Accountancy.

		</p>
		 <div class="panel-group" id="accordion">
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="color:#337ab7; font-weight: bold; font-size: 12px;">
				 Bachelor Degree in Project Accounting</a>
			   </h4>
			 </div>
			 <div id="collapse1" class="panel-collapse collapse">
			   <div class="panel-body">
				   <p style="text-align: justify;">

					   In order for an organization to ensure that it has sound Project Governance in place it needs to have highly-skilled people available who understand; Governance, Corporate Management, and Project Management. Nazlawi Business College provides the learning environment to enable students to become skilled in the subjects that are required to perform effectively as Project Governors. We provide a structured set of modules that enable you to progress your learning through the spectrum of topics that are required to gain our Bachelor Degree in Project Accounting, which will enable you to become a Senior Member of your organization.
				   </p>


			   </div>
			 </div>
		   </div>
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="color:#337ab7; font-weight: bold; font-size: 12px;">
				 Bachelor Degree in Corporate Accounting</a>
			   </h4>
			 </div>
			 <div id="collapse2" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">

						Implementing and maintaining an effective Corporate Governance framework - in any organization - requires highly-skilled people who understand; Governance, Corporate Management, and the peculiarities of the organization itself. Nazlawi Business College provides the environment to enable students to become skilled in the subjects that are required to perform effectively as Corporate Governors. We provide a structured set of modules that enable you to progress your learning through the spectrum of topics that are required to gain our Bachelor Degree in Corporate Accounting, enabling you to add value as a Senior Member of your organization.
					   </p>
			   </div>
			 </div>
		   </div>
		   
		 </div>
	 </div>

 </div>

</div>

<div class="col-lg-4">
	<div class="panel panel-primary ">
			   <div class="panel-heading">Professional Academic Qualifications</div>
	 <div class="panel-body">
		 <p>NBC is Sudan Ministry of Higher Education Recognized Qualification Awarding College devoted to Specialist Accountants world-wide. Our current regulated qualification offerings are:

		 <div class="panel-group" id="accordion1">
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion1" href="#collapse3" style="color:#337ab7; font-weight: bold; font-size: 12px;">
				 Strategic Level for Project Accounting</a>
			   </h4>
			 </div>
			 <div id="collapse3" class="panel-collapse collapse">
			   <div class="panel-body">
				   <p style="text-align: justify;">

					   The Strategic Level for Project Accounting Qualifications will help you to advance your career, as a Certificate in Project Accounting, to the strategic level, and become advanced in Project Accounting. <br/>
				 Qualifications at this Level include; Strategic Management, Corporate Financial Strategy, and Business Information Management. <br/>
				 Each of these qualifications are guaranteed to be accepted by Nazlawi Business College® as valid supporting evidence when you apply to upgrade your Professional Level to Strategic Level. In conjunction with the Fundimantal Level, Advanced and Professional Qualifications they carry a significant proportion of the Core Essential Skills required to be successfully registered as an Advanced in Project or Accounting.

				   </p>


			   </div>
			 </div>
		   </div>
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion1" href="#collapse4" style="color:#337ab7; font-weight: bold; font-size: 12px;">
				 Strategic Level for Corporate Accounting</a>
			   </h4>
			 </div>
			 <div id="collapse4" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">
				 The Strategic Level for Corporate Accounting Qualifications will help you to advance your career, as a Certificate in Corporate Accounting, to the strategic level, and become advanced in Corporate Accounting. <br/>
				 Qualifications at this Level include; Strategic Management, Corporate Financial Strategy, and Business Information Management.  <br/>
				 Each of these qualifications are guaranteed to be accepted by Nazlawi Business College® as valid supporting evidence when you apply to upgrade your Professional Level to Strategic Level. In conjunction with the Fundimantal Level, Advanced and Professional Qualifications they carry a significant proportion of the Core Essential Skills required to be successfully registered as an Advanced in Corporate or Accounting.

					   </p>
			   </div>
			 </div>
		   </div>
		   







		   <!-- thid -->
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion1" href="#collapse5" style="color:#337ab7; font-weight: bold; font-size: 12px;">
				 Professional Level for Project Accounting</a>
			   </h4>
			 </div>
			 <div id="collapse5" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">
				 The level of Professional for Project Accounting Qualifications will help to prepare you to become a Certificate in Project Accounting. Qualifications at this Level include; Advanced Accountancy, Project & Programme Accountancy, Project Finance, Quantitive Methods in Project Management. <br/>
Each of these qualifications are guaranteed to be accepted by Nazlawi Business College ® as valid supporting evidence when you apply to Professional level. In conjunction with the Fundamental Level and advanced Level Qualifications they carry a significant proportion of the Core Essential Skills required to be Professional Accountant in Project Accounting.


					   </p>
			   </div>
			 </div>
		   </div>





		   <!--foruth-->
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion1" href="#collapse6" style="color:#337ab7; font-weight: bold; font-size: 12px;">
				Professional Level for Corporate Accounting </a>
			   </h4>
			 </div>
			 <div id="collapse6" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">
				 The level of Professional for Corporate Accounting Qualifications will help to prepare you to become a Certificate in Corporate Accounting. Qualifications at this Level include; Advanced Accountancy, , Advanced Management Accounting, Decision Making Management, and Risk & Control Management. <br/>
			 Each of these qualifications are guaranteed to be accepted by Nazlawi Business College ® as valid supporting evidence when you apply to Professional level. In conjunction with the Fundamental Level and advanced Level Qualifications they carry a significant proportion of the Core Essential Skills required to be Professional Accountant in Corporate Accounting.


					   </p>
			   </div>
			 </div>
		   </div>





		   <!--fifth-->
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion1" href="#collapse7" style="color:#337ab7; font-weight: bold; font-size: 12px;">
				Advanced Level </a>
			   </h4>
			 </div>
			 <div id="collapse7" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">
			 The Level of Advanced  Qualifications  Certificate in Advanced Technical Accounting will help to prepare you to become  regarded as a more senior Accounting Technician and you will be further qualified in Business Law, Information Technology, Audit, and Taxation. <br/>
Each of these qualifications are guaranteed to be accepted by Nazlawi Business College ® as valid supporting evidence when you apply to Professional Level. In conjunction with the Fundamental Level Qualifications they also carry a significant proportion of the Core Essential Skills required to become a Certificate in Advanced Technical.


					   </p>
			   </div>
			 </div>
		   </div>




		   <!--sixth -->
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion1" href="#collapse8" style="color:#337ab7; font-weight: bold; font-size: 12px; text-align: center">
				 Fundamental Level </a>
			   </h4>
			 </div>
			 <div id="collapse8" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">
				 The Fundamental Level Certificate in Technical Accounting Qualifications will help to prepare you to become regarded as competently qualified to manage a set of accounting books up to and including Trial Balance. The qualifications include; Financial Accounting, Management Accounting, Economics, and Business Maths. <br/>
				 Each of these qualifications are guaranteed to be accepted by Nazlawi Business College ® as valid supporting evidence when you apply to Professional Level. They also carry a significant proportion of the Core Essential Skills required to become a Technical Accountant.


					   </p>
			   </div>
			 </div>
		   </div>

		 </div>
		 </p>
	 </div>

 </div>

</div>








<div class="col-lg-4">
	<div class="panel panel-primary ">
			   <div class="panel-heading">Professional Membership Qualifications</div>
	 <div class="panel-body">
		 <p>Nazlawi Business College is a modern and progressive Professional Membership College devoted to Specialist Accountants world-wide. Our Professional Membership Qualifications are:

		 <div class="panel-group" id="accordion2">
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion2" href="#collapse10" style="color:#337ab7; font-weight: bold; font-size: 12px;">
			   Fellow Certified Project Accountant FCPA</a>
			   </h4>
			 </div>
			 <div id="collapse10" class="panel-collapse collapse">
			   <div class="panel-body">
				   <p style="text-align: justify;">

					   The Fellow Certified project Accountant FCPA –- is regarded as a Fully Qualified Professional Accountant specialising in all aspects of Project and Programme Accounting and Management operating at the strategic level. They will be competently qualified to manage the financial, management, and strategic aspects of organisations of any size, and in particular of those organisations which are primarily project orientated. They may typically find themselves employed in large organisations in business critical positions normally at board level or find themselves working as senior consultants specializing in all aspects of Project Accounting and Project Management.<br/>
FCPA must have achieved a minimum combination of Learning & Experience totaling at least 15,600 Spectrum Hours before they can be awarded the " FCPA  Fellow Accountant with Nazlawi Business College ®" Professional Membership Qualification. 


				   </p>


			   </div>
			 </div>
		   </div>
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion2" href="#collapse11" style="color:#337ab7; font-weight: bold; font-size: 12px;">
			   Fellow Certified Corporate Accountant FCCEA</a>
			   </h4>
			 </div>
			 <div id="collapse11" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">
			 The Fellow Corporate Accountant FCCEA - is a Fully Qualified Professional Accountant operating at the Strategic level. They are competently qualified to manage the financial, management, and strategic aspects of organisations of any size. They may typically find themselves employed in large organisations in business critical positions normally at board level or working as partners and senior consultants specialising in all aspects of accounting and business matters.<br/>
FCCEA must have achieved a minimum combination of Learning & Experience totaling at least 15,600 Spectrum Hours before they can be awarded the " FCCEA  Fellow Accountant with Nazlawi Business College ®" Professional Membership Qualification. 


					   </p>
			   </div>
			 </div>
		   </div>
		   







		   <!-- thid -->
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion2" href="#collapse12" style="color:#337ab7; font-weight: bold; font-size: 12px;">
				Associate Certified Project Accountant ACPA</a>
			   </h4>
			 </div>
			 <div id="collapse12" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">
				 The Certified Project Accountant ACPA – is regarded as a Fully Qualified Professional Accountant specialising in all aspects of Project and Programme Accounting and Management operating at the professional level. They are competently qualified to manage the financial and management aspects of Projects and Programmes within all organisations. Although qualified to manage projects as a Project Manager will primarily be focused on the financial control and reporting of those projects. They may typically find themselves employed in large organisations in business critical positions of great importance and responsible for project portfolios. They may also find themselves as consultants specialising in Project Accounting and Project Management.<br/>
ACPA must have achieved a minimum combination of Learning & Experience totalling at least 9,600 Spectrum Hours before they can be awarded the “ACPA Associate Accountant with Nazlawi Business College “Professional Membership


					   </p>
			   </div>
			 </div>
		   </div>





		   <!--foruth-->
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion2" href="#collapse13" style="color:#337ab7; font-weight: bold; font-size: 12px;">
				Associate Certified Corporate Accountant ACCEA </a>
			   </h4>
			 </div>
			 <div id="collapse13" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">
				 The Certified Corporate Accountant, ACCEA is a Fully Qualified Professional Accountant operating at the professional level. They are competently qualified to manage the financial and management aspects of organisations of all sizes. They may typically find themselves employed in large organisations in business critical positions of great importance or working as consultants specialising in all aspects of accounting matters.<br/>
ACCEA must have achieved a minimum combination of Learning & Experience totalling at least 9,600 Spectrum Hours before they can be awarded the “ACCEA Associate Accountant with Nazlawi Business College “Professional Membership Qualification.



					   </p>
			   </div>
			 </div>
		   </div>





		   <!--fifth-->
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion2" href="#collapse14" style="color:#337ab7; font-weight: bold; font-size: 12px;">
				Advanced Accounting Technician AAT  </a>
			   </h4>
			 </div>
			 <div id="collapse14" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">
			 Advanced Accounting Technicians are regarded as fully qualified Accounting Technicians. They may typically find themselves employed in various sized organisations as experienced junior accountants, perhaps in charge of small departments, or specialising in particular reporting roles. Or, they may be self-employed book-keepers, perhaps employing other book-keepers within their business, and preparing the basic accounts for small businesses and other self-employed persons. Advanced Accounting Technicians must have achieved a minimum combination of Learning & Experience totalling at least 6,400 Spectrum Hours before they can be awarded the "AAT Advanced Accounting Technician with Nazlawi Business College” Professional Membership Qualification.

					   </p>
			   </div>
			 </div>
		   </div>




		   <!--sixth -->
		   <div class="panel panel-default">
			 <div class="panel-heading">
			   <h4 class="panel-title" style="text-align: center;">
				 <a data-toggle="collapse" data-parent="#accordion2" href="#collapse15" style="color:#337ab7; font-weight: bold; font-size: 12px; text-align: center">
			   Graduate Accounting Technician GAT</a>
			   </h4>
			 </div>
			 <div id="collapse15" class="panel-collapse collapse">
			   <div class="panel-body">

					   <p style="text-align: justify;">
				 The Graduate Accounting Technician is the Fundamental grade of professional membership. Graduate Accounting Technicians will typically be regarded as competently qualified to manage a set of accounting books up to and including Trial Balance. They may well be employed in various sized organisations as junior accountants, and find themselves in charge of small sections of accounting clerks in medium to large companies. Graduate Accounting Technicians must have achieved a minimum combination of Learning & Experience totalling at least 3,200 Spectrum Hours before they can be awarded the "GAT Graduate Accounting Technician with Nazlawi Business College" Professional Membership Qualification.

					   </p>
			   </div>
			 </div>
		   </div>

		 </div>
		 </p>
	 </div>

 </div>

</div>
</div>
  
	
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container-fluid">
      
        <div class="row">
 <a href="/login">
          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url(/public/assets/img/why-us.jpg);' data-aos="fade-right">
           </a>
            
            <!-- class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"-->
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch" data-aos="fade-left">

            <div class="content">
              <h3>Online <strong>Cources </strong></h3>
              <p>
              <h3> <strong> ACPA-ACCEA </strong>cources avilable online</h3>
  
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li data-aos="fade-up" data-aos-delay="100">
                  <a data-toggle="collapse" class="collapse" href="#accordion-list-1"><span>01</span> Part One <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-parent=".accordion-list">
                <a href="/login">  <p> <b>Section 1</b> <p> <b>Section 2</b> <p> <b>Section 3</b> <p> <b>Section 4</b>
                     </p></a>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                  <a data-toggle="collapse" href="#accordion-list-2" class="collapsed"><span>02</span> Part Two <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-parent=".accordion-list">
                <a href="/login">  <p> <b>Section 1</b> <p> <b>Section 2</b> <p> <b>Section 3</b> <p> <b>Section 4</b>
                     </p></a>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="300">
                  <a data-toggle="collapse" href="#accordion-list-3" class="collapsed"><span>03</span> Part Three<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-parent=".accordion-list">
                <a href="/login">  <p> <b>Section 1</b> <p> <b>Section 2</b> <p> <b>Section 3</b> <p> <b>Section 4</b>
                     </p></a>
                  </div>
                </li>


                <li data-aos="fade-up" data-aos-delay="300">
                  <a data-toggle="collapse" href="#accordion-list-3" class="collapsed"><span>04</span> Part Four<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-parent=".accordion-list">
                <a href="/login">  <p> <b>Section 1</b> <p> <b>Section 2</b> <p> <b>Section 3</b> <p> <b>Section 4</b>
                     </p></a>
                  </div>
                </li>


                <li data-aos="fade-up" data-aos-delay="300">
                  <a data-toggle="collapse" href="#accordion-list-3" class="collapsed"><span>05</span> Part Five<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-parent=".accordion-list">
                <a href="/login">  <p> <b>Section 1</b> <p> <b>Section 2</b> <p> <b>Section 3</b> <p> <b>Section 4</b>
                     </p></a>
                  </div>
                </li>

              </ul>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->
    <section id="contact" class="contact">

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact Us</h2>
      </div>

      <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

        <div class="col-lg-5">
          <div class="info">
            <div class="address">
              <i class="icofont-google-map"></i>
              <h4>Location:</h4>
              <p>Administration Office</p>
              <p>Khartoum – Bahari</p>
              <p>Kafori 4</p>




            </div>

            <div class="email">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>info@acpaglobal.net</p>
            </div>

            <div class="phone">
              <i class="icofont-phone"></i>
              <h4>Call:</h4>
              <p> 00249912327066 – 00249912193963 - 00249123291111 </p>
            </div>

          </div>

        </div>

  <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">
        <form action="/sendcomment"  >
          @csrf
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"  required>
               </div>
              <div class="col-md-6 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
               </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required  />
             </div>
            <div class="form-group">
            <textarea class="form-control" name="message" rows="5" required></textarea>
             </div><br>
 
             <div class="text-center">              
              <input type="submit" class="btn btn-warning" value="Send Message"   />
          </div>
          </form>
  <table class="table">
      <thead>
        <tr>
          <th><h3>Comments </h3>
          </th>
        <tr>
      </thead>
      @foreach($comments as $comment)
        <tr>
          <td>
          {{$comment->name}}:  {{$comment->subject}} : <p> {{$comment->message}}</p> : <p style="color:green"> {{$comment->answer}}</p>
          </td>
        <tr>
        @endforeach
      <tbody>
      </tbody>
    </table>
        </div>
      </div>
      <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">
      <div class="col-lg-12">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d262.0063950220409!2d32.5707199209066!3d15.648890805185095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sar!2s!4v1596715032417!5m2!1sar!2s" width="1090" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
           </div>
          </div>
        </div>
  </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
     <!-- <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Anyar</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>-->
	<div class="container">
      <div class="copyright">
        <!--&copy; Copyright <strong><span>NBC</span></strong>. All Rights Reserved-->
      </div>
      <div class="credits">
      <center>
            <div>
            info@acpaglobal.net<br/>
            All rights reserved and Copyright &copy; is exclusively owned by Nazlawi Business College
            <Br/>
                <a href="copyright">Copyright</a>
                |
                <a href="termsandconditions">Terms and Conditions</a>


            </div>
            <p style="font-size:8px;" class="text-muted"><a href="http://sirelkhatim.unaux.com">Powered By sirelkhatim.unaux.com</a></p>

             </center>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('/public/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.j')}}s"></script>
  <script src="{{asset('/public/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('/public/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('/public/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('/public/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('/public/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('/public/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('/public/assets/js/main.js')}}"></script>

</body>

</html>

 