@extends('layouts.masterprofile')

@section('content')
<!--  error check  -->

<div class="container"><br><br>

 @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<!--  session check  -->
@if(session()->get('message'))
    <div class="alert alert-success" role="alert">
    <strong>SUCCESS:</strong>{{ session()->get('message')}}

    </div>
@endif


 @include('includes.profile_sidebar')

 <div class="col-md-9">
            <div class="card">
            <div class="card-header">{{ Auth::user()->id }}: {{ Auth::user()->name }}</div>
 
                <div class="card-body">

<form role="form" method="POST" action="{{ url('/user/credentials') }}" >
  <div class="col-md-9">             
    <label for="current-password" class="col-sm-4 control-label">Current Password</label>
    <div class="col-sm-8">
      <div class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <input type="text" class="form-control" name="current-password" placeholder="Password" value="{{ Auth::user()->password2 }}">
      </div>
    </div>
    <label for="password" class="col-sm-4 control-label">New Password</label>
    <div class="col-sm-8">
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
    </div>
    <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
    <div class="col-sm-8">
      <div class="form-group">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-6">
      <button type="submit" class="btn btn-danger">Submit</button>
    </div>
  </div>
</form>

</div>
</div>



<!--

<div class="col-md-9">
            <div class="card">
            <div class="card-header">{{ Auth::user()->id }}: {{ Auth::user()->name }}</div>
 
                <div class="card-body">
                <form role="form" method="POST" action="{{ url('/user/credentials') }}" >
<!--                    <form method="POST" action="{!! route('changepassword') !!}">-- >
                    @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Current Password :</label>
                            <div class="col-md-6">
                                <input id="currenrtpassword" type="text" class="form-control" name="currenrtpassword" value="{{ Auth::user()->password2 }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">New Password :</label>
                            <div class="col-md-6">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <input type="password" class="form-control" name="current-password" placeholder="Password"> 
                                   </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Confirm New Password :</label>
                            <div class="col-md-6">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
-->


</div>
</div>
@endsection
