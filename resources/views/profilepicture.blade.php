@extends('layouts.masterprofile')

@section('content')

<br><br>
<div class="container">
<!--------------------End SESSION --------------------->
@include('includes.profile_sidebar')
<div class="row">

<div class="col-lg-12">
    <div class="panel panel-primary ">
        <div class="panel-heading">Profile Image</div>
        <div class="panel-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ Auth::user()->name }}</div>

                        <div class="card-body">
                        <br><br>
                            <form enctype="multipart/form-data" method="POST" action="{!! route('profileavatar') !!}">
                            @csrf
                            <table><tr><td>
                                <div class="form-group row">
                                <label class="col-md-12 col-form-label text-md-right">Profile Avatar</label>

                                 <input  type="file" class="form-control" name="avatar"><br>
                                <input  type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">

                            
                                  <button type="submit" class="btn btn-success">Upload Image </button>
                         </div>
                        </div></div>
                    </form>
                    
                    </div>
                    </div>
                    </div>
            </div>
         
@endsection
