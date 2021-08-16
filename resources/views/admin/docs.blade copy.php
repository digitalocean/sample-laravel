@extends('layout/mdb-admin')

@section('title', 'Documentação')

@section('content')

<div class="row wow fadeIn">
    <div class="col-md-9 mb-4">

        <br id="cronograma">
        <h1>Cronograma</h1>

        <div class="card" style="min-height:68vh">

            <div class="card-body m-0 p-0">
                <iframe style="border:0; padding:0; margin:0"
                    allowfullscreen="true"
                    height="600px"
                    width="100%"
                    src="https://docs.google.com/document/d/e/2PACX-1vTO_Ru7ba2aWpcJO5stxeMOua9yVUglS8akIPykQm_dCCPjAoJYnbS5OCBCSJjU38fl0HDztffzPGI7/pub?embedded=true"
                ></iframe>
            </div>

            
        </div>

        <br id="manual">
        <h1 class="mt-4">Manual</h1>

        <div class="card" style="min-height:68vh">

            <div class="card-body m-0 p-0">
                <iframe style="border:0; padding:0; margin:0"
                    allowfullscreen="true"
                    height="600px"
                    width="100%"
                    src="https://docs.google.com/document/d/e/2PACX-1vRLGyHmGicqbHyAh3j4tRxs5bNOIjX_LideZS6TNL3gCK4hc0hsZvJODnwVQI5ZUzJtvkc9TRmFBB9h/pub?embedded=true"
                ></iframe>
            </div>
        </div>

        <br id="especificacoes">
        <h1 class="mt-4">Especificações Técnicas</h1>

        <div class="card" style="min-height:68vh">

            <div class="card-body m-0 p-0">
                <iframe style="border:0; padding:0; margin:0"
                    allowfullscreen="true"
                    height="600px"
                    width="100%"
                    src="https://docs.google.com/document/d/e/2PACX-1vSYDrOsMv6uKu6QZ881ADk33MIGYvFil1z0hFktx17YktAeASGf5ybGoIL3qvrqx8MgKPkGiqza2z0D/pub?embedded=true"
                ></iframe>
            </div>
            
        </div>

        <br>


    </div>

    <div class="col-md-3 mb-4">
        <div class="card mb-4">
            <div class="card-header text-center">
                Índice
            </div>
            <div class="card-body">

                <a href="#cronograma">Cronograma</a><br>
                <a href="#manual">Manual</a><br>
                <a href="#especificacoes">Especificações</a><br>

            </div>
        </div>
    </div>
</div>

@endsection