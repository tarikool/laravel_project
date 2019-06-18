@extends('layouts.admin')



@section('content')
    @include('includes.notifications')

    <h3>All comments of {{ $post->title }} <a style="font-size: 15px;" href="{{ route( 'home.post', $post->id ) }}">view post</a></h3>

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
        </tr>
        </thead>

        @if( $comments )

            @foreach( $comments as $comment )
                <tbody>
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" height="38" src="{{ $comment->post->user->photo ? $comment->post->user->photo->file : 'http://placehold.it/64x64' }}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"> {{ $comment->author }}
                                    <small>{{ $comment->created_at->format('F d, Y \a\t g:i A') }}</small>
                                </h4>
                                <p>{{ $comment->body }}</p>
                            </div>
                        </div>
                    </td>
                    <td>@include('admin.comments.form.comments_approval')</td>
                    <td>@include('admin.comments.form.delete')</td>
                </tr>
                </tbody>
            @endforeach
        @endif
    </table>





@stop