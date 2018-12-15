@extends('layouts.master')

@section('title')
    Donation for the bunny shelter
@endsection

@section('content')
    <h1>Please help build our community!</h1>
    <h2>Please select the amount you would like to donate, thank you!</h2>
    @if($errors->any())
        <div class='error'>Please correct the errors below.</div>
    @endif

    <form class='donation' method='POST' action='/donate'>
        {{ csrf_field() }}

        <label>Select the amount you would like to donate below:</label><br>
        <input type='radio' name='donationAmount' value='5'>$5<br>
        <input type='radio' name='donationAmount' value='10'>$10<br>
        <input type='radio' name='donationAmount' value='25'>$25<br>
        <input type='radio' name='donationAmount' value='50'>$50<br>
        <br>

        <label for='value'>Or enter amount here</label>
        <input type='text' name='amount' id='amount'>
        @include('errors.my_error', ['key' => 'amount'])
        <br>

        <input type='submit' value='Donate!'>

        <p>Below is your donation history:</p>
        @foreach($donations as $donationAmount)
            You donated: ${{$donationAmount->amount}}<br>
        @endforeach

    </form>


@endsection