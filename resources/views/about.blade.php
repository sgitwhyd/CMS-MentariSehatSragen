@extends('layouts.main')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
   <div class="container">
     <div class="d-flex justify-content-between align-items-center">
       <ol>
         <li>Tentang Visi</li>
         <li>About</li>
       </ol>
     </div>
   </div>
</section><!-- End Breadcrumbs -->

<section id="about" class="about">
  <div class="container">
    <div class="row content">
      <div class="col-lg-6">
        <img src="{{asset('images/about/'.$about->image)}}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
      {!!$about->content!!}
      </div>
    </div>
  </div>
 </section>
@endsection


@section('script')

@endsection