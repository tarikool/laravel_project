@extends('layouts.admin')


@section('content')
    @include('includes.notifications')

    @if( count($photos)>0 )
        <table class="table table-striped table-dark">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>


            @foreach( $photos as $photo )
                <tbody>
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" width="45" src="{{ $photo->file }}" alt=""></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>{{$photo->updated_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => [ 'AdminMediasController@destroy', $photo->id ]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    @else
        <h2 class="text-center">Photo doesn't exist</h2>
    @endif



@endsection
