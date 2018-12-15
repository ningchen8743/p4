@extends('layouts.master')

@section('title')
    {{ $bunny->name }}
@endsection

@section('content')
    <h1>Meet {{ $bunny->name }} !</h1>
    <img class='eachbunny' src='{{ $bunny->photo_url }}' alt='Photo of the bunny'>
    <ul>
        <li>sex: {{$bunny->sex}}</li>
        <li>breed: {{$bunny->breed}}</li>
        <li>dob: {{$bunny->dob}}</li>
        <li>adoption status: {{$bunny->adoption_status}}</li>
    </ul>
    <a class='right' href='/all/{{$bunny->id}}/edit'>Would like to adopt {{$bunny->name}}?</a><br>
    <a class='right' href='/all/{{$bunny->id}}/delete'>Delete adopted bunny's profile</a><br>
    <a class='right' href='/contact'>Need to know more of {{$bunny->name}}? Contact us!</a><br>
    <a class='right' href='/all'>Back</a>

    @if(isset($alert))
    <p>{{ $alert }}</p>
    @endif

@endsection