<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

</head>

<title>@yield('title')</title>

@include('layouts.partials.style')

<body>

    <div id="app">

        @include('layouts.partials.sidebar')

        <div id="main">
            @include('layouts.partials.header')

            @yield('heading')

            @yield('content')

            @include('layouts.partials.footer')
        </div>
    </div>

    @include('layouts.partials.script')

</body>

</html>