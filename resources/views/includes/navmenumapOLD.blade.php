<body>
<!-- Navigation -->
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container"> <img src="/images/nbclogo.jpg" style="width:100px; height: 100px; float :left; margin:2px; margin-right:10px; margin-top:5px; margin-bottom: -15px;  "/>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="/home" style="margin-top:25px; color:#fff;font-family: 'Amaranth', sans-serif;
font-family: 'Source Sans Pro', sans-serif; font-face:'Amaranth'">Nazlawi Bussiness College</a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"  style="margin-top:30px;padding-bottom:30px; margin-left:100px;">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/map">Home</a></li>



    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Map <b class="caret"></b></a>
         <ul class="dropdown-menu">
                <li><a href="/map/myaccount">My Account</a></li>
                <li><a href="/address/data/{{Auth::user()->id}}">My Addresses</a></li>
                <li><a href="/map/mycertificates">My Certificates</a></li>
                <li><a href="/map/mysqcpd">My CPD</a></li>
                <li><a href="/map/myemail">My Email</a></li>
                <li><a href="/address/datapass/{{Auth::user()->id}}/edit">My Password</a></li>
                <li><a href="/map/myqualifications">My Qualifications</a></li>
                <li><a href="/map/myreferences">My References</a></li>

             </ul>
                    </li>





                                              <li><a href="/pass">Sign In to PassPort</a></li>

                    <!-- Right Side Of Navbar -->

                        <!-- Authentication Links -->
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


<li>

                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li>
                                <!-- <a href="#">
                                    {/{ Auth::user()->name }} <span class="caret">
                <img src="/img/{{Auth::user()->avatar}}" style="border-radius: 50%; width:100px; height: 100px; float :right;  margin-right:10px; margin-top:-35px;  ">
                                </a>
                            </li> -->
                        @endguest

                                           <!--  <li><a href="/logout">/////////////////Logout</a></li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

