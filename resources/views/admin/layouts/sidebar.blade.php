<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{ route('home') }}"><img src="{{ asset('admin/assets/images/Rectangle_626-removebg-preview.png') }}" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal"></h5>
              <span></span>
            </div>
          </div>
         
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('home') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Home</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('admins.index') }}">
          <span class="menu-icon">
            <i class="mdi mdi-account"></i>
          </span>
          <span class="menu-title">Admin</span>
        </a>
      </li>
    </ul>
  </nav>