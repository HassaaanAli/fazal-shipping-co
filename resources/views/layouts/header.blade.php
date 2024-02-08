<!-- main header @s -->
<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="javascript:void(0);" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
                    <em class="icon ni ni-menu"></em>
                </a>
            </div>

            <div class="nk-header-brand d-xl-none">
                <a href="javascript:void(0);" class="logo-link">
                    <img class="logo-light logo-img" src="{{ url('images/logo.png') }}" srcset="{{ url('images/logo2x.png') }} 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{ url('images/logo-dark.png') }}" srcset="{{ url('images/logo-dark2x.png') }} 2x" alt="logo-dark">
                </a>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    {{-- <li class="dropdown notification-dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                            <div class="icon-status icon-status-danger">
                                <em class="icon ni ni-bell"></em>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                <a href="javascript:void(0);">Mark All as Read</a>
                            </div>

                            <div class="dropdown-body">
                                <div class="nk-notification">
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-foot center">
                                <a href="javascript:void(0);">View All</a>
                            </div>
                        </div>
                    </li> --}}

                    {{-- <li class="dropdown language-dropdown mr-n1">
                        <a href="javascript:void(0);" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                            <div class="user-avatar sm border border-light">
                                <img src="{{ url('images/flags/english-sq.png') }}" alt="">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-s1">
                            <ul class="language-list">
                                <li>
                                    <a href="javascript:void(0);" class="language-item">
                                        <img src="{{ url('images/flags/english.png') }}" alt="" class="language-flag">
                                        <span class="language-name">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="language-item">
                                        <img src="{{ url('images/flags/italy.png') }}" alt="" class="language-flag">
                                        <span class="language-name">Italian</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                    <li class="dropdown user-dropdown mr-n1">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar auth-avatar sm">{!! getAvatarHtml() !!}</div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status"></div>
                                    <div class="user-name dropdown-indicator auth-name">{{ auth()->user()->name }}</div>
                                </div>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar auth-avatar">{!! getAvatarHtml() !!}</div>
                                    <div class="user-info">
                                        <span class="lead-text auth-name">{{ auth()->user()->name }}</span>
                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route('profile.edit') }}">
                                            <em class="icon ni ni-user-alt"></em>
                                            <span>View Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dark-switch" href="javascript:void(0);" data-url="{{ route('settings.store') }}">
                                            <em class="icon ni ni-moon"></em>
                                            <span>Dark Mode</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a href="javascript:void(0);" onclick="event.preventDefault();this.closest('form').submit();">
                                                <em class="icon ni ni-signout"></em>
                                                <span>Sign out</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- main header @e -->
