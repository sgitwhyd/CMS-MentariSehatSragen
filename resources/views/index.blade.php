@extends('layouts.main')

@section('slider')
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide 1 -->
      @foreach($sliders as $slide)
      @php
      $bgUrl = asset('storage/' . $slide->image);
      @endphp
      <div class="carousel-item active" style="background-image: url('{{ $bgUrl }}')">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">
              {{ $slide->title }}
            </h2>
            <p class="animate__animated animate__fadeInUp">
              {{ $slide->description }}
            </p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>
  </div>
</section><!-- End Hero -->

@endsection

@section('content')
<!-- page section here -->
<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container">
    <div class="row content align-items-center">
      <div class="col-lg-6 d-flex justify-content-center">
        <img src="{{asset('storage/'.$about->image)}}" class="img-fluid" alt="Mentari Sehat Image">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 ">
        <div class="text-content">
          {!!$about->content!!}
        </div>
      </div>
    </div>
  </div>
</section><!-- End About Section -->

<!-- ======= Visi Misi Section ======= -->
<section id="services" class="services">
  <div class="container">
    <div class="section-title">
      <h2></h2>
      <p>Visi dan Misi</p>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <h2 class="text-center mb-3">Visi</h2>
        {!! $visimisi->content_visi !!}
      </div>
      <div class="col-lg-6 col-md-12">
        <h2 class="text-center mb-3">Misi</h2>
        {!! $visimisi->content_misi !!}
      </div>
    </div>
  </div>
</section><!-- End Visi Misi Section -->

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

<section id="blog" class="blog">
  <div class="container">
    <div class="section-title">
      <h2>Blog</h2>
      <p>Berita dan Kegiatan</p>
    </div>
    <div class="row justify-content-center" style="row-gap: 24px;">
      @foreach($blogs as $blog)
      <div class="col-lg-4 col-md-6 entries">
        <article class="entry">
          <div class="entry-img">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }} blog image">
          </div>
          <h2 class="entry-title truncate">
            {{$blog->title}}
          </h2>
          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                {{ date('d F Y', strtotime($blog->created_at)) }}
              </li>
            </ul>
          </div>
          <div class="entry-content">
            <p class="truncate">
              {{$blog->description}}
            </p>
            <div class="btn-wrap">
              <a href="/blog/{{ $blog->slug }}" class="btn-buy">Selengkapnya...</a>
            </div>
          </div>
        </article>
      </div>
      @endforeach



    </div>
  </div>
</section>

@endsection

@section('script')
<!-- page script here -->
@endsection