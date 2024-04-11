@extends('layouts.main')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h1>Blog</h1>
      <p>Berita dan Kegiatan</p>
    </div>
    <div class="row row-gap-5">
      @foreach($blogs as $blog)
      <div class="col-lg-4 col-md-6 entries">
        <article class="entry">
          <div class="entry-img">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }} blog image" loading="lazy">
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
            <p>
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

      {{ $blogs->links() }}
    </div>
  </div>
</section><!-- End Blog Section -->
@endsection


@section('script')

@endsection