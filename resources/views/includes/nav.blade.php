<div class="container">
    <nav class="navbar navbar-light navbar-toggleable-md">

        <ul class="navbar-nav mr-auto mt-2 mt-md-0">
            Search
        </ul>

        <ul class="navbar-nav">

            @if(App::isLocale('en'))
                <li class="nav-item">
                    <a class="nav-link" href="#">EN</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="#">CZ</a>
                </li>
            @endif

            @if (Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link " href="/logout">Logout</a>
                </li>
            @endif
        </ul>
    </nav>
</div>