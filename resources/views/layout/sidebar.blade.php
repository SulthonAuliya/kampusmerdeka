<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>
    <div class="navbar-nav ml-auto">
      <div class="nav-item text-nowrap">
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="nav-link px-3 bg-dark border-0">Logout <span data-feather="log-out"></span></button>
        </form>
      </div>
    </div>

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
      <span class="brand-text font-weight-bold">Kampus Merdeka</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="admin" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home Page
            </p>
          </a>
        </li>

          <li class="nav-item {{ Request::is('program') ? 'active' : '' }}">
            <a href="/program" class="nav-link ">
              <i class="nav-icon fas fa-list nav-icon"></i>
              <p>
                Program
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('universitas') ? 'active' : '' }}">
            <a href="/universitas" class="nav-link ">
              <i class="nav-icon fas fa-list nav-icon"></i>
              <p>
                Universitas
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->

  {{-- <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside> --}}
  <!-- /.control-sidebar -->

  
</div>