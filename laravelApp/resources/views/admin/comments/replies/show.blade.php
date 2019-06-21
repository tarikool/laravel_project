@extends('layouts.admin')



@section('content')
    @include('includes.notifications')

    @if( count( $replies ) >0  )

        <h3>All replies of comment  {{ $comment->body }} <a class="view-comment" href="{{ route( 'home.post', $comment->post_id ) }}">view post</a></h3>

        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">User</th>
            </tr>
            </thead>

            @foreach( $replies as $reply )
                <tbody>
                <tr>
                    <td>{{ $reply->id }}</td>
                    <td>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" height="38" src="{{ $reply->user->photo ? $reply->user->photo->file : 'http://placehold.it/64x64' }}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"> {{ $reply->author }}
                                    <small>{{ $reply->created_at->format('F d, Y \a\t g:i A') }}</small>
                                </h4>
                                <p>{{ $reply->body }}</p>
                            </div>
                        </div>
                    </td>
                    <td>@include('admin.comments.replies.replies_approval')</td>
                    <td>@include('admin.comments.replies.delete')</td>
                </tr>
                </tbody>
            @endforeach
        </table>
    @else
        <h2 class="text-center">No replies available for this comment</h2>
    @endif





@stop