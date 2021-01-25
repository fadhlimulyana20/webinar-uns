<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ URL::asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Webinar UNS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ URL::asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info text-white">
          {{ Auth::user()->nama }}
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
         <li class="nav-item">
            <a href="{{ route('admin.layout') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'admin.layout') !== False) ? 'active' : '' }}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Beranda
             </p>
           </a>
         </li>
        <li class="nav-item has-treeview {{ (strpos(Route::currentRouteName(), 'admin.webinar') !== False) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (strpos(Route::currentRouteName(), 'admin.webinar') !== False) ? 'active' : '' }}">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Webinar
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.webinar') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'admin.webinar') !== False) ? 'active' : '' }}">
                <i class="nav-icon far fa-calendar-check"></i>
                <p>Webinar Saya</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.webinar.create') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'admin.webinar.create') !== False) ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar-plus"></i>
                <p>Buat Webinar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ (strpos(Route::currentRouteName(), 'admin.pembicara') !== False) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
              Pembicara
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.pembicara') }}" class="nav-link {{ (strpos(Route::currentRouteName(), 'admin.pembicara') !== False) ? 'active' : '' }}">
                <i class="fas fa-portrait nav-icon"></i>
                <p>Daftar pembicara</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.pembicara.create') }}" class="nav-link">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>Tambahkan pembicara</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
