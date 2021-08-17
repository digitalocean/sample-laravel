@extends('layout/mdb-admin')

@section('title', 'Mapeamento de Bombas')

@section('content')

    <div class="row wow fadeIn">
        <div class="col-md-9 mb-4">

            <div class="card" style="min-height:68.7vh">

                    <table class="table table-striped table-hover table-sm text-center">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">#</th>
                                <th scope="col">Bomba</th>
                                <th scope="col">QRCode</th>
                                <th scope="col">Bicos</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 6; $i++)
                            <tr class="table-default">
                                <td scope="row">1234567</td>
                                <td scope="row">Bomba 1</td>
                                <td><img height="60px" src="https://gasstation.net.br/gasway/qrcode/temp/bico_1234567.png"></td>
                                <td style="text-align:left;">
                                    <div class="p-2 mr-2" style="float:left; width:130px; text-align:left; border: 1px solid darkgray; border-radius:6px">
                                        <b>Bico 1</b><br>
                                        <img height="30px" src="https://gasstation.net.br/gasway/img/bicos/1.jpg"><br>
                                        Gasolina comum
                                    </div>
                                    <div class="p-2 mr-2" style="float:left; width:130px; text-align:left; border: 1px solid darkgray; border-radius:6px">
                                        <b>Bico 1</b><br>
                                        <img height="30px" src="https://gasstation.net.br/gasway/img/bicos/1.jpg"><br>
                                        Gasolina comum
                                    </div>

                                </td>
                                <td><button class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i>
                                        Imprimir</button></td>
                            </tr>
                            @endfor
                        </tbody>

                    </table>

            </div>

        </div>
        <div class="col-md-3 mb-4">
        </div>

    </div>

@endsection
