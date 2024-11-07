<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">User Credential</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Data User
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/admin/role') }}" class="nav-link {{ $activeMenu == 'role' ? 'active' : '' }}">
                      <i class="nav-icon fas fa-layer-group"></i>
                      <p>Role User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/user') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>List User</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-header">Inventory</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-laptop"></i>
                  <p>
                    Data Barang
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/admin/kode') }}" class="nav-link {{ $activeMenu == 'kode' ? 'active' : '' }}">
                      <i class="nav-icon fas fa-list"></i>
                      <p>Kode Barang</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/barang') }}" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-server"></i>
                        <p>List Barang</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/admin/status') }}" class="nav-link {{ $activeMenu == 'status' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-exclamation"></i>
                        <p>Status Barang</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-header">Distribusi</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-route"></i>
                  <p>
                    Data Distribusi
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/admin/ruang') }}" class="nav-link {{ $activeMenu == 'ruang' ? 'active' : '' }}">
                      <i class="nav-icon fas fa-address-book"></i>
                      <p>List Ruangan</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/admin/distribusi') }}" class="nav-link {{ $activeMenu == 'distribusi' ? 'active' : '' }}">
                      <i class="nav-icon fas fa-bookmark"></i>
                      <p>Distribusi Barang JTI</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-header">User Settings</li>
            <li class="nav-item">
              <a href="{{ url('/admin/profile') }}" class="nav-link {{ $activeMenu == 'profile' ? 'active' : '' }} ">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Profile</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <p>Logout</p>
            </a>
        </li>
        </ul>
    </nav>
</div>

