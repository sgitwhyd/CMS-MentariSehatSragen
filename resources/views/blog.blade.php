@extends('layouts.main')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <ol>
        <li>Berita dan Kegiatan</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Blog</h2>
      <p>Berita dan Kegiatan</p>
    </div>
    <div class="row" style="row-gap: 20px;">
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
            <div class="read-more">
              <a href="/blog/{{ $blog->slug }}">
                Selengkapnya
              </a>
            </div>
          </div>
        </article>
      </div>
      @endforeach

      <div class="blog-pagination">
        <ul class="justify-content-center">
          <li><a href="#">1</a></li>
          <li class="active"><a href="#">2</a></li>
          <li><a href="#">3</a></li>
        </ul>
      </div>
    </div>
</section><!-- End Blog Section -->
@endsection


@section('script')

@endsection