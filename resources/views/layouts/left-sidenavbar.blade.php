  <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('dashboard')}}" class="brand-link">
          <img src='{{ asset("images/logo.jpg")}}' alt="Manipur Govt Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Kangpokpi, Manipur</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{asset('images/user_pic.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
          </div>
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
                <a href="{{route('relief_camps')}}" class="nav-link {{$current_route=='relief_camps'?'menu-open':''}}">
                  <i class="nav-icon fas fa-campground"></i>
                  <p>
                    Relief Camps
                    <!-- <span class="right badge badge-danger">New</span> -->
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('relief_camps')}}" class="nav-link">
                      <i class="nav-icon fas fa-eye"></i>
                      <p>Show All Relief Camps</p>
                    </a>
                  </li>
                  @if(auth()->user()->role!=3)
                  <li class="nav-item">
                    <a href="{{route('create_relief_camp')}}" class="nav-link">
                      <i class="nav-icon fas fa-plus"></i>
                      <p>Create Relief Camp</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('create_facilities')}}" class="nav-link">
                      <i class="nav-icon fas fa-upload"></i>
                      <p>Upload Camp Facilities</p>
                    </a>
                  </li>
                  @endif
                </ul>
              </li>
              @if(auth()->user()->role!=3)
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
                    @if(auth()->user()->role==0 || auth()->user()->role==1)
                    <li class="nav-item">
                      <a href="{{route('relief_camp_by_sub',['sub_division_id'=>Crypt::encrypt($data->id)])}}" class="nav-link">
                        <p>{{$data->sub_division_name}}</p>
                      </a>
                    </li>
                    @elseif(auth()->user()->role==2 && (auth()->user()->sub_division_id==$data->id))
                    <li class="nav-item">
                      <a href="{{route('relief_camp_by_sub',['sub_division_id'=>Crypt::encrypt($data->id)])}}" class="nav-link">
                        <p>{{$data->sub_division_name}}</p>
                      </a>
                    </li>
                    @endif
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
                  <li class="nav-item">
                    <a href="{{route('show_all_nodal_officer')}}" class="nav-link">
                      <i class="nav-icon fas fa-eye"></i>
                      <p>Show All Nodal Officers</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('create_nodal_officer')}}" class="nav-link">
                      <i class="nav-icon fas fa-plus"></i>
                      <p>Create Nodal Officer</p>
                    </a>
                  </li>
                </ul>
              </li>
              @endif
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
                    <a href="{{route('create_inmates')}}" class="nav-link">
                      <i class="nav-icon fas fa-upload"></i>
                      <p>Upload Inmates Data</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('inmates')}}" class="nav-link">
                      <i class="nav-icon fas fa-eye"></i>
                      <p>Show All Inmates</p>
                    </a>
                  </li>
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
                  <li class="nav-item">
                    <a href="{{route('demo_by_cat')}}/disabled" class="nav-link">
                      <i class="nav-icon fas fa-wheelchair"></i>
                      <p>Specially Abled Persons</p>
                    </a>
                  </li>
                </ul>
              </li>
              {{-- <li class="nav-item">
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
              </li> --}}
              @if(auth()->user()->role!=3)
              <li class="nav-item">
                <a href="{{route('register')}}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Create User
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('show_all_user')}}" class="nav-link">
                  <i class="nav-icon fas fa-eye"></i>
                  <p>
                    Show All User
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('deleted_items')}}" class="nav-link">
                  <i class="nav-icon fas fa-trash"></i>
                  <p>
                    Trash
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              @endif
            </ul>
        </nav>
        </div>
      </aside>