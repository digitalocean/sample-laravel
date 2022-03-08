@extends('layouts.app')

        @section('content')
        <?php echo 'THIS IS PHP TEXT';  ?>
            <h1>Create Posts</h1>
            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST' , 'enctype' => 'multipart/data']) !!}
             <div class="form-group">
             {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'from-control', 'placeholder' => 'Title'])}}
             </div>
              <div class="form-group">
             {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['class' => 'from-control', 'placeholder' => 'Body Text'])}}
             </div>
             <div class="form-group">
                {{Form::file('cover_image')}}
             </div>
              {{Form::submit('submit', ['class' => 'btn btn-success'])}}
            {!! Form::close() !!}

        @endsection
