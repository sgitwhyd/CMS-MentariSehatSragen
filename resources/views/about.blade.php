@extends('layouts.main')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">

</section><!-- End Breadcrumbs -->

<section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h2>Tentang Kami</h2>
      <p>Mentari Sehat Indonesia</p>
    </div>
    <div class="row content align-items-center">
      <div class="col-lg-6 d-flex justify-content-center">
        <img src="{{asset('storage/'.$about->image)}}" class="img-fluid" alt="Mentari Sehat Image" loading="lazy">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 ">
        <div class="text-content">
          {!!$about->content!!}
        </div>

      </div>
    </div>
  </div>
</section>
@endsection


@section('script')

@endsection