@extends('layouts.admin')



@section('content')
    @include('includes.notifications')

    @if( count($comments) > 0 )

        <h1>Comment</h1>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">User</th>
                <th scope="col">Comment</th>
                <th scope="col">Email</th>
                <th scope="col">Post</th>
            </tr>
            </thead>

                @foreach( $comments as $comment )
                    <tbody>
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td><img height="38" src="{{$comment->user->photo ? $comment->user->photo->file : 'http://placehold.it/400x400' }}" alt=""><p>{{' '. $comment->author }}</p></td>
                            <td>{{ str_limit($comment->body,10) }}<br><p id="comment-body">{{ $comment->created_at->diffForHumans() }}</p></td>
                            <td>{{ $comment->email }}</td>
                            <td><img height="38" src="{{ $comment->post->photo ? $comment->post->photo->file : 'http://placehold.it/400x400' }}"
                                     alt=""><p>{{ $comment->post->title }}</p></td>
                            <td><a href="{{ route( 'home.post', $comment->post_id ) }}">view post</a></td>
                            <td>@include('admin.comments.form.comments_approval')</td>
                            <td>@include('admin.comments.form.delete')</td>
                        </tr>
                    </tbody>
            @endforeach
        </table>
    @else
        <h2>No comment available </h2>
    @endif





@stop