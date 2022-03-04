
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
  <li><a href="/map/home">Home</a></li>     
  <li class="drop-down"><a href="#"> MY MAP <b class="caret"></b></a>
        <ul>
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
      <li class="drop-down"><a href="#"> MY Videos <b class="caret"></b></a>
        <ul>
            <li><a href="/videos1">Part One</a></li>
            <li><a href="/videos2">Part Two</a></li>
            <li><a href="/videos3">Part Three</a></li>
            <li><a href="/videos4">Part Four</a></li>
            <li><a href="/videos5">Part Five</a></li>
        </ul>
      </li> 
     @if(Auth::user()->fee > 22) <li><a href="/pass/login">Sign In to PassPort</a></li>@endif
      <li><a href="/profile">Profile</a></li>
      
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
 
<br><br>
  
<main id="main">
