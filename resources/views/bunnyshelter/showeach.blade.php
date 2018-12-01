@extends('layouts.master')

@section('title')
    {{ $bunny->name }}
@endsection

@section('content')
    <h1>Meet {{ $bunny->name }} !</h1>
    <img class='bunny' src='{{ $bunny->photo_url }}' alt='Photo of the bunny'>
    <ul>
        <li>sex: {{$bunny->sex}}</li>
        <li>breed: {{$bunny->breed}}</li>
        <li>dob: {{$bunny->dob}}</li>
        <li>color: {{$bunny->color}}</li>
    </ul>
    <a href='/all'>Back</a>

@endsection