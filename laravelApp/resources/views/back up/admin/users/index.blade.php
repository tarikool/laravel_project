@extends('layouts.admin')

    @section('content')

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                </tr>
            </thead>

            @if( $users )

                @foreach( $users as $user )
                    <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="{{ route('users.edit', $user->id) }}">{{$user->name}}</a></td>
                            <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt=""></td>
                            <td>{{$user->role ? $user->role->name : 'No Role'}}</td>
                            <td>{{$user->is_active ==1 ? 'Active' : 'Not Active'}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                        </tr>
                    </tbody>
                @endforeach
            @endif
        </table>

    @endsection