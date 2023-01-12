<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Buku Tamu</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{request()->user()->name}}</a>
        </div>
        </div>

        <!-- SidebarSearch Form -->
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item bg-success mb-2">
                <a href="{{route('create')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                    Input Tamu
                    <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item menu-open">
                
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Utama
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview pl-2">
                <li class="nav-item">
                <a href="{{route('index')}}" class="nav-link">
                    <i class="fa-solid fa-arrows-down-to-people nav-icon"></i>
                    <p>Semua Data Tamu</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{route('statistic')}}" class="nav-link">
                    <i class="fa-solid fa-chart-simple nav-icon"></i>
                    <p>Statistik</p>
                </a>
                </li>
            </ul>
            </li>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
  <!-- /.sidebar -->
</aside>