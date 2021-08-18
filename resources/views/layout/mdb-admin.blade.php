<?php
session_start();
$_SESSION['role'] = 'gerente';
$redeId = 1;

if (!isset($_SESSION['role'])) {
echo 'acesso negado';
exit();
}
switch ($_SESSION['role']) {
case 'proprietario':
$nivelCor = 'coral';
break;
case 'gerente':
$nivelCor = 'coral';
$opcoes = [
(object) [
'label' => 'Início',
'url' => '/admin',
'icon' => 'fas fa-home',
'active' => $_SERVER['REQUEST_URI'] == '/admin' ? 'active' : '',
],
(object) [
'label' => 'Abastecimentos',
'url' => '/admin/monitores',
'icon' => 'fas fa-gas-pump',
'active' => $_SERVER['REQUEST_URI'] == '/admin/monitores' ? 'active' : '',
],
/*
(object) [
'label' => 'Dados cadastrais',
'url' => "/admin/rede/$redeId",
'icon' => 'fas fa-building',
'active' => $_SERVER['REQUEST_URI'] == "/admin/rede/$redeId" ? 'active' : '',
],
*/
(object) [
'label' => 'Empresas',
'url' => '/admin/empresas',
'icon' => 'fas fa-building',
'active' => $_SERVER['REQUEST_URI'] == '/admin/empresas' ? 'active' : '',
],
(object) [
'label' => 'Mapa de Bombas',
'url' => '/admin/bombas',
'icon' => 'fas fa-map',
'active' => $_SERVER['REQUEST_URI'] == '/admin/bombas' ? 'active' : '',
],
(object) [
'label' => 'Dispositivos',
'url' => '/admin/dispositivos',
'icon' => 'fas fa-mobile',
'active' => $_SERVER['REQUEST_URI'] == '/admin/dispositivos' ? 'active' : '',
],

(object) [
'label' => 'Usuários',
'url' => '/admin/usuarios',
'icon' => 'fas fa-users',
'active' => $_SERVER['REQUEST_URI'] == '/admin/usuarios' ? 'active' : '',
],
];
break;
case 'operador':
$nivelCor = 'coral';
break;
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} :: Painel</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="/dashboard/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dashboard/css/mdb.min.css">
    <link rel="stylesheet" href="/dashboard/css/style.css">
    <style>
        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

        /*
        table td {
            font-size: 1.2rem !important;
            font-weight: normal !important;
        }
        */
        table td {
            font-size: 0.9rem !important;
            font-weight: 300 !important;
        }

        .btn-primary,
        .list-group-item.active {
            z-index: 2;
            color: #fff !important;
            background-color: #042444 !important;
            border-color: #042444 !important;
        }

        .blue-text,
        a {
            color: #064585 !important;
        }

        .btn.btn-sm {
            padding: .5rem .5rem;
            font-size: .64rem;
        }

    </style>
</head>

