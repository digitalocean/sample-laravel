@extends('layouts.masterprofile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                    <a href="/posts/create" class="btn btn-primary">Pay Some Fees</a>
                        <h3>Your Fees Posts</h3>
                        @if(count($posts) > 0)
                            <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a></td>
                                        <td>  {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'emthod' => 'POST', 'class' => 'pull-rigth'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                         {!!Form::close()!!}
                                         </td>
                                    </tr>
                                @endforeach
                            </table>
                         @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
