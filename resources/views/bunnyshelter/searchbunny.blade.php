@extends('layouts.master')

@section('title')
    Find a bunny you like
@endsection

@section('content')

    <form class='searchbunny' method='GET' action='/search-bunny-process' id='search_bunny'>
        <label>Find a bunny you would like to adopt!</label>
        <br>

        <ul>Your search criteria:
        @if(session()->has('breeds_cache'))
            <li>breeds: {{  session()->get('breeds_cache') }}</li>
        @endif

        @if(session()->has('buckOrDoe_cache'))
            <li>sex: {{  session()->get('buckOrDoe_cache') }}</li>
        @endif

        @if(session()->has('age_range_cache'))
            <li>age: {{  session()->get('age_range_cache') }}</li>
        @endif

        @if(session()->has('colorsToSearch_cache'))
            <li>colors: {{  session()->get('colorsToSearch_cache') }}</li>
        @endif
        </ul>

        <label>Breed (select one or more)</label><br>
        <input type='checkbox' name='breed[]' value='Netherland Dwarf'>Netherland Dwarf<br>
        <input type='checkbox' name='breed[]' value='Lop'>Lop<br>
        <input type='checkbox' name='breed[]' value='Lionhead'>Lionhead<br>
        <input type='checkbox' name='breed[]' value='Rex'>Rex<br>
        <br>

        <label>Sex</label>
        <select name='buckOrDoe' form='search_bunny'>
            <option value='buck'>Buck</option>
            <option value='doe'>Doe</option>
            <option value='Either is fine' selected>Either is fine</option>
        </select>
        <br><br>

        <label>Age (select one)</label><br>
            <input type='radio' name='age' value='Younger than 1 year old'>Younger than 1 year<br>
            <input type='radio' name='age' value='Older than 1 year old'>Older than 1 year<br>
            <input type='radio' name='age' value='Any age'>Any age<br>
        <br>

        <label>Color (select one or more)</label><br>
        @foreach($colors as $color)
            <input type='checkbox' name='color[]' value={{ $color->name }}>{{ $color->name }}<br>
        @endforeach
        <br>

        <input type='submit' value='Find the bunnies!'>
    </form>

    <div class='my-image-row'>
    @if(isset($bunnies))
        @foreach($bunnies as $bunny)
                @include('bunnyshelter._bunny')
        @endforeach
    @endif
    </div>

@endsection