@extends('layouts.master')

@section('content')
<div class="container">
<!-- ============== ERRORS --->
 @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<!-- ===============End ERRORS ======================== -->
<!-- ----------------SESSION ----------------------------->
@if(session()->get('message'))
    <div class="alert alert-success" role="alert">
        <strong>SUCCESS:</strong>{{ session()->get('message')}}
    </div>
@endif
<!--------------------End SESSION --------------------->
@include('includes.profile_sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{!! route('profileavatar') !!}">
                    @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Profile Avatar</label>

                            <div class="col-md-6">
                                <input  type="file" class="form-control" name="avatar">
                                <input  type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">

                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
