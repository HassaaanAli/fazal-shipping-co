<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="TRS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="An onboarding website for the clients to manage their projects easily and efficiently.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <link rel="shortcut icon" href="{{ url('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('css/theme.min.css?ver=2.9.0') }}">
    <link rel="stylesheet" href="{{ url('css/common.css') }}">

    @stack('styles')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar">
    <!-- app-root @s -->
    <div class="nk-app-root">
        <div class="nk-main ">
            @include('layouts.sidebar')

            <div class="nk-wrap ">
                @include('layouts.header')

                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">

                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->

                @include('layouts.footer')
            </div>
        </div>
    </div>
    <!-- app-root @e -->

    <!-- Ajax modal @s -->
    <div class="modal fade zoom bd-example-modal-lg" id="ajax-modal" data-backdrop="static" data-keyboard="false"
        tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <a href="javascript:void(0);" class="close" modal-close>
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-lg">
                    <div id="content"></div>
                    <div id="spinner">
                        <div class="modal-body text-center">
                            <div class="spinner spinner-border text-center" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ajax modal @e -->

    <script src="{{ url('js/bundle.js?ver=2.9.0') }}"></script>
    <script src="{{ url('js/scripts.js?ver=2.9.0') }}"></script>
    <script src="{{ url('js/axios-1.6.2.min.js') }}"></script>
    <script src="{{ url('js/utilities.js') }}"></script>

    <script>
        $.extend(true, $.fn.dataTable.defaults, {
            oLanguage: {
                sSearch: '',
                sSearchPlaceholder: 'Type in to Search',
                sLengthMenu: 'Show _MENU_',
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
