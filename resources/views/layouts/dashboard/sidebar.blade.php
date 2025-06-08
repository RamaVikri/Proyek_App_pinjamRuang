        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>
                <!--end::Start Navbar Links-->
                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">
                    <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>
                    <!--end::Fullscreen Toggle-->
                    @auth
                    <!--begin::User Menu Dropdown-->
                        
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('AdminLTE4/dist/assets/img/user2-160x160.jpg') }}"
                                class="user-image rounded-circle shadow" alt="User Image" />
                            <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header text-bg-primary">
                                <img src="{{ asset('AdminLTE4/dist/assets/img/user2-160x160.jpg') }}"
                                    class="rounded-circle shadow" alt="User Image" />
                                <p>
                                    {{ auth()->user()->name }} | Pemula
                                    <small>{{ auth()->user()->email }}</small>
                                </p>
                            </li>
                            <!--end::User Image-->
                            <!--begin::Menu Footer-->
                            <li class="user-footer">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat float-end bg-danger">Logout</button>
                                </form>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->
                    @endauth

                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="./index.html" class="brand-link">
                    <!--begin::Brand Image-->
                    <img src="{{ asset('AdminLTE4/dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image opacity-75 shadow" />
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light">Pinjam Ruang</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item ">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-house"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.rooms') }}"
                                class="nav-link {{ request()->routeIs('admin.rooms') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-building-fill-add"></i>
                                <p>Room</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.bookinglist') }}"
                                class="nav-link {{ request()->routeIs('admin.bookinglist') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-calendar-check-fill"></i>
                                <p>
                                    Booking
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.book-history') }}"
                                class="nav-link {{ request()->routeIs('admin.book-history') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-journal-richtext"></i>
                                <p>
                                    Booking History
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}"
                                class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                                <i class="nav-icon bi-person-fill"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->
        <!--begin::App Main-->
