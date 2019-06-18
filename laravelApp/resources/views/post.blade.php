@extends('layouts.blog-post')


@section('content')
    @include('includes.notifications')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{ $post->body }}</p>
    <hr>



    <!-- Comments Form -->
    @if( Auth::check())
        <div class="well">
            <h4>Leave a Comment:</h4>
            @include('admin.comments.form.create')
        </div>
    @endif

    <hr>

    <!-- Posted Comments -->

    @if( $comments )
        @foreach( $comments as $comment )
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" height="38" src="{{ $comment->post->user->photo ? $comment->post->user->photo->file : 'http://placehold.it/64x64' }}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->author }}
                        <small>{{ $comment->created_at->format('F d, Y \a\t g:i A') }}</small>
                    </h4>
                    <p>{{ $comment->body }}</p>
                </div>
            </div>
        @endforeach
    @endif

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>


@stop