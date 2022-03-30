<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
      <div class="search-element">
        {{-- <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button> --}}
        <div class="search-backdrop"></div>
        <div class="search-result">
      {{-- batas yang dihapus --}}
        </div>
      </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <div class="dropdown-menu dropdown-list dropdown-menu-right"> </div>
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Admin</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>