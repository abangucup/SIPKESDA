<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

</head>

<title>@yield('title')</title>
@include('layouts.partials.style')

<body>
    

    @include('layouts.partials.script')
</body>

</html>