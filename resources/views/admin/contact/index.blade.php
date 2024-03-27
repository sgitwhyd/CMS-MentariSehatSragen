@extends('admin.layouts.main')

@section('title')
<title>Contact</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Contact</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pages</a></li>
      <li class="breadcrumb-item active">Contact</li>
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
          <h5 class="card-title">Custom Contact</h5>

          <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate="">
            @csrf
            <div class="col-md-12">
              <label for="maps" class="form-label">Link Gmaps</label>
              <textarea class="form-control" id="maps" name="maps" rows="8">{{ $contact->maps ?? '' }}</textarea>

            </div>
            <div class="col-md-12">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $contact->alamat ?? '' }}">
              <div class="invalid-feedback">Alamat harus diisi!</div>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email ?? '' }}">

            </div>
            <div class="col-md-6">
              <label for="no_telp" class="form-label">No. Telp</label>
              <input type="number" class="form-control" id="no_telp" name="no_telp"
                value="{{ $contact->no_telp ?? '' }}">

            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- list footer -->
    @if ($contact)
    <div class="col-12">
      <div class="card">
        <div class="card-body p-5">
          <section id="contact" class="contact">
            <div class="container">
              <div class="section-title">
                <h2>Kontak</h2>
                <p>Hubungi Kami</p>
              </div>

              <div class="maps">
                {!! $contact->maps !!}
              </div>

              <div class="row mt-5">

                <div class="col-lg-4">
                  <div class="info">
                    <div class="address">
                      <i class="bi bi-geo-alt"></i>
                      <h4>
                        Alamat
                      </h4>
                      <p>
                        {{$contact->alamat}}
                      </p>
                    </div>

                    <div class="email">
                      <i class="bi bi-envelope"></i>
                      <h4>
                        Email Us
                      </h4>
                      <p>
                        {{$contact->email}}
                      </p>
                    </div>

                    <div class="phone">
                      <i class="bi bi-phone"></i>
                      <h4>
                        Telepon Kita
                      </h4>
                      <p>
                        {{$contact->no_telp}}
                      </p>
                    </div>

                  </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">
                  <form action="mailto:sigitwid.id@gmail.com" method="post" role="form" class="php-email-form">
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                          required>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                        required>
                    </div>
                    <div class="form-group mt-3">
                      <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                      <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    @endif
  </div>
</section>

@endsection

@section('script')
<script>
$(document).ready(function() {
  if ($('.success-alert').data('alert')) {
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: $('.success-alert').data('alert'),
      showConfirmButton: false,
      timer: 2000
    })
  }
})
</script>
@endsection