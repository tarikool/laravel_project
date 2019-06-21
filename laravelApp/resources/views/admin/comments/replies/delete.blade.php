{!! Form::open(['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id ] ]) !!}

<div class="form-group">
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
</div>

{!! Form::close() !!}