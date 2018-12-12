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
        <li>adoption status: {{$bunny->adoption_status}}</li>
    </ul>
    <a href='/all/{{$bunny->id}}/edit'>Modify {{$bunny->name}}'s profile</a><br>
    <a href='/all/{{$bunny->id}}/delete'>Delete adopted bunny's profile</a><br>
    <a href='/contact'>Need to know more of {{$bunny->name}}? Contact us!</a><br>
    <a href='/all'>Back</a>

@endsection