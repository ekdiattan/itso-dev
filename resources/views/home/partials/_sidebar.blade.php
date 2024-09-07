@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<aside class="main-sidebar sidebar-light-primary">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="m-auto">
                <a href="/dashboard" class="navbar-brand">
                    <img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 35px; width: 143px;">
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ ($title === 'Dashboard') ? 'active disabled' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (hasPermission(auth()->user()->role->MasterRoleId, 'TIMASET'))
                <li class="nav-item {{ ($title === 'Inventaris' || $title === 'Booking') ? 'menu-open menu-is-open' : '' }}">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Tim Aset</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/booking" class="nav-link {{ ($title === 'Booking') ? 'active disabled' : '' }}">
                                <i class="nav-icon fas fa-bookmark ml-3"></i>
                                <p>Peminjaman</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (hasPermission(auth()->user()->role->MasterRoleId, 'JABATAN'))
                <li class="nav-item">
                    <a href="/position" class="nav-link {{ ($title === 'Jabatan') ? 'active disabled' : '' }}">
                        <i class="nav-icon fas fa-list ml-3"></i>
                        <p>Jabatan</p>
                    </a>
                </li>
                @endif
                @if (hasPermission(auth()->user()->role->MasterRoleId, 'MODUL'))
                <li class="nav-item">
                    <a href="/module" class="nav-link {{ ($title === 'Modul') ? 'active disabled' : '' }}">
                        <i class="nav-icon fas fa-folder ml-3"></i>
                        <p>Modul</p>
                    </a>
                </li>
                @endif
                @if (hasPermission(auth()->user()->role->MasterRoleId, 'ASET'))
                <li class="nav-item">
                    <a href="/aset" class="nav-link {{ ($title === 'Aset') ? 'active disabled' : '' }}">
                        <i class="nav-icon fas fa-weight ml-3"></i>
                        <p>Aset</p>
                    </a>
                </li>
                @endif

                @if (hasPermission(auth()->user()->role->MasterRoleId, 'HAKAKSES'))
                <li class="nav-item">
                    <a href="/permission" class="nav-link {{ ($title === 'Hak Akses') ? 'active disabled' : '' }}">
                        <i class="nav-icon fas fa-window-restore ml-3"></i>
                        <p>Pengaturan Hak Akses</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
