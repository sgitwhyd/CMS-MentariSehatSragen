@extends('layouts.main')

@section('slider')
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Sailor</span></h2>
            <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut
              et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse
              doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
            <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut
              et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse
              doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
            <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut
              et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse
              doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>
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
    <div class="row content">
      <div class="col-lg-6">
        <h2>Mentari Sehat Sragen</h2>
        <img src="https://mentarisehatindonesiakabdemak.com/public/assets/img/navbar-logo.png" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <p>
          Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
          velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laborum
        </p>
        <ul>
          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
          <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
            irure dolor in reprehenderit in</li>
        </ul>
        <p class="fst-italic">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.
        </p>
        <h5><a href="#">Selengkapnya...</a></h5>
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
        <div class="icon-box">
          <i class="bi bi-briefcase"></i>
          <h4><a href="#">Lorem Ipsum</a></h4>
          <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
            provident</p>
        </div>
        <div class="icon-box">
          <i class="bi bi-card-checklist"></i>
          <h4><a href="#">Dolor Sitema</a></h4>
          <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad
            limino ata</p>
        </div>
        <div class="icon-box">
          <i class="bi bi-bar-chart"></i>
          <h4><a href="#">Sed ut perspiciatis</a></h4>
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <h2 class="text-center mb-3">Misi</h2>
        <div class="icon-box">
          <i class="bi bi-binoculars"></i>
          <h4><a href="#">Nemo Enim</a></h4>
          <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum</p>
        </div>
        <div class="icon-box">
          <i class="bi bi-brightness-high"></i>
          <h4><a href="#">Magni Dolore</a></h4>
          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
            atque</p>
        </div>
        <div class="icon-box">
          <i class="bi bi-calendar4-week"></i>
          <h4><a href="#">Eiusmod Tempor</a></h4>
          <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi
          </p>
        </div>
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
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member d-flex flex-column align-items-center">
          <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="" />
          <div class="member-info">
            <h4>Walter White</h4>
            <span>Chief Executive Officer</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member d-flex flex-column align-items-center">
          <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="" />
          <div class="member-info">
            <h4>Walter White</h4>
            <span>Chief Executive Officer</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member d-flex flex-column align-items-center">
          <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="" />
          <div class="member-info">
            <h4>Walter White</h4>
            <span>Chief Executive Officer</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member d-flex flex-column align-items-center">
          <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="" />
          <div class="member-info">
            <h4>Walter White</h4>
            <span>Chief Executive Officer</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member d-flex flex-column align-items-center">
          <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="" />
          <div class="member-info">
            <h4>Walter White</h4>
            <span>Chief Executive Officer</span>
          </div>
        </div>
      </div>

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
      <div class="col-lg-4 col-md-6">
        <div class="box entry">
          <div class="pic">
            <img src="{{ asset('assets/img/blog/blog-1.jpg')}}" alt="">
          </div>
          <h4>
            YAYASAN MENTARI SEHAT INDONESIA KABUPATEN SRAGEN
          </h4>
          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a>
              </li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time
                    datetime="2020-01-01">Jan 1, 2020</time></a></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed reprehenderit adipisci provident laboriosam
            voluptate! Doloribus dolor porro dicta nesciunt quo aliquam recusandae laboriosam quibusdam consequuntur
            iste vel, tempora modi fugit!</p>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Selengkapnya...</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="box entry">
          <div class="pic">
            <img src="{{ asset('assets/img/blog/blog-1.jpg')}}" alt="">
          </div>
          <h4>
            YAYASAN MENTARI SEHAT INDONESIA KABUPATEN SRAGEN
          </h4>
          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a>
              </li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time
                    datetime="2020-01-01">Jan 1, 2020</time></a></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed reprehenderit adipisci provident laboriosam
            voluptate! Doloribus dolor porro dicta nesciunt quo aliquam recusandae laboriosam quibusdam consequuntur
            iste vel, tempora modi fugit!</p>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Selengkapnya...</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="box entry">
          <div class="pic">
            <img src="{{ asset('assets/img/blog/blog-1.jpg')}}" alt="">
          </div>
          <h4>
            YAYASAN MENTARI SEHAT INDONESIA KABUPATEN SRAGEN
          </h4>
          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a>
              </li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time
                    datetime="2020-01-01">Jan 1, 2020</time></a></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed reprehenderit adipisci provident laboriosam
            voluptate! Doloribus dolor porro dicta nesciunt quo aliquam recusandae laboriosam quibusdam consequuntur
            iste vel, tempora modi fugit!</p>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Selengkapnya...</a>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>

@endsection

@section('script')
<!-- page script here -->
@endsection