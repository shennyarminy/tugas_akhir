<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      
      <ul class="sidebar-menu">
        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
          <a href="/home" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
        </li>  
        <li class="menu-header">Master Data</li>
          <li class="nav-item {{ Request::is('kriteria') ? 'active' : '' }}">
            <a href="/kriteria" class="nav-link"><i class="fas fa-file"></i><span>Data Kriteria</span></a>
          </li>
          <li class="nav-item {{ Request::is('subkriteria') ? 'active' : '' }}">
            <a href="#" class="nav-link"><i class="fas fa-file-alt"></i><span>Data Sub Kriteria</span></a>
          </li>
          <li class="nav-item {{ Request::is('alternatif') ? 'active' : '' }}">
            <a href="#" class="nav-link"><i class="fas fa-users"></i><span>Data Alternatif</span></a>
          </li>
          <li class="nav-item {{ Request::is('penilaian') ? 'active' : '' }}">
            <a href="#" class="nav-link"><i class="fas fa-edit"></i><span>Data Penilaian</span></a>
          </li>
          <li class="nav-item {{ Request::is('perhitungan') ? 'active' : '' }}">
            <a href="#" class="nav-link"><i class="fas fa-calculator"></i><span>Data Perhitungan</span></a>
          </li>
          <li class="nav-item {{ Request::is('hasil') ? 'active' : '' }}">
            <a href="#" class="nav-link"><i class="fas fa-poll"></i><span>Data Hasil Akhir</span></a>
          </li>

          
          <li class="menu-header">Master User</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i><span>Data User</span></a>
            <ul class="dropdown-menu">
              <li><a href="auth-forgot-password.html">Forgot Password</a></li>
              <li><a href="login.blade.php">Login</a></li>
              <li><a class="beep beep-sidebar" href="auth-login-2.html">Login 2</a></li>
              <li><a href="auth-register.html">Register</a></li>
              <li><a href="auth-reset-password.html">Reset Password</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"> <i class="fas fa-user"></i> <span>Data Profil</span></a>
          </li>
    </aside>
  </div>