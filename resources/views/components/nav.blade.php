<nav class="navbar navbar-expand-lg" style="background: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('admin/dashboard')}}">
            <img src="{{ asset('images/Logo.png') }}" width="360" height="100%" class="d-inline-block align-center" id="nav-image-logo"alt="" style="margin-left: 20px">
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto" style="margin-right: 80px">
            @auth
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{url('admin/dashboard')}}" aria-current="page">Home</a>
                </li>

                {{-- Initial Data Dropdown Menu --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Initial Data
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item {{ request()->is('event_type') ? 'dropdown_active' : '' }}" href="{{ url('/event_type') }}">Event Types</a></li>
                    <li><a class="dropdown-item {{ request()->is('employees') ? 'dropdown_active' : '' }}" href="{{ url('/employees') }}">Employees</a></li>
                    <li><a class="dropdown-item {{ request()->is('task') ? 'dropdown_active' : '' }}" href="{{ url('/task') }}">Tasks</a></li>
                    </ul>
                </li>


                {{-- Process Data Dropdown Menu --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Process Data
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item {{ request()->is('space_events') ? 'dropdown_active' : '' }}" href="{{ url('/space_events') }}">Events</a></li>
                    <li><a class="dropdown-item {{ request()->is('assgn_employees') ? 'dropdown_active' : '' }}" href="{{ url('/assgn_employees') }}">Assigned Employees</a></li>
                    </ul>
                </li>


{{-- Registered Students-Reports --}}
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Reports
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item {{ request()->routeIs('reports.showRegisteredList') ? 'active' : '' }}" href="{{ route('reports.showRegisteredList') }}">Registered Students</a></li>
        <li><a class="dropdown-item {{ request()->routeIs('reports.showFormData') ? 'active' : '' }}" href="{{ route('reports.store') }}">Templates</a></li>
    </ul>
</li>

                {{-- Profile --}}
                <div >
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-user' style="margin-right: 10px"></i> Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/admin/profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ url('/admin/settings') }}">Settings</a></li>
                            <li><a class="dropdown-item" href="{{ url('logout') }}">LogOut</a></li>
                        </ul>
                    </li>
                </div>
            @endauth
        </ul>
      </div>
    </div>
  </nav>
