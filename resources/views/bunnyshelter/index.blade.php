@extends('layouts.master')

@section('title')
    All bunnies archived
@endsection

@section('content')
    <h1>All the bunnies in our archive</h1>

    @if(session('alert'))
        <div class='alert'>{{ session('alert') }}</div>
    @endif

    @foreach($bunnies as $bunny)
        <h2>{{ $bunny -> name }}</h2>
        @include('bunnyshelter._bunny')
    @endforeach

@endsection