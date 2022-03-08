@extends('layout.app')

    @section('content')
    <h1>Fees</h1>
        <div class="container">
            <div class="jumbotron">
             <ul class="list-group">
                 @if(count($posts) > 0)
                        @foreach($posts as $post)
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <li class="list-group-item">
                                        <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
                                    <small>Payed  on {{$post->created_at}} by {{$post->user_id}}</small>
                                </li>
                            </div>
                        </div>
                  @endforeach
                  {{$posts->links()}}
                 </ul>
                @else
                 <p>No Post Found</p>
                @endif
            </div>
        </div>
    @endsection
