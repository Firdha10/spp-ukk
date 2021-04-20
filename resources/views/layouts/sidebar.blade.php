<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{route('home')}}">
        <img src="{{ asset('assets/img/logo.png') }}" alt="logo sinpes" class="img-fluid" style="height: 100px;">
        <br>
        Pembayaran SPP
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ asset('assets/img/logo.png') }}">
        <img src="{{ asset('assets/img/logo.png') }}" alt="logo sinpes" style="height: 2rem;">
      </a>
    </div>
    <ul class="sidebar-menu mt-4">
      <li class="menu-header">Menu Utama</li>
      @if(auth()->user()->level == 'siswa')
        <li class="nav-item {{Request::segment(1)=='dashboard' ?'active':''}}" >
          <a class="nav-link" href="{{route('home')}}" aria-expanded="false">
            <i class="fas fa-fire"></i> 
            <span>Dashboard</span>
          </a>
        </li>
      @endif
      @if(auth()->user()->level == 'petugas')
        <li class="nav-item {{Request::segment(1)=='dashboard' ?'active':''}}" >
          <a class="nav-link" href="{{route('home')}}" aria-expanded="false">
            <i class="fas fa-fire"></i> 
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item {{Request::segment(1)=='pembayaran' ?'active':''}}">
          <a class="nav-link" href="{{route('pembayaran.index')}}" aria-expanded="false">
            <i class="fas fa-money-check"></i>
            <span>Pembayaran</span>
          </a>
        </li>
      @endif
      @if(auth()->user()->level == 'admin')
        <li class="nav-item {{Request::segment(1)=='dashboard' ?'active':''}}" >
          <a class="nav-link" href="{{route('home')}}" aria-expanded="false">
            <i class="fas fa-fire"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item {{Request::segment(1)=='pembayaran' ?'active':''}}">
          <a class="nav-link" href="{{route('pembayaran.index')}}" aria-expanded="false">
            <i class="fas fa-money-check"></i> 
            <span>Pembayaran</span>
          </a>
        </li>
        
        <li class="menu-header">Menu Admin</li>

        <li class="nav-item {{Request::segment(1)=='siswa' ?'active':''}}">
          <a class="nav-link" href="{{route('siswa.index')}}" aria-expanded="false">
            <i class="fas fa-user-friends"></i> 
            <span>Siswa</span>
          </a>
        </li>
        <li class="nav-item {{Request::segment(1)=='petugas' ?'active':''}}">
          <a class="nav-link" href="{{route('petugas.index')}}" aria-expanded="false">
            <i class="fas fa-user"></i>
            <span>Petugas</span>
          </a>
        </li>
        <li class="nav-item  {{Request::segment(1)=='user' ?'active':''}}">
          <a class="nav-link" href="{{route('user.index')}}" aria-expanded="false">
            <i class="fas fa-user-plus"></i>
            <span>User</span>
          </a>
        </li>
        <li class="nav-item {{Request::segment(1)=='spp' ?'active':''}}">
          <a class="nav-link" href="{{route('spp.index')}}" aria-expanded="false">
            <i class="fas fa-dollar-sign"></i>
            <span>SPP</span>
          </a>
        </li>
        <li class="nav-item {{Request::segment(1)=='kelas' ?'active':''}}">
          <a class="nav-link" href="{{route('kelas.index')}}" aria-expanded="false">
            <i class="fas fa-home"></i>
            <span>Kelas</span>
          </a>
        </li>
        <li class="nav-item {{Request::segment(1)=='jurusan' ?'active':''}}">
          <a class="nav-link" href="{{ route('jurusan.index') }}" aria-expanded="false">
            <i class="fas fa-school"></i>
            <span>Jurusan</span>
          </a>
        </li>

        <li class="menu-header">Laporan</li>
        <li class="nav-item {{Request::segment(1)=='history-pembayaran' ?'active':''}}">
          <a class="nav-link" href="{{route('history-pembayaran.index')}}" aria-expanded="false">
            <i class="fas fa-history"></i> 
            <span>History Pembayaran</span>
          </a>
        </li>
        <li class="nav-item {{Request::segment(1)=='laporan' ?'active':''}} ">
          <a class="nav-link" href="{{route('laporan')}}" aria-expanded="false">
            <i class="fas fa-file"></i>
            <span>Laporan</span>
          </a>
        </li>
      @endif
  </aside>
</div>
