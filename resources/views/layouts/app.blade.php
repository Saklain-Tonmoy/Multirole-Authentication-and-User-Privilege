<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
</head>
<body class="sidebar-mini">
    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>