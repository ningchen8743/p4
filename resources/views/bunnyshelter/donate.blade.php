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

    <form method='POST' action='/donate'>
        {{ csrf_field() }}

        <label for='value'>Or enter amount here</label>
        <input type='text' name='value' id='value'>
        @include('errors.my_error', ['key' => 'value'])
        <br>

        <input type='submit' value='Donate!'>

        <p>Below is your donation history:</p>
        @foreach($donations as $donationAmount)
            You donated: {{$donationAmount->amount}}<br>
        @endforeach

    </form>


@endsection