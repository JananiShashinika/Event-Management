{{-- <nav class="navbar navbar-expand-lg navbar-light" style="background: #578CCA">
  <a class="navbar-brand" href="{{url('admin/dashboard')}}">
      <img src="{{ asset('images/Logo.png') }}" width="360" height="100%" class="d-inline-block align-center" id="nav-image-logo"alt="" style="margin-left: 20px">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse nav-container" id="navbarResponsive">
    <ul class="navbar-nav ms-auto">
      @auth
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{url('admin/dashboard')}}">Home</a>
        </li>

        <li class="nav-item">

            <a class="nav-link {{ Request::is('space_events') ? 'active' : '' }}" href="{{ url('/space_events') }}">Events</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('space_event_types') ? 'active' : '' }}" href="{{ url('/space_event_types') }}">Event Types</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('employees') ? 'active' : '' }}" href="{{ url('/employees') }}">Employees</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('assgn_employees') ? 'active' : '' }}" href="{{ url('/assgn_employees') }}">Assigned Employees</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}">LogOut</a>
        </li>
      @endauth
  </ul>
</div>
</nav> --}}
