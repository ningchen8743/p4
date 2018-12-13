@extends('layouts.master')

@section('content')

    <h1>To obtain further access, please log in here</h1>

    <p>Don't have an account? <a href='/register'>Register here...</a></p><br>

    <form method='POST' action='{{ route('login') }}'>

        {{ csrf_field() }}

        <label for='email'>E-Mail Address</label>
        <input id='email' type='email' name='email' value='{{ old('email') }}' required autofocus>
        <br><br>

        <label for='password'>Password</label>
        <input id='password' type='password' name='password' required>
        <br><br>

        <label>
            <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>
        <br><br>

        <input type='submit' value='Login'><br>

        <a href='{{ route('password.request') }}'>Forgot Your Password?</a>

    </form>

@endsection
