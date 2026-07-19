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

    <div style="display:flex; min-height:100vh;">

        @include('layouts.sidebar')

        <div style="flex:1; padding:30px;">

            @yield('content')

        </div>

    </div>

    @include('layouts.footer')

    @include('layouts.scripts')

</body>
</html>