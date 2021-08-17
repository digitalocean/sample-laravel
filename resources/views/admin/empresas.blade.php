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
                                <th scope="col">Figura</th>
                                <th scope="col">Razão Social</th>
                                <th scope="col">CNPJ</th>
                                <th scope="col">Situação</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 8; $i++)
                            <tr class="table-default">
                                <td scope="row">000001</td>
                                <td><img height="50px" style="border: 1px solid darkgray; border-radius: 6px"
                                    src="https://gasstation.net.br/gasway/img/empresas/empresa-default.png"></td>
                                <td>Empresa tal</td>
                                <td>00.000.000/0001-01</td>
                                <td><i class="fa fa-check" style="color:green" aria-hidden="true"></i></td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i>
                                        Editar</button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>
                                        Excluir</button>
                                </td>
                            </tr>
                            @endfor

                        </tbody>

                    </table>

            </div>

        </div>

    </div>

@endsection
