<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @can('mahasiswa')
    <div class="sidebar-heading">
        Mahasiswa
    </div>

    <li class="nav-item {{ Request::is('dashboard/bimbingan-mahasiswa*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('bimbingan.mahasiswa') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Bimbingan</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/jadwal-sidang-mahasiswa*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('jadwal-sidang.mahasiswa') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Jadwal Sidang</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}
    @endcan

    @can('dosen')
    <div class="sidebar-heading">
        Dosen
    </div>
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            </div>
        </div>
    </li> --}}

    <li class="nav-item {{ Request::is('dashboard/bimbingan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('bimbingan.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Bimbingan</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/jadwal-sidang-dosen*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('jadwal-sidang.dosen') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Jadwal Sidang</span>
        </a>
    </li>
    @endcan

    @can('paa')
    <div class="sidebar-heading">
        PAA
    </div>

    <li class="nav-item {{ Request::is('dashboard/pengajuan-sidang*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pengajuan-sidang.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pengajuan Sidang</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Jadwal Sidang</span>
        </a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>