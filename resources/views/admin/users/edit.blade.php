@extends('layouts.admin')


@section('content')


    <h1>Lets Edit Niggas</h1>

    <div class="row"> {{--First Row --}}

        <div class="col-xs-3">  {{-- Profile picture and Delete Form --}}

            <img src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt=""
                 class="img-responsive img-rounded">
            <br>

            <div class="col-xs-4"></div>

            <div class="col-xs-4">
                {!! Form::open(['method' => 'DELETE', 'action' => [ 'AdminController@destroy', $user->id ]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>

                {!! Form::close() !!}

            </div>

        </div> {{--//End--}}


        <div class="col-sm-9">  {{--Edit Form--}}
            {!! Form::model( $user ,['method' => 'PATCH', 'action' => ['AdminController@update', $user->id ], 'files' => true ]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name',null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email',null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id', $roles ,null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status') !!}
                {!! Form::select('is_active', array( 1 => 'Active', 0 =>'Not Active' ) , null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'File') !!}
                {!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div> {{--//End Edit Form--}}

    </div>{{--//End First Row--}}

    <div class="row">
        @include('includes.errors')
    </div>

@endsection


