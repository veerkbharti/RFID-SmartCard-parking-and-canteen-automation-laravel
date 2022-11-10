<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('admin_assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SPCA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{url('/superadmin')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/employees')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Employees
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/handlers')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Handlers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/foods')}}" class="nav-link">
              <i class="nav-icon fas fa-hamburger"></i>
              <p>
                Manage Foods
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/slots')}}" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Manage Slots
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
