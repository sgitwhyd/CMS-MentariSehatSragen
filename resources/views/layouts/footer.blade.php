 @php
 $footer = App\Models\Footers::get()->last();
 $bg_footer = asset('images/footer/' . $footer->image);
 @endphp

 <footer id="footer" style="
          background-image: url('{{ $bg_footer }}');
          background-size: cover;
          background-position: center;
          ">
   <div class="footer-top" style="position: relative;">
     <div class="container">
       <div class="col-12 mb-5">
         <h2 class="text-center mb-3">
           {{$footer->title}}
         </h2>
       </div>
       <div class="col-12 mb-5 text-center">
         <div class="social-links mt-3">
           @if($footer->twitter)
           <a href="{{ $footer->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
           @endif
           @if($footer->facebook)
           <a href="{{ $footer->facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
           @endif
           @if($footer->instagram)
           <a href="{{ $footer->instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
           @endif
           @if($footer->tiktok)
           <a href="{{ $footer->tiktok }}" class="google-plus"><i class="bx bxl-tiktok"></i></a>
           @endif
           @if($footer->youtube)
           <a href="{{ $footer->youtube }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
           @endif
         </div>
       </div>
       <div class="row text-center">
         <div class="col-lg-6 col-md-6">
           <div class="footer-info">
             <p>
               {{ $footer->alamat }}
             </p>
           </div>
         </div>
         <div class="col-12 col-md-6">
           <div class="footer-info">
             <p>
               <strong>Phone:</strong>
               {{ $footer->no_telp }}
               <br>
               <strong>Email:</strong>
               {{ $footer->email }}
               <br>
             </p>
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class="container" style="position: relative;">
     <div class="copyright">
       &copy; Copyright <strong><span>MSI</span></strong>. All Rights Reserved
     </div>
   </div>
 </footer>