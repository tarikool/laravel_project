
{!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@reply']) !!}

<input type="hidden" name="comment_id" value="{{ $comment->id }}">

<div class="form-group">
    {!! Form::textarea('body',null, ['class' => 'form-control', 'rows' => 3 ]) !!}
</div>

<div class="form-group">
    {!! Form::submit('Reply', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}