@extends('layout/mdb-admin')

@section('title', 'Empresas')

@section('content')

    <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">

            <div class="card" style="min-height:68.7vh">

                    <table class="table table-striped table-hover table-sm text-center">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">#</th>
                                <th scope="col">Combustível</th>
                                <th scope="col">Tempo restante</th>
                                <th scope="col">Status</th>
                                <th scope="col">Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-success">
                                <td scope="row">Bomba 1</td>
                                <td>Gasolina comum</td>
                                <td></td>
                                <td>Bomba liberada</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-success">
                                <td scope="row">Bomba 1</td>
                                <td>Etanol comum</td>
                                <td></td>
                                <td>Bomba liberada</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-warning">
                                <td scope="row">Bomba 2</td>
                                <td>Gasolina aditivada</td>
                                <td>5 min 20 seg</td>
                                <td>Abastecendo</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-success">
                                <td scope="row">Bomba 2</td>
                                <td>Etanol comum</td>
                                <td></td>
                                <td>Bomba liberada</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-danger">
                                <td scope="row">Bomba 3</td>
                                <td>Diesel comum</td>
                                <td>2 min 30 seg</td>
                                <td>Aguradando pagamento</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-success">
                                <td scope="row">Bomba 3</td>
                                <td>Gasolina comum</td>
                                <td></td>
                                <td>Bomba liberada</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-success">
                                <td scope="row">Bomba 4</td>
                                <td>Gasolina comum</td>
                                <td></td>
                                <td>Bomba liberada</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-success">
                                <td scope="row">Bomba 4</td>
                                <td>Etanol comum</td>
                                <td></td>
                                <td>Bomba liberada</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-success">
                                <td scope="row">Bomba 5</td>
                                <td>Gasolina comum</td>
                                <td></td>
                                <td>Bomba liberada</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-success">
                                <td scope="row">Bomba 5</td>
                                <td>Etanol comum</td>
                                <td></td>
                                <td>Bomba liberada</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-success">
                                <td scope="row">Bomba 6</td>
                                <td>Gasolina comum</td>
                                <td></td>
                                <td>Bomba liberada</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                            <tr class="table-success">
                                <td scope="row">Bomba 6</td>
                                <td>Etanol comum</td>
                                <td></td>
                                <td>Bomba liberada</td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button></td>
                            </tr>

                        </tbody>

                    </table>

            </div>

        </div>

    </div>

@endsection
