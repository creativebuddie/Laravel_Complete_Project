<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/scss/style.css') }}">
    <link href="{{ URL::asset('resources/assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

@if(session()->get('authId'))
    @include('admin.layout.sidebarLayout')
    @include('admin.layout.headerLayout')
    @yield('content')
    @include('admin.layout.footerLayout')

@else
    @yield('content')

@endif

</body>
</html>
