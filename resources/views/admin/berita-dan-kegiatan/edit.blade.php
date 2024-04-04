@extends('admin.layouts.main')

@section('title')
<title>Buat Berita atau Kegiatan</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Berita dan Kegiatan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Berita dan Kegiatan</li>
    </ol>
  </nav>
</div>

<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form id="form" novalidate action="{{ route('berita-dan-kegiatan-update', [
            'id' => $blog->id
          ]) }}">
            @csrf
            <div class="d-flex flex-column mb-3">
              <label for="title" class="card-title ">Judul</label>
              <input type="
              text" class="form-control" name="title" value="{{ $blog->title }}">
            </div>
            <div class="d-flex flex-column mb-3">
              <label for="decription" class="card-title">Deskripsi</label>
              <textarea class="form-control" name="description"
                style="height: 100px">{{ $blog->description }}</textarea>
            </div>

            <div class="d-flex flex-column mb-3">
              <h5 class="card-title">Content</h5>
              <div class="quill-editor-content" style="height: 300px;">
              </div>
              <input type="hidden" name="content" value="{{ $blog->content }}" required>
            </div>
            <div class="d-flex flex-column mb-3">
              <label for="image" class=" col-form-label">
                Thumbnail Berita atau Kegiatan
              </label>
              <div class="col-sm-12">
                <input class="form-control mb-3" type="file" id="image" name="image" onchange="previewImage()">
                @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="preview-img"
                  class="img-preview img-fluid mb-3 col-sm-5" style="width: 300px;">
                @else
                <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                @endif
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
  imgPreview.style.width = '500px';
  imgPreview.style.maxHeight = '300px';
  imgPreview.style.objectFit = 'cover';

  const fileReader = new FileReader();
  fileReader.readAsDataURL(file);

  fileReader.onload = function(event) {
    imgPreview.src = event.target.result;
  }

}


$(document).ready(function() {


  const quill = new Quill(".quill-editor-content", {
    modules: {
      toolbar: [
        ['bold', 'italic'],
        ['link', 'blockquote'],
        [{
          list: 'ordered'
        }, {
          list: 'bullet'
        }],
      ],
    },
    theme: "snow",
    placeholder: 'Tulis Detail Berita dan Kegiatan disini...'
  });


  quill.root.innerHTML = $('#form input[name="content"]').val();




  $('#form').submit(function(e) {
    e.preventDefault();
    var content = quill.root.innerHTML;

    $('#form input[name="content"]').val(content);

    var formData = new FormData(this);

    var url = $(this).attr('action');


    $.ajax({
      url: url,
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