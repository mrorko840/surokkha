@include('includes.head')

<body class="sb-nav-fixed">
    <!-- Top Nav -->
    @include('includes.top_nav')
    <div id="layoutSidenav">
        <!-- Side Nav -->
        @include('includes.side_nav')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>

            <!-- Footer -->
            @include('includes.footer')
        </div>
    </div>

    <!-- Script -->
    @include('includes.script')
</body>

</html>
