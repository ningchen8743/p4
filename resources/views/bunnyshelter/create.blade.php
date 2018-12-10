@extends('layouts.master')

@section('title')
    Add a new bunny to the archive
@endsection

@section('content')
    <p>If you find an abandoned bunny, please fill in his/hers information below. We are here to help!</p>
    @if($errors->any())
        <div class='error'>Please correct the errors below, all fields are required.</div>
    @endif

    <form method='POST' action='/all'>
        {{ csrf_field() }}

        <label for='name'>Name</label>
        <input type='text' name='name' id='name' value={{ old('name') }}>
        @include('errors.my_error', ['key' => 'name'])
        <br>

        <label for='sex'>Sex</label>
        <input type='text' name='sex' id='sex' value={{ old('sex') }}>
        @include('errors.my_error', ['key' => 'sex'])
        <br>

        <label for='dob'>DOB</label>
        <input type='text' name='dob' id='dob' value={{ old('dob') }}>
        @include('errors.my_error', ['key' => 'dob'])
        <br>

        <label for='cover_url'>Breed</label>
        <input type='text' name='breed' id='breed' value={{ old('breed') }}>
        @include('errors.my_error', ['key' => 'breed'])
        <br>

        <label for='adoption_status'>Adoption status (adoptable or adopted)</label>
        <input type='text' name='adoption_status' id='adoption_status' value={{ old('adoption_status') }}>
        @include('errors.my_error', ['key' => 'adoption_status'])
        <br>

        <label for='photo_url'>Photo url</label>
        <input type='text' name='photo_url' id='photo_url' value={{ old('photo_url') }}>
        @include('errors.my_error', ['key' => 'photo_url'])
        <br>

        <input type='submit' value='Add the record'>

    </form>


@endsection