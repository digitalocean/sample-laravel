 
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
    <li><a href="/pems/journal">Journal</a></li>
    <li class="drop-down"><a href="#"> Members <b class="caret"></b></a>
    <ul>
        <li><a href="/pems/memberadmin">Member Admin</a></li>
        <li><a href="/pems/memberstatus">Member Status</a></li>
        <li><a href="/pems/pendingmembers">Pending Members</a></li>
    </ul>
    </li> 
    
      <li><a href="/pems/bulkemail">BulkEmail</a></li>
      <li class="drop-down"><a href="#"> Qualifcation <b class="caret"></b></a>
    <ul>
        <li><a href="/pems/qandalive">QandALive</a></li>
        <li><a href="/pems/qandaoffline">QandAOffline</a></li>
    </ul>
    </li>   
    <li><a href="/pems/invoicing">Invoicing</a></li>
    <li><a href="/pems/certificate">Certificate</a></li>
    <li><a href="/pems/rossusers">Admins</a></li>
    <li><a href="/pems/allresult">Results</a></li>
    <li><a href="/ross">Ross</a></li>
    <li class="drop-down"><a href="#">Lectures<b class="caret"></b></a>
    <ul>
        <li><a href="/createfee">Fees</a></li>
        <li><a href="/insertteachers">Teatchers</a></li>
        <li><a href="/insertcourse">Courses</a></li>
        <li><a href="/insertlectures">Lectures</a></li>
    </ul>
    </li>  
 
 <!--------------------------------Admin LOGOUT----------------------------------------------->
<li>
            <a class="item" href="{{ route('admin-logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
          </li>
<!--------------------------------END Amin LOGOUT----------------------------------------------->
<li style="float:right">
    <a href="#">
      <img src="{{asset('public/noimage.jpg')}}" style="border-radius: 50%; width:100px; height: 100px; float :right;  margin-right:10px; margin-top:-35px;  ">
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

<br><br><br><br><br><br>
 
<main id="main">



