@extends('layout.app')
    <a href="/posts" class="btn btn-default">Go Back</a>
        @section('content')
            <h1>{{$post->title}}</h1>

            <div>
            {{$post->body}}
            </div>
            <hr>
            <small>Written on {{$post->created_at}} by {{$post->user_id}}</small>
            <hr>
            @if(!Auth::guest() !== $post->user_id){
                return redirect('/posts')->with('error', 'Unautherized Page')
            }
             (Auth()->()->id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

                {{Form::open(['action' => ['PostsController@destroy', $post->id], 'emthod' => 'POST', 'class' => 'pull-rigth'])}    }
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {{Form::close()}}

            @endif
       @endsection
