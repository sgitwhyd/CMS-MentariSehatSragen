@extends('admin.layouts.main')

@section('title')
<title>Pengurus</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Pengurus</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Pengurus</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Pengurus</h5>

          <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate="">
            @csrf
            <div class="col-md-6">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required="">
              <div class="invalid-feedback">Nama harus diisi!</div>
            </div>
            <div class="col-md-6">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" required="">
              <div class="invalid-feedback">Jabatan harus diisi!</div>
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