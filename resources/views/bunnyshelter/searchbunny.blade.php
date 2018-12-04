@extends('layouts.master')

@section('content')

    <form method='GET' action='/search-bunny-process' id='search_bunny'>
        <label>Find a bunny you would like to adopt!</label>
        <br>

        <label>Breed (select one or more)</label><br>
        <input type='checkbox' name='breed' value='NetherlandDwarf'>Netherland Dwarf<br>
        <input type='checkbox' name='breed' value='Lop'>Lop<br>
        <input type='checkbox' name='breed' value='Lionhead'>Lionhead<br>
        <input type='checkbox' name='breed' value='Rex'>Rex<br>
        <input type='checkbox' name='breed' value='Angora'>Angora<br>
        <input type='checkbox' name='breed' value='JerseyWooly'>Jersey Wooly<br>
        <br>

        <label>Sex</label>
        <select name='buckOrDoe' form='search_bunny' value='both'>
            <option value='buck' selected>Buck</option>
            <option value='doe'>Doe</option>
            <option value='both'>Either is fine</option>
{{--            @if ($buckOrDoe == 'buck')
                <option value='buck' selected>Buck</option>
                <option value='doe'>Doe</option>
                <option value='both'>Either is fine</option>
            @elseif ($buckOrDoe == 'doe')
                <option value='buck'>Buck</option>
                <option value='doe' selected>Doe</option>
                <option value='both'>Either is fine</option>
            @else
                <option value='buck'>Buck</option>
                <option value='doe' >Doe</option>
                <option value='both' selected>Either is fine</option>
            @endif--}}
        </select>
        <br><br>

        <label>Age (select one or more)</label><br>
        <input type='checkbox' name='age' value='LessThan6Mons'>Less than 6 months<br>
        <input type='checkbox' name='age' value='6MonsToOneYear'>6 months to 1 year old<br>
        <input type='checkbox' name='age' value='OneToThreeYears'>1 to 3 years old<br>
        <input type='checkbox' name='age' value='OlderThanThree'>Older than 3 years old<br>
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