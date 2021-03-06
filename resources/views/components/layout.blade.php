<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
<div class="container">
    @include('components._header')
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
