@extends('admin.auth.layouts.main')

@section('title')
<title>Login</title>
@endsection

@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
        <div class="d-flex justify-content-center py-4">
          <img src="{{ asset('assets/logo.png') }}" alt="Mentari Sehat Idonesia Kab Sragen Logo" style="width: 150px;">
        </div><!-- End Logo -->
        <div class="card mb-3">
          <div class="card-body">
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Login to Admin Dashboard</h5>
              <p class="text-center small">Enter your username & password to login</p>
            </div>
            <form action="" method="POST" class="row g-3 needs-validation" novalidate>
              @csrf
              <div class="col-12">
                <label for="yourUsername" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                  aria-describedby="inputGroupPrepend" required>
              </div>
              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                  required>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection