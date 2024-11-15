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
        <!-- Static Dashboard Menu -->
        <li class="nav-item">
            <a href="{{ Auth::user()->id_group == 1 ? url('/admin') : url('/member') }}" 
               class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
    
        <!-- Loop through the menus to generate dynamic sidebar -->
        @foreach($menus as $menu)
    <!-- Only show parent menus (with or without submenus) -->
    @if($menu->parent_id == null)
        <li class="nav-item">
            <!-- Check if the menu has submenus (to toggle the behavior of the link) -->
            @if($menus->where('parent_id', $menu->id_menu)->count() > 0)
                <!-- Parent menu with submenus -->
                <a href="#" class="nav-link {{ $activeMenu == $menu->label ? 'active' : '' }}">
                    <p>
                        {{ $menu->label }}
                        <i class="fas fa-angle-left right"></i> <!-- Dropdown icon if there are submenus -->
                    </p>
                </a>
                <!-- Render submenus -->
                <ul class="nav nav-treeview">
                    @foreach($menus as $submenu)
                        @if($submenu->parent_id == $menu->id_menu)
                            <li class="nav-item">
                                <a href="{{ url($submenu->link) }}" class="nav-link {{ $activeMenu == $submenu->label ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-angle-right"></i>
                                    <p>{{ $submenu->label }}</p>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <!-- Parent menu without submenus, make it clickable -->
                <a href="{{ url($menu->link) }}" class="nav-link {{ $activeMenu == $menu->label ? 'active' : '' }}">
                    <p>{{ $menu->label }}</p>
                </a>
            @endif
        </li>
    @endif
@endforeach
<li class="nav-item">
    <a href="{{ route('logout') }}" class="nav-link">
        <p>Logout</p>
    </a>
</li>
    </ul>
    </nav>
</div>

