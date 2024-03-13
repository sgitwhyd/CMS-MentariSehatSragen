<nav id="navbar" class="navbar">
   <ul>
      <li><a href="{{'/'}}" class="active">Beranda</a></li>

      <li class="dropdown"><a href="#"><span>Tentang Visi</span> <i class="bi bi-chevron-down"></i></a>
      <ul>
         <li><a href="{{'/about'}}">Deskripsi</a></li>
         <li><a href="{{'/teams'}}">Pengurus</a></li>
      </ul>
      </li>
      <li><a href="{{'/blog'}}">Berita dan Kegiatan</a></li>
      <li><a href="{{'/contact'}}">Kontak</a></li>
      <li><a href="{{ route('admin-dashboard')}}" class="getstarted">Login</a></li>
   </ul>
   <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
