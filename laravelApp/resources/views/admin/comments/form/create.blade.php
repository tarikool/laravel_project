{!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store']) !!}

<input type="hidden" name="post_id" value="{{ $post->id }}">

<div class="form-group">
    {!! Form::textarea('body',null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>

<div class="form-group">
    {!! Form::submit('Comment', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}