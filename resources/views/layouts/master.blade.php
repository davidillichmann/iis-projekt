<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>

    <header>
        @include('includes.nav')
    </header>

    <div class="content-container">
        <div id="main" class="container" >

            @yield('content')

        </div>
    </div>


    <footer>
        @include('includes.footer')
    </footer>

</body>
</html>