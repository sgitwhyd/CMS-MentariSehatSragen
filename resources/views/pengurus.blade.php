@extends('layouts.main')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
</section><!-- End Breadcrumbs -->

<!-- ======= Team Section ======= -->
<section id="team" class="team ">
  <div class="container">
    <div class="section-title">
      <h1>Pengurus</h1>
      <p>Mentari Sehat Indonesia</p>
    </div>
    <div class="row justify-content-center row-gap-5">
      @foreach($teams as $team)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member d-flex flex-column align-items-center">
          <img src="{{ asset('storage/' . $team->image) }}" class="img-fluid" alt="{{ $team->nama }} image" />
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