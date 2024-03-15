@extends('admin.layouts.main')

@section('title')
<title>Footer</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Footer</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Footer</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Custom Footer</h5>

          <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate="">
            @csrf
            <div class="col-md-6">
              <label for="title" class="form-label">Judul</label>
              <input type="text" class="form-control" id="title" name="title" required="">
              <div class="invalid-feedback">Judul harus diisi!</div>
            </div>
            <div class="col-md-6">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" required="">
              <div class="invalid-feedback">Alamat harus diisi!</div>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required="">
              <div class="invalid-feedback">Judul harus diisi!</div>
            </div>
            <div class="col-md-6">
              <label for="no_telp" class="form-label">No. Telp</label>
              <input type="number" class="form-control" id="no_telp" name="no_telp" required="">
              <div class="invalid-feedback">Alamat harus diisi!</div>
            </div>
            <hr class="my-3">
            <div class="row mb-3">
              <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="facebook" name="facebook">
              </div>
            </div>
            <div class="row mb-3">
              <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="instagram" name="instagram">
              </div>
            </div>
            <div class="row mb-3">
              <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="twitter" name="twitter">
              </div>
            </div>
            <div class="row mb-3">
              <label for="tiktok" class="col-sm-2 col-form-label">Tiktok</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tiktok" name="tiktok">
              </div>
            </div>
            <div class="row mb-3">
              <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="youtube" name="youtube">
              </div>
            </div>
            <hr class="my-3">
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">File gambar</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="image" name="image">
              </div>
            </div>

            <div class="col-12">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form><!-- End Custom Styled Validation -->

        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')

@endsection