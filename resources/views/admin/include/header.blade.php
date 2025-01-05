<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">

        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('dashboard')}}">
                <!-- Logo icon --><b>

                    <img src="{{ asset('admin-asset') }}/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('admin-asset') }}/assets/images/logo-light-icon.png" alt="homepage"
                        class="light-logo" />
                </b>

                <!-- Logo text --><span>
                    <!-- dark Logo text -->
                    <img src="{{ asset('admin-asset') }}/assets/images/logo-text.png" alt="homepage"
                        class="dark-logo" />
                    <!-- Light Logo text -->
                    <img src="{{ asset('admin-asset') }}/assets/images/logo-light-text.png" class="light-logo"
                        alt="homepage" /></span> </a>
        </div>

        <div class="navbar-collapse">

            <ul class="navbar-nav me-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a
                        class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                        href="javascript:void(0)"><i class="icon-menu"></i></a> </li>

                <li class="nav-item">
                    <form class="app-search d-none d-md-block d-lg-block">
                        <input type="text" class="form-control" placeholder="Search & enter">
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav my-lg-0">

                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="{{ asset('admin-asset') }}/assets/images/users/1.jpg" alt="user"
                            class=""> <span class="hidden-md-down">Mark &nbsp;<i
                                class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-end animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account
                            Setting</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="" class="dropdown-item"
                            onclick="event.preventDefault();document.getElementById('logoutForm').submit()"><i
                                class="fa fa-power-off"></i> Logout</a>
                        <!-- text-->
                        <form action="{{ route('logout') }}" method="post" id="logoutForm">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
