@extends('layouts.master')

@section('title')
    Confirm deletion
@endsection

@section('content')
    <h2>Confirm deletion</h2>

    <p>Are you sure you want to delete <strong>{{$bunny->name}}</strong>'s profile?</p>

    <img class='eachbunny' src='{{ $bunny->photo_url }}' alt='Photo of the bunny'>

    <form method='POST' action='/all/{{$bunny->id}}'>
        {{ method_field('delete') }}
        {{csrf_field()}}
        <input type='submit' value='Yes, delete the profile.'>
    </form>

    <a class='center' href='/all/{{$bunny->id}}'> No, I want to keep bunny in the archive!</a>

@endsection