<body class="grey lighten-3">

    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <a class="navbar-brand waves-effect" href="/admin">
                    <strong class="blue-text">{{ env('APP_NAME') }}</strong>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item {{ $_SERVER['REQUEST_URI'] == '/admin' ? 'active' : '' }}">
                            <!--- active -->
                            <a class="nav-link waves-effect" href="/admin">Abastecimentos
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <!--li class="nav-item">
                            <a class="nav-link waves-effect" href="/sobre"
                                >Sobre {{ env('APP_NAME') }}</a>
                        </li-->
                        <li class="nav-item {{ $_SERVER['REQUEST_URI'] == '/admin/docs' ? 'active' : '' }}">
                            <a class="nav-link waves-effect" href="/admin/docs">Documentação</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav nav-flex-icons">
                        <!--li class="nav-item">
                            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect"
                                >
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" >
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li-->


                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ 'login' }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ 'register' }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"
                                    class="nav-link dropdown-toggle border border-light rounded waves-effect" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ 'logout' }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt mr-2"></i> {{ __('messages.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest


                    </ul>

                </div>

            </div>
        </nav>

        <div class="sidebar-fixed position-fixed" style="background-color:{{ $nivelCor }}">

            <a class="logo-wrapper waves-effect p-2" style="width:100%; text-align:center">
                <img src="/img/favicon.png" class="img-fluid" alt="">
            </a>

            <div class="list-group list-group-flush">

                @foreach ($opcoes as $opcao)
                    <a href="{{ $opcao->url }}"
                        class="list-group-item {{ $opcao->active }} list-group-item-action waves-effect">
                        <i class="{{ $opcao->icon }} mr-3"></i>{{ $opcao->label }}
                    </a>
                @endforeach
            </div>

        </div>

    </header>

    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <div class="card mb-4 wow fadeIn">
                <div class="card-body d-sm-flex justify-content-between">
                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="/admin">Painel Administrativo</a>
                        <span>/</span>
                        <span>@yield('title')</span>
                    </h4>
                    <!--form class="d-flex justify-content-center">
                        <input type="search" placeholder="Buscar" aria-label="Search" class="form-control">
                        <button class="btn btn-primary btn-sm my-0 p" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form-->
                </div>
            </div>

            @yield('content')

    </main>

    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

        <!--div class="pt-4">
            <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
                 role="button">Download
                MDB
                <i class="fas fa-download ml-2"></i>
            </a>
            <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" 
                role="button">Start
                free tutorial
                <i class="fas fa-graduation-cap ml-2"></i>
            </a>
        </div>

        <hr class="my-4">

        <div class="pb-4">
            <a href="https://www.facebook.com/mdbootstrap" target="_blank">
                <i class="fab fa-facebook-f mr-3"></i>
            </a>

            <a href="https://twitter.com/MDBootstrap" target="_blank">
                <i class="fab fa-twitter mr-3"></i>
            </a>

            <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
                <i class="fab fa-youtube mr-3"></i>
            </a>

            <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
                <i class="fab fa-google-plus mr-3"></i>
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
            </a>
        </div-->

        <div class="footer-copyright py-3">
            © 2021 Copyright:
            <a href="{{ env('APP_URI') }}"> {{ env('APP_NAME') }} v1.0.8.15</a>
        </div>

    </footer>

    <script type="text/javascript" src="/dashboard/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/dashboard/js/popper.min.js"></script>
    <script type="text/javascript" src="/dashboard/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/dashboard/js/mdb.min.js"></script>
    <script type="text/javascript">
        new WOW().init();

    </script>

    <!-- Charts -->
    <script>
        // Line
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        //pie
        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
                labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
                datasets: [{
                    data: [300, 50, 100, 40, 120],
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        });


        //line
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "My First dataset",
                        backgroundColor: [
                            'rgba(105, 0, 132, .2)',
                        ],
                        borderColor: [
                            'rgba(200, 99, 132, .7)',
                        ],
                        borderWidth: 2,
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        backgroundColor: [
                            'rgba(0, 137, 132, .2)',
                        ],
                        borderColor: [
                            'rgba(0, 10, 130, .7)',
                        ],
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            },
            options: {
                responsive: true
            }
        });


        //radar
        var ctxR = document.getElementById("radarChart").getContext('2d');
        var myRadarChart = new Chart(ctxR, {
            type: 'radar',
            data: {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 59, 90, 81, 56, 55, 40],
                    backgroundColor: [
                        'rgba(105, 0, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(200, 99, 132, .7)',
                    ],
                    borderWidth: 2
                }, {
                    label: "My Second dataset",
                    data: [28, 48, 40, 19, 96, 27, 100],
                    backgroundColor: [
                        'rgba(0, 250, 220, .2)',
                    ],
                    borderColor: [
                        'rgba(0, 213, 132, .7)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true
            }
        });

        //doughnut
        var ctxD = document.getElementById("doughnutChart").getContext('2d');
        var myLineChart = new Chart(ctxD, {
            type: 'doughnut',
            data: {
                labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
                datasets: [{
                    data: [300, 50, 100, 40, 120],
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                }]
            },
            options: {
                responsive: true
            }
        });

    </script>

    <!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js"></script>
    <script>
        // Regular map
        function regular_map() {
            var var_location = new google.maps.LatLng(40.725118, -73.997699);

            var var_mapoptions = {
                center: var_location,
                zoom: 14
            };

            var var_map = new google.maps.Map(document.getElementById("map-container"),
                var_mapoptions);

            var var_marker = new google.maps.Marker({
                position: var_location,
                map: var_map,
                title: "New York"
            });
        }

        new Chart(document.getElementById("horizontalBar"), {
            "type": "horizontalBar",
            "data": {
                "labels": ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey"],
                "datasets": [{
                    "label": "My First Dataset",
                    "data": [22, 33, 55, 12, 86, 23, 14],
                    "fill": false,
                    "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
                        "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
                    ],
                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
                        "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
                        "rgb(201, 203, 207)"
                    ],
                    "borderWidth": 1
                }]
            },
            "options": {
                "scales": {
                    "xAxes": [{
                        "ticks": {
                            "beginAtZero": true
                        }
                    }]
                }
            }
        });

    </script>
</body>

</html>
