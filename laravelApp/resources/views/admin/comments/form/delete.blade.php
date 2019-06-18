{!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id ] ]) !!}

    <div class="form-group">
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    </div>

{!! Form::close() !!}