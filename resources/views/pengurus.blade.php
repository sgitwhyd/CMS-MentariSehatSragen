@extends('layouts.main')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <ol>
        <li>Tentang Visi</li>
        <li>Pengurus</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Team Section ======= -->
<section id="team" class="team ">
  <div class="container">
    <div class="section-title">
      <h2>Pengurus</h2>
      <p>Mentari Sehat Indonesia</p>
    </div>
    <div class="row justify-content-center" style="row-gap: 20px;">
      @foreach($teams as $team)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member d-flex flex-column align-items-center">
          <img src="{{ asset('storage/' . $team->image) }}" class="img-fluid" alt="" />
          <div class="member-info">
            <h4>
              {{ $team->nama }}
            </h4>
            <span>
              {{ $team->jabatan }}
            </span>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section><!-- End Team Section -->
@endsection


@section('script')

@endsection