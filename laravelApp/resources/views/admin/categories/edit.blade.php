@extends('layouts.admin')


@section('content')

		<div class="col-xs-6">
			{!! Form::model( $categories, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $categories->id ]])!!}

				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', null, ['class' => 'form-control' ])!!}
				</div>

				<div class="form-group">
			    	{!! Form::submit('Update', ['class' => 'btn btn-primary col-sm-6']) !!}
				</div>
				
			{!! Form::close() !!}

			{!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy',  $categories->id ]]) !!}

				<div class="form-group">
					{!! Form::submit('Delete', ['class' => 'btn btn-danger col-sm-6'])!!}
				</div>

			{!! Form::close()!!}
		</div>


@endsection