<div class="container">
    <nav class="navbar navbar-light navbar-toggleable-md">

        {{--<ul class="navbar-nav mr-auto mt-2 mt-md-0">--}}
            {{--Search--}}
        {{--</ul>--}}

        <div class="input-group col-md-12">
            <form class="form-inline" action="{{ route('search.index') }}">
                <input name="q" class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

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