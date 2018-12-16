<!DOCTYPE html>
<html lang='en'>

<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>
    <link href='/css/p4.css' type='text/css' rel='stylesheet'>
</head>


<div>

    <header>
        <a href='/'><img src='/images/bunnyshelter1.png' id='logo' alt='BunnyShelter Logo'  height='120'></a>
    </header>

    @include('modules.nav')

    <section>
        <div class='alert'>
            @if(isset($alert))
                <div class='alert'>{{ $alert }}</div>
            @endif
        </div>
        @yield('content')
    </section>



</div>

</html>