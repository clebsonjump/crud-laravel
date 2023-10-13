<html>

<head>
    @extends('Layouts.head')
</head>

<body>

    @include('Layouts.nav')
    <div class="container">
        @yield('content')
    </div>

</body>

</html>