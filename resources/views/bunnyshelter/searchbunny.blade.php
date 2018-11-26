@extends('layouts.master')

@section('content')

    <form method='GET' action='/search-bunny-process' id='search_bunny'>
        <label>Find a bunny you would like to adopt!</label>
        <br>

        <label>Breed (select one or more)</label><br>
        <input type='checkbox' name='breed1' value='NetherlandDwarf'>Netherland Dwarf<br>
        <input type='checkbox' name='breed2' value='Lop'>Lop<br>
        <input type='checkbox' name='breed3' value='Lionhead'>Lionhead<br>
        <input type='checkbox' name='breed4' value='Rex'>Rex<br>
        <input type='checkbox' name='breed5' value='Angora'>Angora<br>
        <input type='checkbox' name='breed6' value='JerseyWooly'>Jersey Wooly<br>
        <input type='checkbox' name='anybreed' value='Any'>Any Breed<br>
        <br>

        <label>Sex</label>
        <select name='buckOrDoe' form='sex_select'>
            <option value='buck'>Buck</option>
            <option value='doe'>Doe</option>
            <option value='both' selected>Either is fine</option>
        </select>
        <br><br>

        <label>Age (select one or more)</label><br>
        <input type='checkbox' name='age1' value='LessThan6Mons'>Less than 6 months<br>
        <input type='checkbox' name='age2' value='6MonsToOneYear'>6 months to 1 year old<br>
        <input type='checkbox' name='age3' value='OneToThreeYears'>One to three years old<br>
        <input type='checkbox' name='age5' value='OlderThanThree'>Older than three years old<br>
        <input type='checkbox' name='anyage' value='Any'>Any Age<br>
        <br>


        <input type='submit' value='Find the bunnies!'>
    </form>

@endsection