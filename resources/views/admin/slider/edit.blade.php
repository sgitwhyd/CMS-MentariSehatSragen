@extends('admin.layouts.main')

@section('title')
<title>Slider</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Slider</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pages</a></li>
      <li class="breadcrumb-item">Slider</li>
      <li class="breadcrumb-item active">Edit Slider</li>
    </ol>
  </nav>
</div>

<section class="section dashboard">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Custom Slider</h5>
               <form action="{{route('slider-update')}}" method="POST" class="row g-3" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <input type="hidden" name="id" id="id" value="{{$slider->id}}">
               <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-10">
                     <input class="form-control" type="text" id="title" name="title" value="{{ $slider->title }}" required>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">Deskripsi</label>
                  <div class="col-sm-10">
                     <input class="form-control" type="text" id="description" name="description" value="{{$slider->description}}">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">File gambar</label>
                  <div class="col-sm-10">
                     <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                     @if($slider->image)
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="preview-img" class="img-preview img-fluid mb-3 col-sm-5" style="width: 300px;">
                     @endif
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">Urutan Slider</label>
                  <div class="col-sm-10">
                     <input class="form-control" type="number" id="sort" name="sort" value="{{$slider->sort}}" required>
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
  imgPreview.style.height = '300px';
  imgPreview.style.objectFit = 'cover';

  const fileReader = new FileReader();
  fileReader.readAsDataURL(file);

  fileReader.onload = function(event) {
    imgPreview.src = event.target.result;
  }
}
</script>

@endsection