@extends('layouts.master1')
@section('title')
Dashboard | Edit Registerd
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div classs="card-header">
                <h3>Edit Role for Registered User!</h3>
                </div>
                <div classs="card-body">
                    <div class="row">
                        <div class="col-md-6">

                        <form action="/role-register-update/{{ $users->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="username" value="{{ $users->name }}" class="form-control">
                        </div>
                        <div class="form-group" name="usertype">

                        <label>Give Role</label>
                        <select class="form-control" name="usertype">
                            <option value="admin">Admin</option>
                            <option value="vendor">Vendor</option>
                            <option value="">None</option>
                        </select>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/role_register" class="btn btn-danger">Cancle</a>
                        </div>
                        </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

@endsection
