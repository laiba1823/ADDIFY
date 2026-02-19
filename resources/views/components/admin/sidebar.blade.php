<aside class="sidebar">
    <div class="sidebar__backdrop"></div>
    <div class="sidebar__container">
        <div class="sidebar__top">
            <div class="container container--sm">
                <a class="sidebar__logo" href="{{ route('public.home') }}">
                    <div class="sidebar__logo-text"> Addify</div>
                </a>
            </div>
        </div>
        <div class="sidebar__content" data-simplebar="data-simplebar">
            <nav class="sidebar__nav">
                <ul class="sidebar__menu">

                    <li class="sidebar__menu-item">
                        <a class="sidebar__link " href="{{ route('admin.dashboard') }}" aria-expanded="true">
                            <span class="sidebar__link-icon">
                                <i class="fa-solid fa-gauge"></i>
                            </span>
                            <span class="sidebar__link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar__menu-item">
                        <a class="sidebar__link" data-toggle="collapse" data-target="#vendors"
                            aria-expanded="false">
                            <span class="sidebar__link-icon">
                                <i class="fa-solid fa-laptop"></i>
                            </span>
                            <span class="sidebar__link-text">Vendor</span>
                            <span class="sidebar__link-arrow">
                                <svg class="icon-icon-keyboard-down">
                                    <use xlink:href="#icon-keyboard-down"></use>
                                </svg></span>
                        </a>

                        <div class="collapse" id="vendors">
                            <ul class="sidebar__collapse-menu">
                                <li class="sidebar__menu-item">
                                    <a class="sidebar__link" href="{{ route("admin.vendors.index") }}"><span
                                            class="sidebar__link-signal"></span><span
                                            class="sidebar__link-text">Dashboard</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar__menu-item">
                        <a class="sidebar__link" data-toggle="collapse" data-target="#companies"
                            aria-expanded="false">
                            <span class="sidebar__link-icon">
                                <i class="fa-solid fa-building"></i>
                            </span>
                            <span class="sidebar__link-text">Buyers</span>
                            <span class="sidebar__link-arrow">
                                <svg class="icon-icon-keyboard-down">
                                    <use xlink:href="#icon-keyboard-down"></use>
                                </svg></span>
                        </a>

                        <div class="collapse" id="companies">
                            <ul class="sidebar__collapse-menu">
                                <li class="sidebar__menu-item">
                                    <a class="sidebar__link" href="{{ route("admin.buyers.index") }}"><span
                                            class="sidebar__link-signal"></span><span
                                            class="sidebar__link-text">Dashboard</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar__menu-item">
                        <a class="sidebar__link" data-toggle="collapse" data-target="#finances"
                            aria-expanded="false">
                            <span class="sidebar__link-icon">
                                <i class="fa-solid fa-coins"></i>
                            </span>
                            <span class="sidebar__link-text">Finances</span>
                            <span class="sidebar__link-arrow">
                                <svg class="icon-icon-keyboard-down">
                                    <use xlink:href="#icon-keyboard-down"></use>
                                </svg></span>
                        </a>

                        <div class="collapse" id="finances">
                            <ul class="sidebar__collapse-menu">
                                <li class="sidebar__menu-item">
                                    <a class="sidebar__link" href="{{ route("admin.finances.index") }}">
                                        <span class="sidebar__link-signal"></span>
                                        <span class="sidebar__link-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="sidebar__menu-item">
                                    <a class="sidebar__link" href="{{ route("admin.finances.deposit") }}">
                                        <span class="sidebar__link-signal"></span>
                                        <span class="sidebar__link-text">Deposit Money</span>
                                    </a>
                                </li>
                                <li class="sidebar__menu-item">
                                    <a class="sidebar__link" href="{{ route("admin.finances.withdraw") }}">
                                        <span class="sidebar__link-signal"></span>
                                        <span class="sidebar__link-text">Withdraw Money</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>
