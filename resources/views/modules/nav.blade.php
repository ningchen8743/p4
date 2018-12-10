<nav id='customNav'>
    <ul id='horizontalNavUL'>
        @foreach(config('app.nav'.Auth::check()) as $link => $label)
            <li class='horizontalNavItem'>>
                @if(Request::is(substr($link, 1)))
                    {{ $label }}
                @else
                    <a href='{{ $link }}'>{{ $label }}</a>
                @endif
            </li>
        @endforeach

        @if(Auth::check())
            <li>
                <form method='POST' id='logout' action='/logout'>
                    {{ csrf_field() }}
                    <a href='#' onClick='document.getElementById("logout").submit();'>Logout {{ $user->name }}</a>
                </form>
            </li>
        @endif
    </ul>
</nav>