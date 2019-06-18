@extends('layouts.admin')


@section('content')
    @include('includes.notifications')

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>

        @if( $posts )

            @foreach( $posts as $post )
                <tbody>
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="38" src="{{$post->user->photo ? $post->user->photo->file : 'http://placehold.it/400x400' }}" alt=""><p>{{$post->user ? $post->user->name : ' ' }}</p></td>
                    <td>{{$post->category ? $post->category->name : 'No Category' }}</td>
                    <td><a href="{{route('posts.edit', $post->id )}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body,10)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="{{ route( 'home.post', $post->id ) }}">view post</a></td>
                    <td><a href="{{ route( 'comments.show', $post->id ) }}">view comments</a></td>
                </tr>
                </tbody>
            @endforeach
        @endif
    </table>



@endsection
