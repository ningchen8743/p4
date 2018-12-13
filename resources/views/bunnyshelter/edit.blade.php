@extends('layouts.master')

@section('title')
    Edit a bunny in the archive
@endsection

@section('content')
    <h1>Edit bunny's information below</h1>

    @if($errors->any())
        <div class='error'>Please correct the errors below, all fields are required.</div>
    @endif

    <form method='POST' action='/all/{{ $bunny->id }}'>
        {{ method_field ('put') }}
        {{ csrf_field() }}

        <label for='name'>Name</label>
        <input type='text' name='name' id='name' value={{ old('name', $bunny->name) }}>
        @include('errors.my_error', ['key' => 'name'])
        <br><br>

        <label for='sex'>Sex</label>
        <input type='text' name='sex' id='sex' value={{ old('sex', $bunny->sex) }}>
        @include('errors.my_error', ['key' => 'sex'])
        <br><br>

        <label for='dob'>DOB</label>
        <input type='text' name='dob' id='dob' value={{ old('dob', $bunny->dob) }}>
        @include('errors.my_error', ['key' => 'dob'])
        <br><br>

        <label for='cover_url'>Breed</label>
        <input type='text' name='breed' id='breed' value={{ old('breed', $bunny->breed) }}>
        @include('errors.my_error', ['key' => 'breed'])
        <br><br>

        <label for='adoption_status'>Adoption status ("adoptable" or "adopted")</label>
        <input type='text' name='adoption_status' id='adoption_status' value={{ old('adoption_status', $bunny->adoption_status) }}>
        @include('errors.my_error', ['key' => 'adoption_status'])
        <br><br>

        <label for='photo_url'>Photo url</label>
        <input type='text' name='photo_url' id='photo_url' value={{ old('photo_url', $bunny->photo_url) }}>
        @include('errors.my_error', ['key' => 'photo_url'])
        <br>

        <input type='submit' value='Submit changes'>

    </form>


@endsection