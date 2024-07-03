@include('layouts.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <!-- Navbar -->
        @if (auth()->check() && auth()->user()->role == 'admin')
            @include('layouts.nav')
        @elseif(auth()->check() && auth()->user()->role == 'user')
            @include('user.layouts.nav')
        @elseif(auth()->check() && auth()->user()->role == 'doctor')
            @include('doctor.layouts.nav')
        @endif <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @if (auth()->check() && auth()->user()->role == 'admin')
            @include('layouts.aside')
        @elseif(auth()->check() && auth()->user()->role == 'user')
            @include('user.layouts.aside')
        @elseif(auth()->check() && auth()->user()->role == 'doctor')
            @include('doctor.layouts.aside')
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @if (auth()->user()->role == 'doctor')
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('doctor.dashboard.home') }}">Dashboard</a>
                                    </li>
                                @elseif(auth()->user()->role == 'user')
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('user.dashboard.home') }}">Dashboard</a>
                                    </li>
                                @else
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a>
                                    </li>
                                    @endif @if (!request()->is('home'))
                                        <li class="breadcrumb-item active">@yield('title')</li>
                                    @endif
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('layouts.script')
</body>

</html>
