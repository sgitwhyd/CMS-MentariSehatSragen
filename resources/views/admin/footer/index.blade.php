@extends('admin.layouts.main')

@section('title')
<title>Footer</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Footer</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pages</a></li>
      <li class="breadcrumb-item active">Footer</li>
    </ol>
  </nav>
</div>

<div class="success-alert" data-alert="{{session('success')}}"></div>
<div class="danger-alert" data-alert="{{session('error')}}"></div>
<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Custom Footer</h5>
          <form action="" method="POST" class="row g-3" id="form" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
              <label for="title" class="form-label">Judul</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $footer->title ?? '' }}">
            </div>
            <div class="col-md-12">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="6">{{ $footer->alamat ?? '' }}</textarea>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $footer->email ?? '' }}">

            </div>
            <div class="col-md-6">
              <label for="no_telp" class="form-label">No. Telp</label>
              <input type="number" class="form-control" id="no_telp" name="no_telp"
                value="{{ $footer->no_telp ?? '' }}">

            </div>
            <hr class=" my-3">
            <div class="row mb-3">
              <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="facebook" name="facebook"
                  value="{{ $footer->facebook ?? '' }}">
              </div>
            </div>
            <div class=" row mb-3">
              <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="instagram" name="instagram"
                  value="{{ $footer->instagram ?? '' }}">
              </div>
            </div>
            <div class=" row mb-3">
              <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="twitter" name="twitter"
                  value="{{ $footer->twitter ?? '' }}">
              </div>
            </div>
            <div class=" row mb-3">
              <label for="tiktok" class="col-sm-2 col-form-label">Tiktok</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ $footer->tiktok ?? '' }}">
              </div>
            </div>
            <div class=" row mb-3">
              <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="youtube" name="youtube"
                  value="{{ $footer->youtube ?? '' }}">
              </div>
            </div>
            <hr class=" my-3">
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">File gambar</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="image" name="image">
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- list footer -->
    @if ($footer)
    <div class="col-12">
      <div class="card">
        <div class="card-body p-5">
          @php

          $bg_footer = asset('images/footer/' . $footer->image);

          @endphp
          <footer id="footer-admin" style="
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
        </div>
      </div>
    </div>
    @endif
  </div>
</section>

@endsection