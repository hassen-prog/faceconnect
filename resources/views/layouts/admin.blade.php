<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FaceConnect') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cc2c1873c0.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('includes.header_admin') <!-- Include the header -->

        <main class="py-4 adminfit">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/events-admin.js') }}"></script>
    <script>
        // JavaScript to toggle the dropdown menu
        document.getElementById('eventDropdown').addEventListener('click', function() {
            const dropdownMenu = this.querySelector('.dropdown-menu');
            dropdownMenu.classList.toggle('show');
        });
    </script>
</body>

</html>
