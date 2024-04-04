<nav id="navbar" class="navbar">
  <ul>
    <li><a href="{{'/'}}" class="active">Beranda</a></li>

    <li class="dropdown"><a href="#"><span>Tentang Visi</span> <i class="bi bi-chevron-down"></i></a>
      <ul>
        <li><a href="{{ route('habout') }}">Deskripsi</a></li>
        <li><a href="{{ route('teams') }}">Pengurus</a></li>
      </ul>
    </li>
    <li><a href="{{ route('blogs') }}">Berita dan Kegiatan</a></li>
    <li><a href="{{ route('hcontact') }}">Kontak</a></li>
    <li><a href="{{ route('login')}}" class="getstarted">
        @if(Auth::check())
        Dashboard
        @else
        Login
        @endif

      </a></li>
  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->