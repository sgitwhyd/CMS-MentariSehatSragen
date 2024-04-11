@extends('admin.layouts.main')

@section('title')
<title>Buat Berita atau Kegiatan</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Buat Berita dan Kegiatan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Buat Berita dan Kegiatan</li>
    </ol>
  </nav>
</div>

<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form id="form" novalidate>
            @csrf
            <div class="d-flex flex-column mb-3">
              <label for="title" class="card-title ">Judul</label>
              <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            </div>
            <div class="d-flex flex-column mb-3">
              <label for="decription" class="card-title">Deskripsi</label>
              <textarea class="form-control" name="description" id="description" onchange="onDecriptionChange()"
                style="height: 100px">{{ old('description') }}</textarea>
              <small id="descriptionHelp" class="form-text text-muted mt-2">Deskripsi tidak boleh lebih dari 255
                karakter
              </small>
            </div>

            <div class="d-flex flex-column mb-3">
              <h5 class="card-title">Content</h5>
              <div class="quill-editor-content" style="height: 300px;">
              </div>
              <input type="hidden" name="content" value="{{ old('content') }}">
            </div>
            <div class="d-flex flex-column mb-3">
              <label for="image" class=" col-form-label">
                Thumbnail Berita atau Kegiatan
              </label>
              <div class="col-sm-12">
                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()" required>
                <img src="" alt="image-preview" class="img-preview img-fluid mt-3 col-sm-5">
              </div>
            </div>
            <div class="col-12 mt-3">
              <button class="btn btn-primary" type="submit">Simpan</button>
              <a href="{{ route('berita-dan-kegiatan') }}" class="btn btn-secondary ">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>


  </div>
</section>

@endsection

@section('script')
<script>
"use strict";

function onDecriptionChange() {
  const description = document.querySelector('#description').value;
  if (description.length > 255) {
    alert('Deskripsi tidak boleh lebih dari 255 karakter');
    document.querySelector('#description').value = description.substring(0, 255);
  }
}

const previewImage = () => {
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');


  const file = image.files[0];
  if (file.size > 2 * 1024 * 1024) {
    image.value = '';
    alert('Image size exceeds 2MB limit. Please choose a smaller image.');
    return;
  }


  imgPreview.style.display = 'block';
  imgPreview.style.width = '350px';
  imgPreview.style.maxHeight = '350px';
  imgPreview.style.objectFit = 'contain';

  const fileReader = new FileReader();
  fileReader.readAsDataURL(file);

  fileReader.onload = function(event) {
    imgPreview.src = event.target.result;
  }



}


$(document).ready(function() {

  const toolbarOptions = [
    [{
      header: [1, 2, false]
    }],
    ['bold', 'italic', 'underline'],
    ['link', 'blockquote'],
    [{
      list: 'ordered'
    }, {
      list: 'bullet'
    }],
    [{
      indent: '-1'
    }, {
      indent: '+1'
    }],
    [{
      'align': []
    }],
    ['clean']
  ]

  const quill = new Quill(".quill-editor-content", {
    modules: {
      toolbar: toolbarOptions
    },
    theme: "snow",
    placeholder: 'Tulis Detail Berita dan Kegiatan disini...'
  });

  $('#form').submit(function(e) {
    e.preventDefault();
    var content = quill.root.innerHTML;

    $('#form input[name="content"]').val(content);

    var formData = new FormData(this);


    $.ajax({
      url: "{{ route('berita-dan-kegiatan-store') }}",
      type: "POST",
      data: formData,
      success: function(msg) {
        location.reload();
      },
      cache: false,
      contentType: false,
      processData: false
    });

  })
});
</script>
@endsection