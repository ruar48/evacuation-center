<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgba(62,88,113);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">

                    <i class="fas fa-power-off"> </i>{{ Auth::user()->name }}
                </a>
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

        </li> --}}
        <li class="nav-item">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-power-off"></i>{{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </li>

    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(44,62,80);">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link animated swing">
        <img src="../asset/img/logo1.png" alt="DSMS Logo" width="200"
            style="margin-top: -25px;margin-bottom: -90px;">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.calamity-type') }}" class="nav-link">
                        <i class="nav-icon fa fa-globe-asia"></i>
                        <p>
                            Type of Calamity
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.barangay') }}" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>
                        <p>
                            Barangay Information
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.evacuation-center') }}" class="nav-link">
                        <i class="nav-icon fa fa-hotel"></i>
                        <p>
                            Evacuation Center
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Evacuee Information
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.add-evacuees') }}" class="nav-link">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.manage-evacuees') }}" class="nav-link">
                                <i class="nav-icon fa fa-address-book"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.lgu') }}" class="nav-link">
                        <i class="nav-icon fa fa-landmark"></i>
                        <p>
                            LGU Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-lock"></i>
                        <p>
                            Users
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.add-user') }}" class="nav-link">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.manage-user') }}" class="nav-link">
                                <i class="nav-icon fa fa-address-book"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Reports
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.evacuees-report') }}" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Evacuees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.gender-report') }}" class="nav-link">
                                <i class="nav-icon fa fa-venus-mars"></i>
                                <p>Evacuees by Gender</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.barangay-report') }}" class="nav-link">
                                <i class="nav-icon fa fa-archway"></i>
                                <p>Evacuees by Brgy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.age-report') }}" class="nav-link">
                                <i class="nav-icon fa fa-sort-numeric-up-alt"></i>
                                <p>Evacuees by Age</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.calamity-report') }}" class="nav-link">
                                <i class="nav-icon fa fa-globe-asia"></i>
                                <p>Evacuees by Calamity</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.center-report') }}" class="nav-link">
                                <i class="nav-icon fa fa-hospital-alt"></i>
                                <p>Evacuees by Center</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
