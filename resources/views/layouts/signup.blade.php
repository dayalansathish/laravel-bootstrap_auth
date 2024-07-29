<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script>
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
    @include('includes.style')
</head>

<body id="kt_body" class="auth-bg">

        @yield('sign-up-content')

@include('includes.script')
<!-- <script src="assets/js/custom/authentication/sign-up/general.js"></script> -->

</body>
</html>