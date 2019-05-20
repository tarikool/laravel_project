@extends('layouts.admin')


@section('content')

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">User Name</th>
            <th scope="col">Photo</th>
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
                    <td><a href="{{ route('posts.edit', $post->id) }}">{{$post->id}}</a></td>
                    <td>{{$post->user_id}}</td>
                    <td>{{$post->photo_id}}</td>
                    <td>{{$post->category_id}}</td>
                    <td><img height="50" src="{{$post->photo_id ? $post->photo_id : 'http://placehold.it/400x400' }}" alt=""></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
                </tbody>
            @endforeach
        @endif
    </table>



@endsection
