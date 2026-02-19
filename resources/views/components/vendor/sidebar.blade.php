<aside class="sidebar">
    <div class="sidebar__backdrop"></div>
    <div class="sidebar__container">
        <div class="sidebar__top">
            <div class="container container--sm">
                <a class="sidebar__logo" href="{{ route('public.home') }}">
                    <div class="sidebar__logo-text"> Billbaords</div>
                </a>
            </div>
        </div>
        <div class="sidebar__content" data-simplebar="data-simplebar">
            <nav class="sidebar__nav">
                <ul class="sidebar__menu">

                    <li class="sidebar__menu-item">
                        <a class="sidebar__link " href="{{ route('vendors.dashboard') }}" aria-expanded="true">
                            <span class="sidebar__link-icon">
                                <i class="fa-solid fa-gauge"></i>
                            </span>
                            <span class="sidebar__link-text">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar__menu-item">
                        <a class="sidebar__link" data-toggle="collapse" data-target="#vendors"
                            aria-expanded="false">
                            <span class="sidebar__link-icon">
                                <i class="fa-solid fa-laptop"></i>
                            </span>
                            <span class="sidebar__link-text">Vendors</span>
                            <span class="sidebar__link-arrow">
                                <svg class="icon-icon-keyboard-down">
                                    <use xlink:href="#icon-keyboard-down"></use>
                                </svg></span>
                        </a>

                        <div class="collapse" id="vendors">
                            <ul class="sidebar__collapse-menu">
                                <li class="sidebar__menu-item">
                                    <a class="sidebar__link" href="products.html"><span
                                            class="sidebar__link-signal"></span><span
                                            class="sidebar__link-text">Products</span></a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                    {{-- <li class="sidebar__menu-item">
                        <a class="sidebar__link" data-toggle="collapse" data-target="#buyers"
                            aria-expanded="false">
                            <span class="sidebar__link-icon">
                                <i class="fa-solid fa-building"></i>
                            </span>
                            <span class="sidebar__link-text">buyers</span>
                            <span class="sidebar__link-arrow">
                                <svg class="icon-icon-keyboard-down">
                                    <use xlink:href="#icon-keyboard-down"></use>
                                </svg></span>
                        </a>

                        <div class="collapse" id="buyers">
                            <ul class="sidebar__collapse-menu">
                                <li class="sidebar__menu-item">
                                    <a class="sidebar__link" href="products.html"><span
                                            class="sidebar__link-signal"></span><span
                                            class="sidebar__link-text">Products</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>--}}
                    <li class="sidebar__menu-item">
                        <a class="sidebar__link" data-toggle="collapse" data-target="#billboards"
                            aria-expanded="false">
                            <span class="sidebar__link-icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </span>
                            <span class="sidebar__link-text">Billboards</span>
                            <span class="sidebar__link-arrow">
                                <svg class="icon-icon-keyboard-down">
                                    <use xlink:href="#icon-keyboard-down"></use>
                                </svg>
                            </span>
                        </a>

                        <div class="collapse" id="billboards">
                            <ul class="sidebar__collapse-menu">
                                <li class="sidebar__menu-item">
                                    <a class="sidebar__link" href="{{ route("vendors.billboards.index") }}">
                                        <span class="sidebar__link-signal"></span>
                                        <span class="sidebar__link-text">Dashboard</span>
                                    </a>
                                    <a class="sidebar__link" href="{{ route("vendors.billboards.create") }}">
                                        <span class="sidebar__link-signal"></span>
                                        <span class="sidebar__link-text">Add New BillBoard</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li> 

                    <li class="sidebar__menu-item">
                        <a class="sidebar__link" data-toggle="collapse" data-target="#orders"
                            aria-expanded="false">
                            <span class="sidebar__link-icon">
                                <i class="fa-solid fa-square-poll-horizontal"></i>
                            </span>
                            <span class="sidebar__link-text">Orders</span>
                            <span class="sidebar__link-arrow">
                                <svg class="icon-icon-keyboard-down">
                                    <use xlink:href="#icon-keyboard-down"></use>
                                </svg>
                            </span>
                        </a>

                        <div class="collapse" id="orders">
                            <ul class="sidebar__collapse-menu">
                                <li class="sidebar__menu-item">
                                    <a class="sidebar__link" href="{{route("vendors.orders.index")}}"><span
                                            class="sidebar__link-signal"></span><span
                                            class="sidebar__link-text">Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar__menu-item">
                        <a class="sidebar__link" data-toggle="collapse" data-target="#finances"
                            aria-expanded="false">
                            <span class="sidebar__link-icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </span>
                            <span class="sidebar__link-text">Finances</span>
                            <span class="sidebar__link-arrow">
                                <svg class="icon-icon-keyboard-down">
                                    <use xlink:href="#icon-keyboard-down"></use>
                                </svg>
                            </span>
                        </a>

                        <div class="collapse" id="finances">
                            <ul class="sidebar__collapse-menu">
                                <li class="sidebar__menu-item">
                                    <a class="sidebar__link" href="{{ route("vendors.finances.index") }}">
                                        <span class="sidebar__link-signal"></span>
                                        <span class="sidebar__link-text">Dashboard</span>
                                    </a>
                                    <a class="sidebar__link" href="{{ route("vendors.finances.withdraw") }}">
                                        <span class="sidebar__link-signal"></span>
                                        <span class="sidebar__link-text">Withdraw</span>
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
