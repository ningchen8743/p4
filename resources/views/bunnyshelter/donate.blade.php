@extends('layouts.master')

@section('title')
    Donation for the bunny shelter
@endsection

@section('content')
    <h1>Please help build our community, thank you! ^_^</h1>
    <p>Every penny will be put to good use. Your donation supports the work of rabbit rescue, education, and advocacy.</p>

    <form class='donation' method='POST' action='/donate'>
        {{ csrf_field() }}

        <label>Select the amount you would like to donate below:</label><br>
        <input type='radio' name='donationAmount' value='5'>$5<br>
        <input type='radio' name='donationAmount' value='10'>$10<br>
        <input type='radio' name='donationAmount' value='25'>$25<br>
        <input type='radio' name='donationAmount' value='50'>$50<br>
        <br>

        <input type='submit' value='Donate!'>

        <ul>Below is your donation history:
        @foreach($donations as $donationAmount)
            <li>You donated: ${{$donationAmount->amount}}</li>
        @endforeach
        </ul>
    </form>


@endsection