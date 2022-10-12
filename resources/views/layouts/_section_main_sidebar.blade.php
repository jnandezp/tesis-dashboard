<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">
            {{ config('app.name', 'Laravel') }}
            </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->fullName }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if(!empty(Config::get('blog.name')))
                    <li class="nav-header">BLOG</li>
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <li class="nav-item {{ request()->routeIs('posts.*') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Publicaciones
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview treeview-menu">
                            <li class="nav-item">
                                <a href="{{ route('posts.index') }}"
                                   class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Listado</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('posts.create') }}"
                                   class="nav-link {{ request()->routeIs('posts.create') ? 'active' : '' }}">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Nueva</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(!empty(Config::get('company.name')))
                    <li class="nav-header">COMPANY</li>
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <li class="nav-item {{ request()->routeIs('companies.*') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('companies.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Compañias
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview treeview-menu">
                            <li class="nav-item">
                                <a href="{{ route('companies.index') }}"
                                   class="nav-link {{ request()->routeIs('companies.index') ? 'active' : '' }}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Listado</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('companies.create') }}"
                                   class="nav-link {{ request()->routeIs('companies.create') ? 'active' : '' }}">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Nueva</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


                @if(!empty(Config::get('booking.name')))
                    <li class="nav-header">RESERVACIONES</li>
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <li class="nav-item {{ request()->routeIs('booking.*') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('booking.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Reservaciones
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview treeview-menu">
                            <li class="nav-item">
                                <a href="{{ route('booking.calendar') }}"
                                   class="nav-link {{ request()->routeIs('booking.calendar') ? 'active' : '' }}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Calendario</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('booking.index') }}"
                                   class="nav-link {{ request()->routeIs('booking.index') ? 'active' : '' }}">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Listado</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('booking.create') }}"
                                   class="nav-link {{ request()->routeIs('booking.create') ? 'active' : '' }}">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Nueva</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{--<li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Level 1
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Level 2
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
