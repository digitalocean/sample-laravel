@extends('layouts.mastermap')

@section('content')
<div class="container">
      @include('includes.profile_sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
