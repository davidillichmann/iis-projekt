<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>

<div class="container-fluid">
    <header>
        @include('includes.nav')
    </header>

    <div id="main" class="container">

        @yield('content')

    </div>

    <footer>
        @include('includes.footer')
    </footer>
</div>
</body>
</html>