@if( $reply->is_active == 0 )
    {!! Form::model($reply,['method' => 'PATCH', 'action' => [ 'CommentRepliesController@update', $reply->id ]]) !!}

    <div class="form-group">
        <input type="hidden" name="is_active" value=1 >
        {!! Form::submit('Approve', ['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}
@elseif( $reply->is_active == 1 )

    {!! Form::model($reply,['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id ]]) !!}

    <input type="hidden" name="is_active" value=0>
    <div class="form-group">
        {!! Form::submit('Disapprove', ['class' => 'btn btn-warning']) !!}
    </div>

    {!! Form::close() !!}

@endif
