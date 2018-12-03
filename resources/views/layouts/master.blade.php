<!DOCTYPE html>
<html lang='en'>

<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>
    <link href='/css/p4.css' type='text/css' rel='stylesheet'>
</head>

<div>

    @if(session('alert'))
        <div class='alert'>{{ session('alert') }}</div>
    @endif

    <header>
        <a href='/'><img src='/images/bunnyshelter.png' id='logo' alt='BunnyShelter Logo' width='100' height='120'></a>
        @include('modules.nav')
    </header>
    <br>

    <section>
        @yield('content')
    </section>

</div>

</html>