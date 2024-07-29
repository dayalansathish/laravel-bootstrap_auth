<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('includes.style')

</head>

<body id="kt_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on">

    <div class="d-flex flex-column flex-root">

        <div class="page d-flex flex-row flex-column-fluid">
            @include('includes.sidebar')

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                @include('includes.header')

                <div class="content d-flex flex-column flex-column-fluid " id="kt_content">

                    <div class="post d-flex flex-column-fluid" id="kt_post">


                        @yield('content-page')

                    </div>
                </div>

                @include('includes.footer')

            </div>

        </div>

    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
    </div>

    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }

        document.addEventListener('DOMContentLoaded', function () {
            var currentYear = new Date().getFullYear();
            document.getElementById('currentYear').textContent = currentYear;
            // console.log(currentYear);
        });

    </script>

    @include('includes.script')
</body>


</html>