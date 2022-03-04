@extends('layouts.app')

        @section('content')
            <h1>Edit Posts</h1>
            {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST' ]) !!}
             <div class="form-group">
             {{Form::label('title', 'Title')}}
                {{Form::text('title', $post->title, ['class' => 'from-control', 'placeholder' => 'Title'])}}
             </div>
              <div class="form-group">
             {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $post->body, ['class' => 'from-control', 'placeholder' => 'Title'])}}
             </div>
             {{Form::hidden('_method' , 'PUT')}}
              {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        @endsection
