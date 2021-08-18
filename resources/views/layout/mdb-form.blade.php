<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} :: @yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>

    <style type="text/css">
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        @media (max-width: 740px) {

            html,
            body,
            header,
            .view {
                height: 1000px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {

            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331 !important;
            }
        }

        /*
        a {
            color: #fff;
        }

        a:hover {
            color: #aaa;
        }
        */


    </style>
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">

            <a class="navbar-brand" href="/">
                <strong>GasWay</strong>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Início
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <!--li class="nav-item">
                        <a class="nav-link" href="{{ url('/quemsomos') }}">Quem somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Experimente grátis</a>
                    </li-->

                </ul>


                <ul class="navbar-nav nav-flex-icons">

                    @if (Route::has('login'))
                        <!--div class="top-right links"-->
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Início</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registro</a>
                                </li>
                            @endif
                        @endauth
                        <!--/div-->
                    @endif

                    <!--li class="nav-item">
                        <a href="/" class="nav-link" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li-->
                    <!--li class="nav-item">
                        <a href="https://twitter.com/GasWayootstrap" class="nav-link" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li-->
                    <!--li class="nav-item">
                        <a href="https://github.com/mdbootstrap/bootstrap-material-design"
                            class="nav-link border border-light rounded" target="_blank">
                            <i class="fab fa-github mr-2"></i>GasWay GitHub
                        </a>
                    </li-->
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <div class="view full-page-intro" style="background-image: url('https://www.culturaprojetada.com.br/wp-content/uploads/2019/06/road-3186188_1920-980x400.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            @yield('content')
        </div>
    </div>

    <footer class="page-footer text-center font-small mt-0 wow fadeIn">

        <!--div class="pt-4">
            <a class="btn btn-outline-white" href="/" target="_blank" role="button">Baixe o APP
                <i class="fas fa-download ml-2"></i>
            </a>
            <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank"
                role="button">Start free tutorial
                <i class="fas fa-graduation-cap ml-2"></i>
            </a>
        </div-->

        <!--hr class="my-4"-->

        <div class="pb-4">
            <!--a href="https://www.facebook.com/mdbootstrap" target="_blank">
                <i class="fab fa-facebook-f mr-3"></i>
            </a>

            <a href="https://twitter.com/GasWayootstrap" target="_blank">
                <i class="fab fa-twitter mr-3"></i>
            </a>

            <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
                <i class="fab fa-youtube mr-3"></i>
            </a>

            <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
                <i class="fab fa-google-plus-g mr-3"></i>
            </a>

            <a href="https://dribbble.com/mdbootstrap" target="_blank">
                <i class="fab fa-dribbble mr-3"></i>
            </a>

            <a href="https://pinterest.com/mdbootstrap" target="_blank">
                <i class="fab fa-pinterest mr-3"></i>
            </a>

            <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
                <i class="fab fa-github mr-3"></i>
            </a>

            <a href="http://codepen.io/mdbootstrap/" target="_blank">
                <i class="fab fa-codepen mr-3"></i>
            </a-->
        </div>

        <div class="footer-copyright py-3">
            © 2021 Copyright:
            <a href="/"> GasWay </a>
        </div>

    </footer>

    <script type="text/javascript" src="/js/popper.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/mdb.min.js"></script>
    <script type="text/javascript">
        new WOW().init();
    </script>

</body>

</html>
