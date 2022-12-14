<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
</head>

<body>
    @include('homepage.components.navbar')

    @yield('content')

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    @stack('scripts')
</body>

</html>
