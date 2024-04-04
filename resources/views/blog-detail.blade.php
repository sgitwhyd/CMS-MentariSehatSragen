@extends('layouts.main')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <ol>
        <li>
          <a href="/blog">
            Berita dan Kegiatan
          </a>
        </li>
        <li>
          {{ $blog->title }}
        </li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-12 entries">
        <article class="entry single">
          <div class="entry-img-detail">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }} Image">
          </div>
          <h2 class="entry-title">
            {{ $blog->title }}
          </h2>

          <div class="entry-meta">
            <i class="bi bi-clock"></i>
            {{ date('d F Y', strtotime($blog->created_at)) }}
          </div>

          <div class="entry-content">
            {!!$blog->content!!}
          </div>
        </article><!-- End blog entry -->



      </div><!-- End blog entries list -->
    </div>
  </div>
</section><!-- End Blog Single Section -->

@endsection


@section('script')

@endsection