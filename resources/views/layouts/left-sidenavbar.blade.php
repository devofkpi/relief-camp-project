  <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src='{{ asset("images/logo.jpg")}}' alt="Manipur Govt Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Kangpokpi, Manipur</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
            </div>
          </div> --}}
    
          <!-- SidebarSearch Form -->
          {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div> --}}
    @php
      $current_route=request()->route()->getName();
    @endphp
    
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link {{$current_route=='dashboard'?'active':''}}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('relief_camps')}}" class="nav-link {{$current_route=='relief_camps'?'active':''}}">
                  <i class="nav-icon fas fa-campground"></i>
                  <p>
                    Relief Camps
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item {{$current_route=='relief_camp_by_sub'?'menu-open':''}}">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-city"></i>
                  <p>
                    Sub Divisions
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @foreach ($nav_sub_data as $data )
                  <li class="nav-item">
                    <a href="{{route('relief_camp_by_sub',['sub_division_id'=>$data->id])}}" class="nav-link">
                      <p>{{$data->sub_division_name}}</p>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>
                    Nodal Officers
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @foreach ($nav_nodal_data as $data )
                  <li class="nav-item">
                    <a href="{{route('relief_camp_by_nodal')}}/{{$data->id}}" class="nav-link">
                      <p>{{$data->officer_name}}</p>
                    </a>
                  </li>
                  @endforeach
                  <li class="nav-item">
                    <a href="{{route('create_nodal_officer')}}" class="nav-link">
                      <p>Create Nodal Officer</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Demography
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('demo_by_cat')}}/male" class="nav-link">
                      <i class="nav-icon fas fa-male"></i>
                      <p>Male</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('demo_by_cat')}}/female" class="nav-link">
                      <i class="nav-icon fas fa-female"></i>
                      <p>Female</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('demo_by_cat')}}/old_age" class="nav-link">
                      <i class="nav-icon fas fa-blind"></i>
                      <p>Old Age Women</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('demo_by_cat')}}/orphan" class="nav-link">
                      <i class="nav-icon fas fa-child"></i>
                      <p>Orphan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('demo_by_cat')}}/lactating" class="nav-link">
                      <i class="nav-icon fas fa-frown"></i>
                      <p>Lactating</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('demo_by_cat')}}/child" class="nav-link">
                      <i class="nav-icon fas fa-baby"></i>
                      <p>Child</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{route('police_stations')}}" class="nav-link">
                  <i class="nav-icon fas fa-taxi"></i>
                  <p>
                    Police Station
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('public_health_centres')}}" class="nav-link">
                  <i class="nav-icon fas fa-stethoscope"></i>
                  <p>
                    Public Health Centre
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('aanganwadi_centres')}}" class="nav-link">
                  <i class="nav-icon fas fa-house-user"></i>
                  <p>
                    Aanganwadi
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('district_helplines')}}" class="nav-link">
                  <i class="nav-icon fas fa-phone"></i>
                  <p>
                    Helpline
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('announcements')}}" class="nav-link">
                  <i class="nav-icon fas fa-bullhorn"></i>
                  <p>
                    Announcement
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('register')}}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Create User
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
            </ul>
        </nav>
        </div>
      </aside>