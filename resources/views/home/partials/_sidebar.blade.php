 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->  
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="m-auto">
            <a href="/dashboard" class="navbar-brand">
              <img src="{{ asset('assets/images/logo_diskom.svg') }}" alt="Diskominfo" class="brand-image" style="height: 35  px; width: 143px;">
            </a>
          </div>
        </div>
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="/dashboard" class="nav-link {{ ($title === 'Dashboard') ? 'active disabled' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
          {{-- @if(auth()->user()->hak_akses=="Admin" || auth()->user()->hak_akses=="IT") --}}
            {{-- @endif --}}

            {{-- @if(auth()->user()->hak_akses=="Admin" || auth()->user()->hak_akses=="Aset") --}}
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
            {{-- @endif --}}

          {{-- @if(auth()->user()->hak_akses=="Admin" || auth()->user()->hak_akses=="Kepegawaian") --}}
          {{-- @endif --}}

          {{-- @if(auth()->user()->hak_akses=="Admin" || auth()->user()->hak_akses=="Keamanan") --}}
          {{-- @endif --}}
          {{-- @if(auth()->user()->hak_akses=="Admin") --}}
            <li class="nav-item">
              <a href="/index" class="nav-link {{ ($title === 'Pengguna') ? 'active disabled' : '' }}">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>Pengguna</p>
              </a>
            </li>
          {{-- @endif --}}
          {{-- @if(auth()->user()->hak_akses=="Admin" ||  auth()->user()->hak_akses=="Aset") --}}
            <li class="nav-item">
              <a class="nav-link">
                <i class="nav-icon fas fa-cog "></i>
                <p>
                  Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            {{-- @endif --}}
              <ul class="nav nav-treeview">
            {{-- @if(auth()->user()->hak_akses=="Admin" || auth()->user()->hak_akses=="Aset") --}}
                <li class="nav-item">
                  <a href="/employee" class="nav-link">
                    <i class="nav-icon fas fa-book ml-3"></i>
                    <p>Pegawai</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/aset" class="nav-link">
                    <i class="nav-icon fas fa-weight ml-3"></i>
                    <p>Aset</p>
                  </a>
                </li>
            {{-- @endif --}}
            {{-- @if(auth()->user()->hak_akses=="Admin") --}}
                <li class="nav-item">
                  <a href="/module" class="nav-link">
                    <i class="nav-icon fas fa-building ml-3"></i>
                    <p>Modul</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/position" class="nav-link ">
                    <i class="nav-icon fas fa-list ml-3"></i>
                    <p>Jabatan</p>
                  </a>
                </li>
            {{-- @endif --}}
            {{-- @if(auth()->user()->hak_akses=="Admin" || auth()->user()->hak_akses=="Aset") --}}
                <li class="nav-item">
                  <a href="/merk/" class="nav-link 'active disabled' : '' }}">
                  <i class="nav-icon fas fa-window-restore ml-3"></i>
                    <p>Pengaturan Hak Akses</p>
                  </a>
                </li>
            {{-- @endif --}}
            {{-- @if(auth()->user()->hak_akses=="Admin" || auth()->user()->hak_akses=="Kepegawaian") --}}
            {{-- @endif --}}
                </ul>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>