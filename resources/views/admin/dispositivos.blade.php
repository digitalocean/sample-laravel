@extends('layout/mdb-admin')

@section('title', 'Dispositivos')

@section('content')

    <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">

            <div class="card" style="min-height:68.7vh">

                <table class="table table-striped table-hover table-sm text-center">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">Identificação</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Chave</th>
                            <th scope="col">Ativar até</th>
                            <th scope="col">Válido até</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 8; $i++)
                            <tr class="table-default">
                                <td scope="row">000001</td>
                                <td>Dispositivo tal</td>
                                <td>(31) 99255-0123</td>
                                <td>djk484Fqf$c#</td>
                                <td>30/09/2021</td>
                                <td>31/12/2021</td>
                                <td scope="row">
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
