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




    @if( count($categories)>0 )
        <div class="col-xs-6">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Categories Name</th>
                        <th scope="col">Date Created</th>
                    </tr>
                </thead>

                @foreach( $categories as $category)
                    <tbody>
                        <tr>
                            <td>{{ $category->id}}</td>
                            <td><a href="{{ route('categories.edit', $category->id ) }}">{{ $category->name}}</a></td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date Available'}}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    @else
        <h2 class="text-center">No categories found </h2>
    @endif




@endsection
