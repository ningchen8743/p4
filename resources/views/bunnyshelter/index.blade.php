@extends('layouts.master')

@section('title')
    All bunnies archived
@endsection

@section('content')
    <h1>All the bunnies in our archive</h1>

    <div class='my-image-row'>
    @foreach($bunnies as $bunny)
        @include('bunnyshelter._bunny')

    @endforeach
    </div>

@endsection