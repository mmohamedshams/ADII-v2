<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'ADII v2')</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

    @include('layouts.navbar')

    @include('layouts.sidebar')

    <main class="container mt-4">

        @yield('content')

    </main>

    @include('layouts.footer')

    @include('layouts.scripts')

</body>

</html>