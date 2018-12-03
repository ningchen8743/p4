<nav id='customNav'>
    <ul id='horizontalNavUL'>
        @foreach(config('app.nav') as $link => $label)
            <li class='horizontalNavItem'>>
                @if(Request::is(substr($link, 1)))
                    {{ $label }}
                @else
                    <a href='{{ $link }}'>{{ $label }}</a>
                @endif
            </li>
        @endforeach
    </ul>
</nav>