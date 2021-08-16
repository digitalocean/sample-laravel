@extends('layout/mdb-admin')

@section('title', 'Documentação')

@section('content')

<div class="row wow fadeIn">
    <div class="col-md-12 mb-4">

        <div class="card" style="min-height:68vh">

            <div class="card-body m-0 p-0">
                <iframe style="border:0; padding:0; margin:0"
                    allowfullscreen="true"
                    height="610px"
                    width="100%"
                    src="https://docs.google.com/document/d/e/2PACX-1vTCO-i1temynQxQEPAysFRMgn5RAmo_ZUkhkwlY5VcqydZApRtRDhAyEQOppWy4FqVz_NilYGIFyeQp/pub?embedded=true"
                ></iframe>
            </div>
        </div>

    
    </div>

</div>

@endsection