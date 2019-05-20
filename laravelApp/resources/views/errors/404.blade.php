@extends('layouts.app')

@section('content')

    @if( session('restriction') )

        <h1 class="text-center">{{ session('restriction') }}</h1>

    @endif
    <h1 class="text-center">OOPS, it looks like you are in the wrong place</h1>

@stop