<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-dark {{ isset($isCompactSidebar) ? 'is-compact' : '' }}" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="javascript:void(0);" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                <em class="icon ni ni-arrow-left"></em>
            </a>
            <a href="javascript:void(0);" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex {{ isset($isCompactSidebar) ? 'compact-active' : '' }}"
                data-target="sidebarMenu" id="toggle-sidebar" data-url="{{ route('settings.store') }}" data-value="{{ !isset($isCompactSidebar) }}">
                <em class="icon ni ni-menu"></em>
            </a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="javascript:void(0);" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ url('images/logo.png') }}" srcset="{{ url('images/logo2x.png') }} 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{ url('images/logo-dark.png') }}" srcset="{{ url('images/logo-dark2x.png') }} 2x" alt="logo-dark">
            </a>
        </div>
    </div>

    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>

                @include('layouts.navigation')

            </div>
        </div>
    </div>
</div>
<!-- sidebar @e -->
