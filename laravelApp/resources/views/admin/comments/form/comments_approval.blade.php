@if( $comment->is_active == 0 )
    {!! Form::model($comment,['method' => 'PATCH', 'action' => [ 'PostCommentsController@update', $comment->id ]]) !!}

    <div class="form-group">
        <input type="hidden" name="is_active" value=1 >
        {!! Form::submit('Approve', ['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}
@elseif( $comment->is_active == 1 )

    {!! Form::model($comment,['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id ]]) !!}

    <input type="hidden" name="is_active" value=0>
    <div class="form-group">
        {!! Form::submit('Disapprove', ['class' => 'btn btn-warning']) !!}
    </div>

    {!! Form::close() !!}

    @endif
