<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="nav-item @if ($aktif == 'home') {{'active'}}@endif">
              <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>  
    
            <li class="menu-header">Master Data</li>
              <li class="nav-item @if ($aktif == 'criteria') {{'active'}}@endif">
                <a href="{{ route('criteria.index') }}" class="nav-link"><i class="fas fa-file"></i><span>Data Kriteria</span></a>
              </li>
             
              <li class="nav-item @if($aktif == 'subcriteria') {{ 'active' }}@endif">
                <a href="{{ route('subcriteria.index') }}" class="nav-link"><i class="fas fa-file-alt"></i><span>Data Sub Kriteria</span></a>
              </li>

              <li class="nav-item @if($aktif == 'alternatif') {{ 'active' }}@endif">
                <a href="{{ route('alternatif.index') }}" class="nav-link"><i class="fas fa-columns"></i><span>Data Alternatif</span></a>
              </li>
      
              <li class="nav-item @if($aktif== 'count') {{ 'active' }}@endif">
                <a href="{{ url('count.matrix') }}" class="nav-link">
                  <i class="fas fa-calculator"></i><span>Matrix</span></a>
              </li>
              <li class="nav-item @if($aktif== 'normalization') {{ 'active' }}@endif">
                <a href="{{ url('count.normalization') }}" class="nav-link">
                  <i class="fas fa-calculator"></i><span>Normalisasi</span></a>
              </li>
              <li class="nav-item @if($aktif== 'optimization') {{ 'active' }}@endif">
                <a href="{{ url('count.optimization') }}" class="nav-link">
                  <i class="fas fa-calculator"></i><span>Optimisasi</span></a>
              </li>
              <li class="nav-item @if($aktif== 'ranking') {{ 'active' }}@endif">
                <a href="{{ url('count.ranking') }}" class="nav-link">
                  <i class="fas fa-poll"></i><span>Data Hasil Akhir</span></a>
              </li>




    
    
              
              <li class="menu-header">Master User</li>
              {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i><span>Data User</span></a>
                <ul class="dropdown-menu">
                  <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                  <li><a href="login.blade.php">Login</a></li>
                  <li><a class="beep beep-sidebar" href="auth-login-2.html">Login 2</a></li>
                  <li><a href="auth-register.html">Register</a></li>
                  <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
              </li> --}}
              <li class="nav-item @if($aktif == 'user') {{ 'active' }}@endif">
                <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-users-cog"></i><span>Data User</span></a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link"> <i class="fas fa-user"></i> <span>Data Profil</span></a>
              </li>
        </aside>
      </div>

