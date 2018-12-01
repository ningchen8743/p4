@extends('layouts.master')

@section('title')
    Add a new bunny to the archive
@endsection

@section('content')
    <h1>Fill in bunny's information below</h1>

    @if($errors->any())
        <div class='error'>Please fill all the fields!</div>
    @endif

    <form method='POST' action='/all'>
        {{ csrf_field() }}

        <label for='name'>Name</label>
        <input type='text' name='name' id='name'><br>

        <label for='sex'>Sex</label>
        <input type='text' name='sex' id='sex'><br>

        <label for='dob'>DOB</label>
        <input type='text' name='dob' id='dob'><br>

        <label for='cover_url'>Breed</label>
        <input type='text' name='breed' id='breed'><br>

        <label for='color'>Color</label>
        <input type='text' name='color' id='color'><br>

        <label for='photo_url'>Photo url</label>
        <input type='text' name='photo_url' id='photo_url'><br>

        <input type='submit' value='Add the record'>

    </form>


@endsection