
<header class="header">
    <div class="header__inner">
        <div class="container-fluid">
            <div class="header__row row justify-content-between">
                <div class="header__col-right col d-flex align-items-center">
                    <div class="container container--sm">
                        <a class="sidebar__logo" href="{{ route('admin.dashboard') }}">
                            <div class="sidebar__logo-text"> Admin</div>
                        </a>
                    </div>
                    <div class="header__profile dropdown">
                        <a class="header__profile-toggle dropdown__toggle" href="#"
                            data-toggle="dropdown">
                            <div class="header__profile-image">
                                <span class="header__profile-image-text">MA</span>
                                <img src=" {{ asset($admin->img) }} " alt="#" />
                            </div>
                            <div class="header__profile-text">
                                <span>{{$admin->name}}</span>
                            </div>
                            <span class="icon-arrow-down">
                                <svg class="icon-icon-arrow-down">
                                    <use xlink:href="#icon-arrow-down"></use>
                                </svg>
                            </span>
                        </a>


                        <div class="profile-dropdown dropdown-menu dropdown-menu--right">
                            <a class="profile-dropdown__item dropdown-menu__item" href="{{ route("admin.profile") }}"
                                tabindex="0"><span class="profile-dropdown__icon">
                                    <svg class="icon-icon-user">
                                        <use xlink:href="#icon-user"></use>
                                    </svg></span><span>My Profile</span>
                            </a>
                            <div class="dropdown-menu__divider"></div>
                            <a class="profile-dropdown__item dropdown-menu__item" href="{{ route("admin.logout") }}" tabindex="0">
                                <span class="profile-dropdown__icon">
                                    <svg class="icon-icon-logout">
                                        <use xlink:href="#icon-logout"></use>
                                    </svg>
                                </span>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
