<ul class="nk-menu">
    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">Navigation</h6>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('dashboard') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
            <span class="nk-menu-text">Dashboard</span>
        </a>
    </li>
    @can('user.view')
        <li class="nk-menu-item">
            <a href="{{ route('users.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                <span class="nk-menu-text">Users</span>
            </a>
        </li>
    @endcan
    @can('campaign.view')
        <li class="nk-menu-item">
            <a href="{{ route('campaign.campaigns.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                <span class="nk-menu-text">Campaign Legacy</span>
            </a>
        </li>
    @endcan
    @can('campaign.view')
    <li class="nk-menu-item has-sub">
        <a href="javascript:void(0);" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
            <span class="nk-menu-text">Campaigns</span>
        </a>
        <ul class="nk-menu-sub" style="display: none;">
            <li class="nk-menu-item">
                <a href="{{ route('campaign.all-campaign') }}"  class="nk-menu-link">
                    <span class="nk-menu-text">All</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('campaign.awareness.index') }}"  class="nk-menu-link">
                    <span class="nk-menu-text">Awareness</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('campaign.traffic.index') }}"  class="nk-menu-link">
                    <span class="nk-menu-text">Traffic</span>
                </a>
            </li>
            <li class="nk-menu-item">
                <a href="{{ route('campaign.lead.index') }}"  class="nk-menu-link">
                    <span class="nk-menu-text">Lead</span>
                </a>
            </li>
        </ul><!-- .nk-menu-sub -->
    </li>
    @endcan
    @can('contact.view')
        <li class="nk-menu-item">
            <a href="{{ route('contacts.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-mail"></em></span>
                <span class="nk-menu-text">Contacts</span>
            </a>
        </li>
    @endcan
</ul>
