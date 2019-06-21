@extends('layouts.blog-post')


@section('content')
    @include('includes.notifications')



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
                    <img class="media-object" height="38" src="{{ $comment->user->photo ? $comment->user->photo->file : 'http://placehold.it/64x64' }}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->author }}
                        <small>{{ $comment->created_at->format('F d, Y \a\t g:i A') }}</small>
                    </h4>
                    <p>{{ $comment->body }}</p>

                    <!-- Nested Comment -->
                    @if( $comment->replies )
                        @foreach( $comment->replies as $reply )
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="38"
                                         src="{{ $reply->user->photo ? $reply->user->photo->file : 'http://placehold.it/64x64' }}"
                                         alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $reply->user->name }}
                                        <small>{{ $comment->created_at->format('F d, Y \a\t g:i A') }}</small>
                                    </h4>
                                    <p>{{ $reply->body }}</p>
                        @endforeach

                        @foreach( $comment->replies as $reply )
                                    </div>
                                </div>
                        @endforeach
                    @endif
                <!--Nested Comment End -->

                    <div class="comment-reply-container">
                        <a id="comment-reply" class="toggle-reply pull-right">Reply</a>  {{-- functionality on app.js --}}

                        <div id="reply-form" class="col-sm-6">
                            @include('admin.comments.form.comment_reply')
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endif




@stop