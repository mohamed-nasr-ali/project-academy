<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('images/mainicon.png') }}">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--js-->
    <script src="../../public/js/gulpfile.js"></script>
    <style>
        body{
            padding-top: 75px;
        }
        .view{
            display: block;
            font-size: 15px;
            border: 3px solid #4c7689;
            padding: 5px;
            color: #000;
            text-align: center;
            margin: 5px;
        }
        .view:hover{
            background-color: #1e7d98;
            color: #FFF;
            text-decoration: none;
        }
    </style>
</head>

<body>
    @yield('nav')
    @yield('content')
    @yield('footer')
    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>