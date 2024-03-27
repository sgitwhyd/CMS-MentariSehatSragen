@extends('layouts.main')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <ol>
        <li>Kontak</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">
    <div class="section-title">
      <h2>Kontak</h2>
      <p>Hubungi Kami</p>
    </div>

    <div class="maps">
      {!!$contact->maps!!}
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
              {{ $contact->alamat }}
            </p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email Us</h4>
            <p>
              {{ $contact->email }}
            </p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Telepon Kita</h4>
            <p>
              {{ $contact->no_telp }}
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
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
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
</section><!-- End Contact Section -->

@endsection


@section('script')
<script>
$(document).ready(function() {
  $('.maps iframe').prop('width', '100%');
});
</script>
@endsection