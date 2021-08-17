@extends('layout/mdb-admin')

@section('title', 'Usuários')

@section('content')

    <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">

            <div class="card" style="min-height:68.7vh">

                <table class="table table-striped table-hover table-sm text-center">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">Figura</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Monitores</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 8; $i++)
                            <tr class="table-default">
                                <td scope="row">000001</td>
                                <td><img height="50px" style="border: 1px solid darkgray; border-radius: 6px"
                                        src="https://gasstation.net.br/gasway/img/usuarios/usuario-default.png"></td>
                                <td>Fulano de tal</td>
                                <td>fulano@gasway.com.br</td>
                                <td>(31) 99255-0123</td>
                                <td><img height="50px" style="border: 1px solid darkgray; border-radius: 6px"
                                        src="https://gasstation.net.br/gasway/img/monitores/monitor-default.png"></td>
                                <td scope="row"><!--button class="btn btn-primary btn-sm"><i class="fa fa-search"
                                            aria-hidden="true"></i>
                                        Ver</button-->
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
