<nav class="sb-topnav navbar navbar-expand navbar-light bg-white shadow">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 logo d-flex align-items-center" href="{{route('dashboard')}}">
        <img src="{{asset('assets/image/logo/surokkha-logo.png')}}" alt="">
        <span class="d-none d-lg-block">Surokkha</span>
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <button type="button" class="btn btn-success">Balance:
            <span class="badge text-bg-light">
                {{ round(auth()->user()->balance) }} Taka
            </span>
        </button>
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li class="ps-3 py-2"><i class="fa-solid fa-user"></i> {{ auth()->user()->name }}</li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
