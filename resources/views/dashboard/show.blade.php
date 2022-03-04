@extends('layouts.app')

@section('content')
<div class="container">
      @include('includes.profile_sidebar')



        <div class="col-md-9">
            <div class="card">
                <div class="card-header">INDEX VIEW</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                       <h2> Display Spesific Resources</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
