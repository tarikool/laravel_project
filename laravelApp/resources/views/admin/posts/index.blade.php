@extends('layouts.admin')


@section('content')
    @include('includes.notifications')

    @if( count($posts)>0 )

        <h2>All Posts</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
            </tr>
            </thead>

            @php ($i =1 )
            @foreach( $posts as $post )
            <tbody>
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>
                    <div class="media">
                        <div class="media-left">
                            <img height="38" src="{{$post->user->photo ? $post->user->photo->file : 'http://placehold.it/400x400' }}" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $post->user ? $post->user->name : ' ' }}
                                <small>{{ $post->updated_at->format('F d, Y \a\t g:i A') }}</small>
                            </h4>
                            <p>{{$post->body}}</p>
                        </div>
                    </div>
                </td>
                <td>{{$post->category ? $post->category->name : 'No Category' }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route( 'home.post', $post->id ) }}">view post</a></li>
                            <li><a href="{{route('posts.edit', $post->id )}}">Edit post</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route( 'comments.show', $post->id ) }}">view comments</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
            @endforeach
        </table>
    @else
        <h2 class="text-center">No post available </h2>
    @endif

@endsection
