<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <li class="nav-item dropdown">
        <a class="nav-link btn btn-outline-secondary" data-toggle="dropdown" href="#">
          <span>Akun </span><i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Selamt datang  {{Auth::user()->name}}</span>
          <center><code>{{Auth::user()->role}}</code></center>
          <div class="dropdown-divider"></div>
          <a href="{{route('listUser', Auth::user()->id)}}" class="dropdown-item bg-light">
            <i class="fas fa-users mr-2"></i> Tamu ditambahkan
          </a>
          <div class="dropdown-divider"></div>
            <form method="POST" action="{{Route('auth.logout')}}">
                @csrf
                
                <button class="dropdown-item bg-danger text-bold" type="submit"><center><i class="fas fa-file mr-2"></i>Logout</center></button>
            </form>
        </div>
      </li>

    </ul>
  </nav>