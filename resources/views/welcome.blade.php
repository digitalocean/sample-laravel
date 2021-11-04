@extends('app')

@section('header')
    <!-- Header section -->
    <header class="header-section clearfix">
        <div class="container-fluid">
            <a href="" class="site-logo">
                <img src="img/logo.png" alt="">
            </a>
            <div class="responsive-bar"><i class="fa fa-bars"></i></div>
            <a href="" class="site-btn">Launch App</a>
            <nav class="main-menu">
                <ul class="menu-list">
                    <li><a href="">About</a></li>
                    <li><a href="">Tokenomics</a></li>
                    <li><a href="">Roadmap</a></li>
                    <li><a href="">Socials</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Header section end -->
@endsection

@section('content')
    <!-- Hero section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hero-text">
                    <h2>Invest in <span>Bitcoin</span> <br>Bitcoin Trading</h2>
                    <h4>Use modern progressive technologies of Bitcoin to earn money</h4>
                </div>
                <div class="col-md-6">
                    <img src="img/laptop.png" class="laptop-image" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->


    <!-- About section -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6 about-text">
                    <h2>What is Bitcoin</h2>
                    <h5>Bitcoin is an innovative payment network and a new kind of money.</h5>
                    <p>Bitcoin is one of the most important inventions in all of human history. For the first time ever, anyone can send or receive any amount of money with anyone else, anywhere on the planet, conveniently and without restriction. It’s the dawn of a better, more free world.</p>				</div>
            </div>
            <div class="about-img">
                <img src="img/about-img.png" alt="">
            </div>
        </div>
    </section>
    <!-- About section end -->


    <!-- Features section -->
    <section class="features-section spad gradient-bg">
        <div class="container text-white">
            <div class="section-title text-center">
                <h2>Our Features</h2>
                <p>Bitcoin is the simplest way to exchange money at very low cost.</p>
            </div>
            <div class="row">
                <!-- feature -->
                <div class="col-md-6 col-lg-4 feature">
                    <i class="ti-mobile"></i>
                    <div class="feature-content">
                        <h4>Mobile Apps</h4>
                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                        <a href="" class="readmore">Readmore</a>
                    </div>
                </div>
                <!-- feature -->
                <div class="col-md-6 col-lg-4 feature">
                    <i class="ti-shield"></i>
                    <div class="feature-content">
                        <h4>Safe & Secure</h4>
                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                        <a href="" class="readmore">Readmore</a>
                    </div>
                </div>
                <!-- feature -->
                <div class="col-md-6 col-lg-4 feature">
                    <i class="ti-wallet"></i>
                    <div class="feature-content">
                        <h4>Wallet</h4>
                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                        <a href="" class="readmore">Readmore</a>
                    </div>
                </div>
                <!-- feature -->
                <div class="col-md-6 col-lg-4 feature">
                    <i class="ti-headphone-alt"></i>
                    <div class="feature-content">
                        <h4>Experts Support</h4>
                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                        <a href="" class="readmore">Readmore</a>
                    </div>
                </div>
                <!-- feature -->
                <div class="col-md-6 col-lg-4 feature">
                    <i class="ti-reload"></i>
                    <div class="feature-content">
                        <h4>Instant Exchange</h4>
                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                        <a href="" class="readmore">Readmore</a>
                    </div>
                </div>
                <!-- feature -->
                <div class="col-md-6 col-lg-4 feature">
                    <i class="ti-panel"></i>
                    <div class="feature-content">
                        <h4>Recuring Buys</h4>
                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                        <a href="" class="readmore">Readmore</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features section end -->


    <!-- Process section -->
    <section class="process-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h2>Get Started With Bitcoin</h2>
                <p>Start learning about Bitcoin with interactive tutorials. It’s fun, easy, and takes only a few minutes! </p>
            </div>
            <div class="row">
                <div class="col-md-4 process">
                    <div class="process-step">
                        <figure class="process-icon">
                            <img src="img/process-icons/1.png" alt="#">
                        </figure>
                        <h4>Create Your Wallet</h4>
                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
                <div class="col-md-4 process">
                    <div class="process-step">
                        <figure class="process-icon">
                            <img src="img/process-icons/2.png" alt="#">
                        </figure>
                        <h4>Create Your Wallet</h4>
                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
                <div class="col-md-4 process">
                    <div class="process-step">
                        <figure class="process-icon">
                            <img src="img/process-icons/3.png" alt="#">
                        </figure>
                        <h4>Create Your Wallet</h4>
                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Process section end -->


    <!-- Fact section -->
    <section class="fact-section gradient-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="fact">
                        <h2>60</h2>
                        <p>Support <br> Countries</p>
                        <i class="ti-basketball"></i>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="fact">
                        <h2>12K</h2>
                        <p>Transactions  <br> per hour</p>
                        <i class="ti-panel"></i>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="fact">
                        <h2>5B</h2>
                        <p>Largest <br> Transactions</p>
                        <i class="ti-stats-up"></i>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="fact">
                        <h2>240</h2>
                        <p>Years <br> of Experience</p>
                        <i class="ti-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fact section end -->

@endsection

@section('footer')
    <footer class="footer-section">
        <div class="container">
            <div class="row spad">
                <div class="col-md-6 col-lg-3 footer-widget">
                    <img src="img/logo.png" class="mb-4" alt="">
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese mollit anim id est laborum.</p>
                </div>
                <div class="col-md-6 col-lg-2 offset-lg-1 footer-widget">
                    <h5 class="widget-title">Resources</h5>
                    <ul>
                        <li><a href="#">How to Buy Coin</a></li>
                        <li><a href="#">Coin Overview</a></li>
                        <li><a href="#">Blog News</a></li>
                        <li><a href="#">How to Sell Coin</a></li>
                        <li><a href="#">Purchase Theme</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-2 offset-lg-1 footer-widget">
                    <h5 class="widget-title">Quick Links</h5>
                    <ul>
                        <li><a href="#">Network Stats</a></li>
                        <li><a href="#">Block Explorers</a></li>
                        <li><a href="#">Governance</a></li>
                        <li><a href="#">Exchange Markets</a></li>
                        <li><a href="#">Get Theme</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 footer-widget pl-lg-5 pl-3">
                    <h5 class="widget-title">Follow Us</h5>
                    <div class="social">
                        <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="" class="google"><i class="fa fa-google-plus"></i></a>
                        <a href="" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-8 text-center text-lg-right">
                        <ul class="footer-nav">
                            <li><a href="">DPA</a></li>
                            <li><a href="">Terms of Use</a></li>
                            <li><a href="">Privacy Policy </a></li>
                            <li><a href="">support@company.com</a></li>
                            <li><a href="">(123) 456-7890</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
