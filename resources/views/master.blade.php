<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') - Gestion Des Taches</title>
    @include('includes.head')
</head>
<body class="{{ $body_class ?? ''}}">
    @include('includes.header')
    @include('includes.bare-left')

    @yield('content')

@include('includes.scripts')
@yield('script')
@include('includes.footer')
</body>
</html>
