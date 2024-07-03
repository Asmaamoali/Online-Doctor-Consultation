<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('doctor.dashboard.home') }}" class="brand-link">
        <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Medical</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ displayImage(auth()->user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('doctor.dashboard.home') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('doctor.dashboard.home') }}"
                        class="nav-link {{ request()->is('doctor/home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('doctor.bookings.index') }}"
                        class="nav-link {{ request()->is('doctor/bookings') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>All Bookings</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('doctor.profile.index') }}"
                        class="nav-link {{ request()->is('doctor/my-profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            My Profile
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('doctor.auth.logoutSubmit') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link bg-danger">
                            <p>
                                Logout
                            </p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
