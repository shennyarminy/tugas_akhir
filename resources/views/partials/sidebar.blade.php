<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="nav-item @if($aktif == 'home') {{'active'}}@endif">
        <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
      </li>  
    @if (auth()->user()->roles == "ADMIN")
     <li class="nav-item dropdown {{ (request()->is('criteria*', 'subcriteria*')) ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
              <span>Pengelolaan Data</span>
          </a>
              <ul class="dropdown-menu">
                <li class="nav-item @if ($aktif == 'criteria') {{'active'}}@endif">
                  <a href="{{ route('criteria.index') }}" class="nav-link"><i class="fas fa-file"></i><span>Data Kriteria</span></a>
                </li>
                <li class="nav-item @if($aktif == 'subcriteria') {{ 'active' }}@endif">
                  <a href="{{ route('subcriteria.index') }}" class="nav-link"><i class="fas fa-file-alt"></i><span>Data Subkriteria</span></a>
                </li>
              </ul>
      </li>

       <li class="menu-header">Data Siswa</li>
       <li class="nav-item @if($aktif == 'alternatif') {{ 'active' }}@endif">
         <a href="{{ route('alternatif.index') }}" class="nav-link"><i class="fas fa-columns"></i><span>Data Siswa</span></a>
       </li> 
       <li class="nav-item @if($aktif == 'penilaian') {{ 'active' }}@endif">
        <a href="{{ route('value.index') }}" class="nav-link"><i class="fas fa-columns"></i><span>Data Penilaian</span></a>
      </li> 

      <li class="nav-item @if($aktif== 'ranking') {{ 'active' }}@endif">
          <a href="{{ url('result.hasil') }}" class="nav-link">
          <i class="fas fa-poll"></i><span>Data Hasil Akhir</span></a>
      </li>

      <li class="menu-header">Master User</li>
        <li class="nav-item @if($aktif == 'user') {{ 'active' }}@endif">
          <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-users-cog"></i><span>Data User</span></a>
        </li>
    @endif


    @if (auth()->user()->roles == "DM")
    <li class="menu-header">Master Data</li>
    <li class="nav-item @if ($aktif == 'criteria') {{'active'}}@endif">
      <a href="{{ route('criteria.index') }}" class="nav-link"><i class="fas fa-file"></i>
      <span>Penilaian Bobot</span>
      </a>
    </li>
      <li class="menu-header">Equation</li>
       <li class="nav-item dropdown {{ (request()->is('count*')) ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
              <span>Perhitungan</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item @if($aktif== 'matrix') {{ 'active' }}@endif">
                    <a href="{{ url('count.matrix') }}" class="nav-link">
                    <i class="fas fa-calculator"></i><span>Matrix</span></a>
                </li>
                <li class="nav-item @if($aktif== 'normalisasi') {{ 'active' }}@endif">
                    <a href="{{ url('count.normalization') }}" class="nav-link">
                    <i class="fas fa-calculator"></i><span>Normalisasi</span></a>
                </li>
                <li class="nav-item @if($aktif== 'optimasi') {{ 'active' }}@endif">
                    <a href="{{ url('count.optimization') }}" class="nav-link">
                    <i class="fas fa-calculator"></i><span>Optimisasi</span></a>
                </li>
                
              </ul>
      </li>
      <li class="nav-item @if($aktif== 'ranking') {{ 'active' }}@endif">
        <a href="{{ url('result.hasil') }}" class="nav-link">
          <i class="fas fa-poll"></i><span>Data Hasil Akhir</span></a>
      </li>
      @endif

  </aside>
</div>

