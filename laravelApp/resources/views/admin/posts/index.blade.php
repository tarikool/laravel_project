@extends('layouts.admin')


@section('content')
    @include('includes.notifications')

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Post's Owner</th>
            <th scope="col">Category</th>
            <th scope="col">Photo</th>
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
                    <td>{{$post->user ? $post->user->name : ' ' }}</td>
                    <td>{{$post->category ? $post->category->name : 'No Category' }}</td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt=""></td>
                    <td><a href="{{route('posts.edit', $post->id )}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body,10)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
                </tbody>
            @endforeach
        @endif
    </table>



@endsection
