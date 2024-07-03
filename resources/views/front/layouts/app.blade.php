@include('front.layouts.header')
<body>
    @include('front.layouts.nav')
    <main id="main">
        @yield('content')
    </main>
    @include('front.layouts.footer')
    @include('front.layouts.scripts')
</body>
</html>
