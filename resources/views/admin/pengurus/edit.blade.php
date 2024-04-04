@extends('admin.layouts.main')

@section('title')
<title>Pengurus</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Pengurus</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pages</a></li>
      <li class="breadcrumb-item">Pengurus</li>
      <li class="breadcrumb-item active">Edit Pengurus</li>
    </ol>
  </nav>
</div>

<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Custom Pengurus</h5>
          <form action="{{route('update-team')}}" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id" value="{{$pengurus->id}}">
            <div class="row mb-3">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="nama" name="nama" value="{{$pengurus->nama}}" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="jabatan" name="jabatan" value="{{$pengurus->jabatan}}"
                  required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">File gambar</label>
              <div class="col-sm-10">
                <input class="form-control mb-3" type="file" id="image" name="image" onchange="previewImage()">
                @if($pengurus->image)
                <img src="{{ asset('storage/' . $pengurus->image) }}" alt="preview-img"
                  class="img-preview img-fluid mb-3 col-sm-5" style="width: 300px;">
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <label for="sort" class="col-sm-2 col-form-label">Urutan</label>
              <div class="col-sm-10">
                <input class="form-control" type="number" id="sort" name="sort" value="{{$pengurus->sort}}" required>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @endsection


  @section('script')

  <script>
  "use strict";

  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    const file = image.files[0];
    if (file.size > 2 * 1024 * 1024) {
      image.value = '';
      alert('Image size exceeds 2MB limit. Please choose a smaller image.');
      return;
    }

    imgPreview.style.display = 'block';
    imgPreview.style.width = '500px';
    imgPreview.style.maxHeight = '300px';
    imgPreview.style.objectFit = 'cover';

    const fileReader = new FileReader();
    fileReader.readAsDataURL(file);

    fileReader.onload = function(event) {
      imgPreview.src = event.target.result;
    }
  }
  </script>

  @endsection