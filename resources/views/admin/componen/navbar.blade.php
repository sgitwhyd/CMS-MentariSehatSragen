 <header id="header" class="header fixed-top d-flex align-items-center">
   <div class="d-flex align-items-center justify-content-between" style="padding: 20px 0;">
     <img src="{{ asset('assets/logo.png') }}" alt="Mentari Sehat Idonesia Kab Sragen Logo" style="width: 150px;">
     <span>MSI</span>
     <i class="bi bi-list toggle-sidebar-btn"></i>
   </div>

   <nav class="header-nav ms-auto">
     <ul class="d-flex align-items-center">
       <li class="nav-item dropdown pe-3">
         <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
           <span class="d-none d-md-block dropdown-toggle ps-2">
             Welcome, {{ Auth::user()->name }}
           </span>
         </a>
         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
           <li>
             <a class="dropdown-item d-flex align-items-center" href="{{route('profile')}}">
               <i class="bi bi-person"></i>
               <span>
                 Change Password
               </span>
             </a>
           </li>
           <li>
             <hr class="dropdown-divider">
           </li>

           <li>
             <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
               <i class="bi bi-box-arrow-right"></i>
               <span>Sign Out</span>
             </a>
           </li>

         </ul><!-- End Profile Dropdown Items -->
       </li><!-- End Profile Nav -->

     </ul>
   </nav><!-- End Icons Navigation -->

 </header>