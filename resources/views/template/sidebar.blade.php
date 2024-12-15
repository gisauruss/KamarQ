<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset ('image/logo-kamarQ.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">KamarQ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route ('data.user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('data.admin')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Admin</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data KamarQ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route ('index.kamar')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kamar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('index.sewa')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sewa Kamar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Review
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('index.complaint')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Complaint
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('index.review')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comment</p>
                </a>
              </li>
            </ul>
          </li>
          
         
          <li class="nav-item has-treeview">
            <a href="{{ route('chart.blog')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('landing.home')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Landing Page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>