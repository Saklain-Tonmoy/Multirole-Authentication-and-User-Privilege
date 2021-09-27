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
    <div class="wrapper">
        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')

        @yield('content')

        @include('admin.layouts.footer')
    </div>

    <script src="{{asset('js/app.js')}}" defer></script>
    <!-- <script src="{{asset('js/dataTables.js')}}"></script> -->
        
    @stack('scripts')
</body>
</html>