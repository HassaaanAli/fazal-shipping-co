<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Hassaan Ali">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="An onboarding website for the clients to manage their projects easily and efficiently.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <link rel="shortcut icon" href="{{ url('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('css/theme.min.css?ver=2.9.0') }}">

    @stack('styles')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar">
    <!-- app-root @s -->
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        @include('layouts.auth.header')

                        @yield('content')
                    </div>

                    @include('layouts.auth.footer')
                </div>
                <!-- content @e -->
            </div>
        </div>
    </div>
    <!-- app-root @e -->

    <script src="{{ url('js/bundle.js?ver=2.9.0') }}"></script>
    <script src="{{ url('js/scripts.js?ver=2.9.0') }}"></script>

    @stack('scripts')
</body>

</html>
