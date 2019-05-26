@extends('layouts.admin')


@section('content')

    <div class="row">

        <div class="col-xs-3">
            <img src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt=""
                 class="img-responsive img-rounded">
            <br>
            <div class="col-xs-4"></div>

            <div class="col-xs-4">
                {!! Form::open(['method' => 'DELETE', 'action' => [ 'AdminPostsController@destroy', $post->id ]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>

        <div class="col-xs-9">
            {!! Form::model($post,['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id ], 'files' => true ]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title',null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', ['' => 'Choose Category'] + $categories , null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Body') !!}
                {!! Form::textarea('body',null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <div class="row">
        @include('includes.errors')
    </div>

@endsection
