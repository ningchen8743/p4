@extends('layouts.master')

@section('content')

    <form class='searchbunny' method='GET' action='/search-bunny-process' id='search_bunny'>
        <label>Find a bunny you would like to adopt!</label>
        <br>

        <label>Breed (select one or more)</label><br>
        <input type='checkbox' name='breed[]' value='Netherland Dwarf'>Netherland Dwarf<br>
        <input type='checkbox' name='breed[]' value='Lop'>Lop<br>
        <input type='checkbox' name='breed[]' value='Lionhead'>Lionhead<br>
        <input type='checkbox' name='breed[]' value='Rex'>Rex<br>
        <br>

        <label>Sex</label>
        <select name='buckOrDoe' form='search_bunny' value='both'>
            <option value='buck'>Buck</option>
            <option value='doe'>Doe</option>
            <option value='both'>Either is fine</option>
        </select>
        <br><br>

        <label>Age (select one)</label><br>
            <input type='radio' name='age' value='less_than_1_year'>Younger than 1 year<br>
            <input type='radio' name='age' value='more_than_1_year'>Older than 1 year<br>
            <input type='radio' name='age' value='any'>Any<br>
        <br>

        {{--<ul>
        @foreach($colors as $colorId => $colorName)
            <li><label><input type='checkbox' name='colors[]' value='{{ $colorId }}'>{{ $colorName }}</label></li>
        @endforeach
        </ul>--}}

        <input type='submit' value='Find the bunnies!'>
    </form>

    <div>
        @if(isset($age_range))
            {{ $age_range }}
        @endif
    </div>

    <div class='img-with-text'>
    @if(isset($bunnies))
        @foreach($bunnies as $bunny)
                @include('bunnyshelter._bunny')
                <a href='/all/{{$bunny->id}}/edit'>Adopt {{$bunny->name}}</a>
        @endforeach
    @endif
    </div>


@endsection