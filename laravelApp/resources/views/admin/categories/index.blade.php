@extends('layouts.admin')


@section('content')
    @include('includes.notifications')
    <h1>Categories</h1>
        <div class="col-xs-6">
             {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store' ]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name',null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                </div>

           {!! Form::close() !!}
            
        </div>


        <div class="col-xs-6">
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Categories Name</th>
                    <th scope="col">Date Created</th>
                </tr>
                </thead>

                @if( $categories)

                    @foreach( $categories as $category)
                        <tbody>
                        <tr>
                            <td>{{ $category->id}}</td>
                            <td>{{ $category->name}}</td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date Availabel'}}</td>
                        </tr>
                        </tbody>
                    @endforeach
                @endif
            </table>
        </div>


@endsection
