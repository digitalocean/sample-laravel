@extends('layout/mdb-admin')

@section('title', 'Início')

@section('content')

<!--Grid row-->
<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-9 mb-4">

        <!--Card-->
        <div class="card">

            <!--Card content-->
            <div class="card-body">

                <canvas id="myChart"></canvas>

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-3 mb-4">

        <!--Card-->
        <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header text-center">
                Pie chart
            </div>

            <!--Card content-->
            <div class="card-body">

                <canvas id="pieChart"></canvas>

            </div>

        </div>
        <!--/.Card-->

        <!--Card-->
        <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">

                <!-- List group links -->
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action waves-effect">Sales
                        <span class="badge badge-success badge-pill pull-right">22%
                            <i class="fas fa-arrow-up ml-1"></i>
                        </span>
                    </a>
                    <a class="list-group-item list-group-item-action waves-effect">Traffic
                        <span class="badge badge-danger badge-pill pull-right">5%
                            <i class="fas fa-arrow-down ml-1"></i>
                        </span>
                    </a>
                    <a class="list-group-item list-group-item-action waves-effect">Orders
                        <span class="badge badge-primary badge-pill pull-right">14</span>
                    </a>
                    <a class="list-group-item list-group-item-action waves-effect">Issues
                        <span class="badge badge-primary badge-pill pull-right">123</span>
                    </a>
                    <a class="list-group-item list-group-item-action waves-effect">Messages
                        <span class="badge badge-primary badge-pill pull-right">8</span>
                    </a>
                </div>
                <!-- List group links -->

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->

</div>
<!--Grid row-->

<!--Grid row-->
<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-6 mb-4">

        <!--Card-->
        <div class="card">

            <!--Card content-->
            <div class="card-body">

                <!-- Table  -->
                <table class="table table-hover">
                    <!-- Table head -->
                    <thead class="blue-grey lighten-4">
                        <tr>
                            <th>#</th>
                            <th>Lorem</th>
                            <th>Ipsum</th>
                            <th>Dolor</th>
                        </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                            <td>Cell 3</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Cell 4</td>
                            <td>Cell 5</td>
                            <td>Cell 6</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                    </tbody>
                    <!-- Table body -->
                </table>
                <!-- Table  -->

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-6 mb-4">

        <!--Card-->
        <div class="card">

            <!--Card content-->
            <div class="card-body">

                <!-- Table  -->
                <table class="table table-hover">
                    <!-- Table head -->
                    <thead class="blue lighten-4">
                        <tr>
                            <th>#</th>
                            <th>Lorem</th>
                            <th>Ipsum</th>
                            <th>Dolor</th>
                        </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                            <td>Cell 3</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Cell 4</td>
                            <td>Cell 5</td>
                            <td>Cell 6</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Cell 7</td>
                            <td>Cell 8</td>
                            <td>Cell 9</td>
                        </tr>
                    </tbody>
                    <!-- Table body -->
                </table>
                <!-- Table  -->

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->

</div>
<!--Grid row-->

<!--Grid row-->
<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-lg-6 col-md-6 mb-4">

        <!--Card-->
        <div class="card">

            <!-- Card header -->
            <div class="card-header">Line chart</div>

            <!--Card content-->
            <div class="card-body">

                <canvas id="lineChart"></canvas>

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-6 col-md-6 mb-4">

        <!--Card-->
        <div class="card">

            <!-- Card header -->
            <div class="card-header">Radar Chart</div>

            <!--Card content-->
            <div class="card-body">

                <canvas id="radarChart"></canvas>

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-6 col-md-6 mb-4">

        <!--Card-->
        <div class="card">

            <!-- Card header -->
            <div class="card-header">Doughnut Chart</div>

            <!--Card content-->
            <div class="card-body">

                <canvas id="doughnutChart"></canvas>

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-6 col-md-6 mb-4">

        <!--Card-->
        <div class="card">

            <!-- Card header -->
            <div class="card-header">Horizontal Bar Chart</div>

            <!--Card content-->
            <div class="card-body">

                <canvas id="horizontalBar"></canvas>

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->
</div>
<!--Grid row-->

