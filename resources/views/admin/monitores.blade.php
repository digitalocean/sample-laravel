@extends('layout/mdb-admin')

@section('title', 'Últimos abastecimentos')

@section('content')

    <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">

            <div class="card">

                <table class="table table-striped table-hover table-sm text-center">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">Hora <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
                            <th scope="col" class="text-left">Abastecimento</th>
                            <th scope="col" class="text-left">Pagamento</th>
                            <th scope="col">Situação</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-warning">
                            <td scope="row">1234567</td>
                            <td>08:47</td>
                            <td class="text-left">3,5 litros x R$ 6,399 por litro<br>
                                <b>R$ 104,06</b> Gasolinha comum
                            </td>
                            <td class="text-left">PIX R$ 0,38 de desconto<br>
                                <b>R$ 93,06</b>
                            </td>
                            <td><i class="fa fa-circle" aria-hidden="true" style="color:green"></td>
                            <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                    Ver</button>
                            </td>
                        </tr>

                        <tr class="table-danger">
                            <td scope="row">234578</td>
                            <td>08:47</td>
                            <td class="text-left">3,5 litros x R$ 6,399 por litro<br>
                                <b>R$ 104,06</b> Gasolinha comum
                            </td>
                            <td class="text-left">PIX R$ 0,38 de desconto<br>
                                <b>R$ 93,06</b>
                            </td>
                            <td><i class="fa fa-circle" aria-hidden="true" style="color:red"></td>
                            <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                    Ver</button></td>
                        </tr>

                        @for ($i = 0; $i < 2; $i++)
                            <tr class="table-default">
                                <td scope="row">3456789</td>
                                <td>08:47</td>
                                <td class="text-left">3,5 litros x R$ 6,399 por litro<br>
                                    <b>R$ 104,06</b> Gasolinha comum
                                </td>
                                <td class="text-left">PIX R$ 0,38 de desconto<br>
                                    <b>R$ 93,06</b>
                                </td>
                                <td><i class="fa fa-circle" aria-hidden="true" style="color:gray"></td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button>
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-qrcode" aria-hidden="true"></i>
                                        Pix</button>
                                </td>
                            </tr>
                        @endfor

                    </tbody>

                </table>

            </div>



        </div>

    </div>

    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="/admin">Monitoramento</a>
                <span>/</span>
                <span>Últimas quatro horas</span>
            </h4>
        </div>
    </div>

    <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">

            <div class="card" style="min-height:68.7vh">

                <table class="table table-striped table-hover table-sm text-center">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">Hora <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
                            <th scope="col" class="text-left">Abastecimento</th>
                            <th scope="col" class="text-left">Pagamento</th>
                            <th scope="col">Situação</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @for ($i = 0; $i < 12; $i++)
                            <tr class="table-default">
                                <td scope="row">3456789</td>
                                <td>08:47</td>
                                <td class="text-left">3,5 litros x R$ 6,399 por litro<br>
                                    <b>R$ 104,06</b> Gasolinha comum
                                </td>
                                <td class="text-left">PIX R$ 0,38 de desconto<br>
                                    <b>R$ 93,06</b>
                                </td>
                                <td><i class="fa fa-circle" aria-hidden="true" style="color:gray"></td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                                        Ver</button>
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-qrcode" aria-hidden="true"></i>
                                        Pix</button>
                                </td>
                            </tr>
                        @endfor

                    </tbody>

                </table>

            </div>

        </div>

    </div>


@endsection
