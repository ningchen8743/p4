@extends('layouts.master')

@section('content')

    <form method='GET' action='/search-bunny-process' id='search_bunny'>
        <label>Find a bunny you would like to adopt!</label>
        <br>

        <label>Breed (select one or more)</label><br>
        <input type='checkbox' name='breed[]' value='Netherland Dwarf'>Netherland Dwarf<br>
        <input type='checkbox' name='breed[]' value='Lop'>Lop<br>
        <input type='checkbox' name='breed[]' value='Lionhead'>Lionhead<br>
        <input type='checkbox' name='breed[]' value='Rex'>Rex<br>
        <input type='checkbox' name='breed[]' value='Angora'>Angora<br>
        <input type='checkbox' name='breed[]' value='Jersey Wooly'>Jersey Wooly<br>
        <br>

        <label>Sex</label>
        <select name='buckOrDoe' form='search_bunny' value='both'>
            <option value='buck'>Buck</option>
            <option value='doe'>Doe</option>
            <option value='both'>Either is fine</option>
        </select>
        <br><br>

        <label>Age (select one or more)</label><br>
            <input type='radio' name='age' value='less_than_6_months'>Less than 6 months<br>
            <input type='radio' name='age' value='6_months_to_1_year'>6 months to 1 year<br>
            <input type='radio' name='age' value='more_than_1_year'>More than 1 year<br>
        <br>


        <input type='submit' value='Find the bunnies!'>
    </form>

    @if(isset($bunnies))
        @foreach($bunnies as $bunny)
                <a href='/all/{{$bunny->id}}'>{{$bunny->name}}</a><br>
                <img src='{{ $bunny->photo_url }}' alt='bunny profile photo'><br><br>
        @endforeach
    @endif


@endsection