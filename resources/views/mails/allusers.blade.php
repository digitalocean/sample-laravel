@extends('layouts.mastermap')

@section('content')
<div class="container">
      @include('includes.profile_sidebar')



        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}</div>
<?php
$users = DB::table('users')->get();
?>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>@mdo</td>
    </tr>
    @endforeach
    <tr>
      </tbody>
      </table>



                    You are logged in!<br>
                   <h6> user Type : {{ Auth::user()->usertype }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
