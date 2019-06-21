@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@stop



@section('content')

    <h1>Upload Media</h1>
        {!! Form::open(['method' => 'POST', 'action' => 'AdminMediasController@store', 'class' => 'dropzone' ]) !!}
            <div class="form-group">
                {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
@stop




@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@stopnn