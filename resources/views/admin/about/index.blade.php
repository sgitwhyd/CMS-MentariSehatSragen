@extends('admin.layouts.main')

@section('title')
<title>Tentang MSI</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Tentang MSI</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pages</a></li>
      <li class="breadcrumb-item active">Tentang MSI</li>
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
            <h5 class="card-title">Content</h5>
            <div class="quill-editor-content" style="height: 300px;">
              @if($about)
              {!!$about->content!!}
              @endif
            </div>
            <hr class="my-3">
            <div class="d-flex flex-column mb-3">
              <label for="image" class="col-sm-2 col-form-label">File gambar</label>
              <input class="form-control" type="file" id="image" name="image">
            </div>
            <div class="col-12 mt-3">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    {{-- list about --}}
    @if($about)
    <div class="col-12">
      <div class="card">
        <div class="card-body p-5">
          <section id="about" class="about">
            <div class="container">
              <div class="section-title">
                <h2>Tentang Kami</h2>
                <p>Mentari Sehat Indonesia</p>
              </div>
              <div class="row content align-items-center">
                <div class="col-lg-6 d-flex justify-content-center">
                  <img src="{{asset('storage/'.$about->image)}}" class="img-fluid" alt="Mentari Sehat Image">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                  <div class="text-content">
                    {!!$about->content!!}
                  </div>
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
"use strict";


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
    placeholder: 'Tulis Tentang MSI disini..'
  });


  $('#form').submit(function(e) {
    e.preventDefault();
    var content = quill.root.innerHTML;

    var formData = new FormData(this);
    formData.append('content', content);

    $.ajax({
      url: "{{ route('aboutStore') }}",
      type: "POST",
      data: formData,
      success: function(result) {
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