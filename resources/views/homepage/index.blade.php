<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('homepage.components.navbar')

    @yield('content')

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>

</html>
