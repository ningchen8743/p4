@extends('layouts.master')

@section('title')
    Adopt a bunny in the archive
@endsection

@section('content')
    <h1>Are you sure you want to adopt {{$bunny->name}}?</h1>
    <p>If you do, please change adoption status to adopted!^_^</p>

    @if($errors->any())
        <div class='error'>Please correct the errors below, all fields are required.</div>
    @endif

    <h1>{{ $bunny->name }}</h1>
    <img class='eachbunny' src='{{ $bunny->photo_url }}' alt='Photo of the bunny'>
    <ul>
        <li>sex: {{$bunny->sex}}</li>
        <li>breed: {{$bunny->breed}}</li>
        <li>dob: {{$bunny->dob}}</li>
    </ul>
    <form method='POST' action='/all/{{ $bunny->id }}'>
        {{ method_field ('put') }}
        {{ csrf_field() }}

        <label>Adoption status</label>
        <select name='adoptableOrAdopted' value='adoptable'>
            <option value='adoptable'>adoptable</option>
            <option value='adopted'>adopted</option>
        </select><br>

        <input type='submit' value='Adopt the bunny!'>

    </form>


@endsection