<!--Grid row-->
<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-6 mb-4">

        <!--Card-->
        <div class="card">

            <!-- Card header -->
            <div class="card-header">Google map</div>

            <!--Card content-->
            <div class="card-body">
                <!--Google map-->
                <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 500px">
                    <iframe src="https://maps.google.com/maps?q=chicago&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <!--Google Maps-->

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-6 mb-4">

        <!--Card-->
        <div class="card">

            <!--Section: Modals-->
            <section>

                <!-- Frame Modal Top Info-->
                <div class="modal fade top" id="frameModalTopInfoDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Body-->
                            <div class="modal-body">
                                <div class="row d-flex justify-content-center align-items-center">

                                    <p class="pt-3 pr-2">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Impedit nisi quo
                                        provident fugiat reprehenderit nostrum quos..</p>

                                    <a role="button" class="btn btn-info">Get it now
                                        <i class="far fa-gem ml-1"></i>
                                    </a>
                                    <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No,
                                        thanks</a>
                                </div>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Frame Modal Bottom Success-->

                <!-- Frame Modal Bottom Success-->
                <div class="modal fade bottom" id="frameModalBottomSuccessDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-frame modal-bottom modal-notify modal-success" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Body-->
                            <div class="modal-body">
                                <div class="row d-flex justify-content-center align-items-center">

                                    <p class="pt-3 pr-2">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Impedit nisi quo
                                        provident fugiat reprehenderit nostrum quos..</p>

                                    <a role="button" class="btn btn-success">Get it now
                                        <i class="far fa-gem ml-1"></i>
                                    </a>
                                    <a role="button" class="btn btn-outline-success waves-effect"
                                        data-dismiss="modal">No, thanks</a>
                                </div>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Frame Modal Bottom Success-->

                <!-- Side Modal Top Right Success-->
                <div class="modal fade right" id="sideModalTRSuccessDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-side modal-top-right modal-notify modal-success" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead">Modal Success</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="text-center">
                                    <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                                        iusto nulla
                                        aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                                        eius
                                        non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                                    </p>
                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <a role="button" class="btn btn-success">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </a>
                                <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Side Modal Top Right Success-->

                <!-- Side Modal Top Left Info-->
                <div class="modal fade left" id="sideModalTLInfoDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-side modal-top-left modal-notify modal-info" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead">Modal Info</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">

                                <img src="https://mdbootstrap.com/wp-content/uploads/2016/11/admin-dashboard-bootstrap.jpg"
                                    alt="Material Design for Bootstrap - dashboard" class="img-fluid">

                                <div class="text-center">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt
                                        vero illo
                                        error eveniet cum.
                                    </p>
                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <a role="button" class="btn btn-info">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </a>
                                <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Side Modal Top Left Info-->

                <!-- Side Modal Bottom Right Danger-->
                <div class="modal fade right" id="sideModalBRDangerDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading">Modal Danger</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-3">
                                        <p></p>
                                        <p class="text-center">
                                            <i class="fas fa-shopping-cart fa-4x"></i>
                                        </p>
                                    </div>

                                    <div class="col-9">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga,
                                            molestiae
                                            provident temporibus sunt earum.</p>
                                        <h2>
                                            <span class="badge">v52gs1</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <a role="button" class="btn btn-danger">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </a>
                                <a role="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Side Modal Bottom Right Danger-->

                <!-- Side Modal Bottom Left Warning-->
                <div class="modal fade left" id="sideModalBLWarningDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-side modal-bottom-left modal-notify modal-warning" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading">Modal Warning</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-3 text-center">
                                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(1).jpg"
                                            alt="Michal Szymanski - founder of Material Design for Bootstrap"
                                            class="img-fluid z-depth-1-half rounded-circle">
                                        <div style="height: 10px"></div>
                                        <p class="title mb-0">Jane</p>
                                        <p class="text-muted " style="font-size: 13px">Consultant</p>
                                    </div>

                                    <div class="col-9">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga,
                                            molestiae
                                            provident temporibus sunt earum.</p>
                                        <p class="card-text">
                                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit.</strong>
                                        </p>
                                    </div>
                                </div>


                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <a role="button" class="btn btn-warning">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </a>
                                <a role="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Side Modal Bottom Left Warning-->

                <!--Modal Form Login with Avatar Demo-->
                <div class="modal fade" id="modalLoginAvatarDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Header-->
                            <div class="modal-header">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg"
                                    class="rounded-circle img-responsive" alt="Avatar photo">
                            </div>
                            <!--Body-->
                            <div class="modal-body text-center mb-1">

                                <h5 class="mt-1 mb-2">Maria Doe</h5>

                                <div class="md-form ml-0 mr-0">
                                    <input type="password" type="text" id="form1" class="form-control ml-0">
                                    <label for="form1" class="ml-0">Enter password</label>
                                </div>

                                <div class="text-center mt-4">
                                    <button class="btn btn-cyan">Login
                                        <i class="fas fa-sign-in-alt ml-1"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal Form Login with Avatar Demo-->

                <!--Modal: Login / Register Form Demo-->
                <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal: Login / Register Form Demo-->

                <!-- Central Modal Large Info-->
                <div class="modal fade" id="centralModalLGInfoDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead">Modal Info</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="text-center">
                                    <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                                        iusto nulla
                                        aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                                        eius
                                        non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                                    </p>
                                </div>
                                <img src="https://mdbootstrap.com/wp-content/uploads/2016/11/admin-dashboard-bootstrap.jpg"
                                    alt="Material Design for Bootstrap - dashboard" class="img-fluid">

                            </div>

                            <!--Footer-->
                            <div class="modal-footer">
                                <a role="button" class="btn btn-info">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </a>
                                <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Central Modal Large Info-->

                <!-- Central Modal Fluid Success-->
                <div class="modal fade" id="centralModalFluidSuccessDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fluid modal-notify modal-success" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead">Modal Success</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="text-center">
                                    <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                                        iusto nulla
                                        aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                                        eius
                                        non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                                    </p>
                                </div>
                                <ul class="list-group z-depth-0">
                                    <li class="list-group-item justify-content-between">
                                        Cras justo odio
                                        <span class="badge badge-primary badge-pill">14</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Dapibus ac facilisis in
                                        <span class="badge badge-primary badge-pill">2</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Morbi leo risus
                                        <span class="badge badge-primary badge-pill">1</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Cras justo odio
                                        <span class="badge badge-primary badge-pill">14</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Dapibus ac facilisis in
                                        <span class="badge badge-primary badge-pill">2</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Morbi leo risus
                                        <span class="badge badge-primary badge-pill">1</span>
                                    </li>
                                </ul>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer">
                                <a role="button" class="btn btn-success">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </a>
                                <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Central Modal Fluid Success-->

                <!-- Full Height Modal Right Success Demo-->
                <div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-full-height modal-right modal-notify modal-success" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead">Modal Success</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="text-center">
                                    <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                                        iusto nulla
                                        aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                                        eius
                                        non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                                    </p>
                                </div>
                                <ul class="list-group z-depth-0">
                                    <li class="list-group-item justify-content-between">
                                        Cras justo odio
                                        <span class="badge badge-primary badge-pill">14</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Dapibus ac facilisis in
                                        <span class="badge badge-primary badge-pill">2</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Morbi leo risus
                                        <span class="badge badge-primary badge-pill">1</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Cras justo odio
                                        <span class="badge badge-primary badge-pill">14</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Dapibus ac facilisis in
                                        <span class="badge badge-primary badge-pill">2</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Morbi leo risus
                                        <span class="badge badge-primary badge-pill">1</span>
                                    </li>
                                </ul>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <a role="button" class="btn btn-success">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </a>
                                <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Full Height Modal Right Success Demo-->

                <!-- Full Height Modal Left Info Demo-->
                <div class="modal fade left" id="fluidModalLeftInfoDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-full-height modal-left modal-notify modal-info" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead">Modal Success</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="text-center">
                                    <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit
                                        iusto nulla
                                        aperiam blanditiis ad consequatur in dolores culpa, dignissimos,
                                        eius
                                        non possimus fugiat. Esse ratione fuga, enim, ab officiis totam.
                                    </p>
                                </div>
                                <ul class="list-group z-depth-0">
                                    <li class="list-group-item justify-content-between">
                                        Cras justo odio
                                        <span class="badge badge-primary badge-pill">14</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Dapibus ac facilisis in
                                        <span class="badge badge-primary badge-pill">2</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Morbi leo risus
                                        <span class="badge badge-primary badge-pill">1</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Cras justo odio
                                        <span class="badge badge-primary badge-pill">14</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Dapibus ac facilisis in
                                        <span class="badge badge-primary badge-pill">2</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Morbi leo risus
                                        <span class="badge badge-primary badge-pill">1</span>
                                    </li>
                                </ul>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <a role="button" class="btn btn-info">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </a>
                                <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Full Height Modal Right Info Demo-->

                <!-- Full Height Modal Top Warning Demo-->
                <div class="modal fade top" id="fluidModalTopWarningDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-full-height modal-top modal-notify modal-warning" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead">Modal Warning</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="text-center">
                                    <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                                </div>
                                <ul class="list-group z-depth-0">
                                    <li class="list-group-item justify-content-between">
                                        Cras justo odio
                                        <span class="badge badge-primary badge-pill">14</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Dapibus ac facilisis in
                                        <span class="badge badge-primary badge-pill">2</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Morbi leo risus
                                        <span class="badge badge-primary badge-pill">1</span>
                                    </li>
                                </ul>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer">
                                <a role="button" class="btn btn-warning">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </a>
                                <a role="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Full Height Modal Top Warning Demo-->

                <!-- Full Height Modal Bottom Danger Demo-->
                <div class="modal fade bottom" id="fluidModalBottomDangerDemo" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog modal-full-height modal-bottom modal-notify modal-danger" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead">Modal Danger</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="text-center">
                                    <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                                </div>
                                <ul class="list-group z-depth-0">
                                    <li class="list-group-item justify-content-between">
                                        Cras justo odio
                                        <span class="badge badge-primary badge-pill">14</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Dapibus ac facilisis in
                                        <span class="badge badge-primary badge-pill">2</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Morbi leo risus
                                        <span class="badge badge-primary badge-pill">1</span>
                                    </li>
                                </ul>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer">
                                <a role="button" class="btn btn-danger">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </a>
                                <a role="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Full Height Modal Bottom Danger Demo-->

            </section>
            <!--Section: Modals-->

            <!-- Card header -->
            <div class="card-header">Modals</div>

            <!--Card content-->
            <div class="card-body">

                <div class="text-center mb-5">
                    <p class="lead">Click buttons below to launch modals demo</p>
                </div>

                <!-- First row-->
                <div class="row">

                    <!--First column-->
                    <div class="col-md-3">
                        <h5 class="text-center mb-3">Frame Modal</h5>

                        <img src="https://mdbootstrap.com/img/brandflow/modal4.jpg" alt="MDB graphics"
                            class="img-fluid z-depth-1">
                        <div class="text-center">
                            <h5 class="my-3">Position</h5>

                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#frameModalTopInfoDemo"
                                data-backdrop="false">Top</a>
                            <br>
                            <a class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#frameModalBottomSuccessDemo" data-backdrop="false">Bottom</a>
                        </div>
                    </div>
                    <!--First column-->

                    <!--Second column-->
                    <div class="col-md-3">
                        <h5 class="text-center mb-3">Side Modal</h5>

                        <img src="https://mdbootstrap.com/img/brandflow/modal3.jpg" alt="MDB graphics"
                            class="img-fluid z-depth-1">
                        <div class="text-center">
                            <h5 class="my-3">Position</h5>

                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sideModalTRSuccessDemo"
                                data-backdrop="false">Top Right</a>
                            <br>
                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sideModalTLInfoDemo">Top
                                Left</a>
                            <br>
                            <a class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#sideModalBRDangerDemo">Bottom
                                Right</a>
                            <br>
                            <a class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#sideModalBLWarningDemo">Bottom
                                Left</a>
                        </div>
                    </div>
                    <!--Second column-->

                    <!--Third column-->
                    <div class="col-md-3">
                        <h5 class="text-center mb-3">Central Modal</h5>

                        <img src="https://mdbootstrap.com/img/brandflow/modal2.jpg" alt="MDB graphics"
                            class="img-fluid z-depth-1">
                        <div class="text-center">
                            <h5 class="my-3">Size</h5>

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modalLoginAvatarDemo">Small
                            </button>
                            <br>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modalLRFormDemo">Medium
                            </button>
                            <br>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#centralModalLGInfoDemo">Large
                            </button>
                            <br>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#centralModalFluidSuccessDemo">Fluid
                            </button>
                        </div>
                    </div>
                    <!--Third column-->

                    <!--Fourth column-->
                    <div class="col-md-3">
                        <h5 class="text-center mb-3">Fluid Modal</h5>

                        <img src="https://mdbootstrap.com/img/brandflow/modal1.jpg" alt="MDB graphics"
                            class="img-fluid z-depth-1">
                        <div class="text-center">
                            <h5 class="my-3">Position</h5>

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#fluidModalRightSuccessDemo">Right</button>
                            <br>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#fluidModalLeftInfoDemo">Left</button>
                            <br>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#fluidModalTopWarningDemo">Top</button>
                            <br>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#fluidModalBottomDangerDemo">Bottom</button>
                        </div>
                    </div>
                    <!--Fourth column-->

                </div>
                <!-- /.First row-->

            </div>

        </div>
        <!--/.Card-->

    </div>
    <!--Grid column-->

</div>
<!--Grid row-->

</div>

@endsection