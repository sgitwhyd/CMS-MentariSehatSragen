 <aside id="sidebar" class="sidebar">
   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-heading">Pages</li>
     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs('about') ? '' : 'collapsed' }}" href="{{ route('about') }}">
         <i class="bi bi-person"></i>
         <span>Tentang MSI</span>
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs(['slider', 'edit-slider']) ? '' : 'collapsed' }}"
         href="{{route('slider')}}">
         <i class="bi bi-book"></i>
         <span>Slider</span>
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs('visi-misi') ? '' : 'collapsed' }}" href="{{route('visi-misi')}}">
         <i class="bi bi-bookmark"></i>
         <span>Visi dan Misi</span>
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs(['pengurus', 'edit-team']) ? '' : 'collapsed' }} "
         href="{{route('pengurus')}}">
         <i class="bi bi-diagram-3"></i>
         <span>Pengurus</span>
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs(['berita-dan-kegiatan', 'berita-dan-kegiatan-create']) ? '' : 'collapsed' }}"
         href="{{route('berita-dan-kegiatan')}}">
         <i class="bi bi-calendar-event"></i>
         <span>Berita dan Kegiatan</span>
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs('contact') ? '' : 'collapsed' }}" href="{{route('contact')}}">
         <i class="bi bi-card-text"></i>
         <span>Kontak</span>
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs('footer') ? '' : 'collapsed' }}" href="{{route('footer')}}">
         <i class="bi bi-card-text"></i>
         <span>Footer</span>
       </a>
     </li>
   </ul>
 </aside>