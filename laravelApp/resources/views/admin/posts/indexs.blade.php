@extends('layouts.admin')


@section('content')
    @include('includes.notifications')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>

        </tbody>
    </table>






@endsection
