<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown">
      <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img src="{{isset(auth()->user()->gambar) ? asset('pengguna/' . auth()->user()->gambar) : asset('assets/img/avatar/avatar-1.png')}}" alt="image" class="rounded-circle mr-1" style="width:35px; height:35px">
        <div class="d-sm-none d-lg-inline-block">
          HI,
          @if(auth()->user()->level == 'admin')
          {{strtoupper(auth()->user()->admin->nama)}}
          @elseif(auth()->user()->level == 'siswa')
          {{strtoupper(auth()->user()->siswas->nama)}}
          @elseif(auth()->user()->level == 'petugas')
          {{strtoupper(auth()->user()->petugas->nama)}}
          @else
          Admin
          @endif
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="{{route('profil.user',['id' => auth()->user()->id])}}" class="dropdown-item has-icon">
          <i class="fas fa-user"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{route('pass',['id' => auth()->user()->id])}}" class="dropdown-item has-icon">
          <i class="fas fa-unlock"></i> Ubah Password
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>