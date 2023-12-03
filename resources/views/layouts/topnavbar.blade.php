<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>        
    </ul>
        <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-cog"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a href="{{route('view_profile')}}" class="dropdown-item">
          View Profile<i class="float-right fas fa-eye"></i>        
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{route('edit_profile')}}" class="dropdown-item">
          Edit Profile<i class="float-right fas fa-user-edit"></i>        
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('change_pwd')}}" class="dropdown-item">
          Change Password<i class="float-right fas fa-key"></i>        
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{route('logout')}}" class="dropdown-item">
          Logout<i class="float-right fas fa-sign-out-alt"></i>        
        </a>        
    </li>
    
  </ul>
  </nav>