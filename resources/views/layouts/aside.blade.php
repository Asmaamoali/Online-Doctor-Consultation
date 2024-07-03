<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.home') }}" class="brand-link">
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
                <a href="{{ route('admin.home') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}"
                        class="nav-link {{ request()->is('admin/home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li
                    class="nav-item {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}"
                                class="nav-link  {{ request()->is('admin/categories') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}"
                                class="nav-link {{ request()->is('admin/categories/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ request()->is('admin/sub-categories') || request()->is('admin/sub-categories/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/sub-categories') || request()->is('admin/sub-categories/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Sub-Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sub-categories.index') }}"
                                class="nav-link  {{ request()->is('admin/sub-categories') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show Sub-Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sub-categories.create') }}"
                                class="nav-link {{ request()->is('admin/sub-categories/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Sub-Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ request()->is('admin/symptoms') || request()->is('admin/symptoms/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/symptoms') || request()->is('admin/symptoms/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Symptoms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('symptoms.index') }}"
                                class="nav-link  {{ request()->is('admin/symptoms') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show Symptoms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('symptoms.create') }}"
                                class="nav-link {{ request()->is('admin/symptoms/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Symptom</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('admin/admins') || request()->is('admin/admins/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/admins') || request()->is('admin/admins/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Admins
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admins.index') }}"
                                class="nav-link  {{ request()->is('admin/admins') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show Admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admins.create') }}"
                                class="nav-link {{ request()->is('admin/admins/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('admin/doctors') || request()->is('admin/doctors/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/doctors') || request()->is('admin/doctors/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Doctors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('doctors.index') }}"
                                class="nav-link  {{ request()->is('admin/doctors') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show Doctors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('doctors.create') }}"
                                class="nav-link {{ request()->is('admin/doctors/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Doctor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link  {{ request()->is('admin/users') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}"
                                class="nav-link {{ request()->is('admin/users/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ request()->is('admin/medicines') || request()->is('admin/medicines/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/medicines') || request()->is('admin/medicines/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Medicines
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('medicines.index') }}"
                                class="nav-link  {{ request()->is('admin/medicines') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show Medicines</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('medicines.create') }}"
                                class="nav-link {{ request()->is('admin/medicines/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Medicines</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('admin/galleries') || request()->is('admin/galleries/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/galleries') || request()->is('admin/galleries/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Galleries
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('galleries.index') }}"
                                class="nav-link  {{ request()->is('admin/galleries') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show Galleries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('galleries.create') }}"
                                class="nav-link {{ request()->is('admin/galleries/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Gallery</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('admin/faqs') || request()->is('admin/faqs/*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/faqs') || request()->is('admin/faqs/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            FAQs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('faqs.index') }}"
                                class="nav-link  {{ request()->is('admin/faqs') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show FAQs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faqs.create') }}"
                                class="nav-link {{ request()->is('admin/faqs/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New FAQ</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('bookings.index') }}"
                        class="nav-link {{ request()->is('admin/bookings') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>All Bookings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('messages.index') }}"
                        class="nav-link {{ request()->is('admin/messages') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Messages</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}"
                        class="nav-link {{ request()->is('admin/update-profile') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            My Profile
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" href="{{ route('admin.home') }}" class="nav-link bg-danger">
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
