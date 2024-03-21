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
              <input type="text" class="form-control" id="maps" name="maps" required="">
              <div class="invalid-feedback">link Gmaps harus diisi!</div>
            </div>
            <div class="col-md-12">
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
          <div class="card-body">
            <div class="card-title">Kontak Detail</div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Email</div>
              <div class="col-lg-9 col-md-8">{{$contact->email}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">No. Telp</div>
              <div class="col-lg-9 col-md-8">{{$contact->no_telp}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Alamat</div>
              <div class="col-lg-9 col-md-8">{{$contact->alamat}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Link Gmaps</div>
              <div class="col-lg-9 col-md-8">{!!$contact->maps!!}</div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
</section>

@endsection

@section('script')

@endsection