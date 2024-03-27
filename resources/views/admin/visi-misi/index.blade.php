@extends('admin.layouts.main')

@section('title')
<title>Visi Misi</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Visi Misi</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pages</a></li>
      <li class="breadcrumb-item active">Visi Misi</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form id="form" novalidate>
            @csrf
            <!-- visi content -->
            <h5 class="card-title">VISI</h5>
            <div class="quill-editor-visi" style="height: 300px;">
              @if($visiMisi)
              {!!$visiMisi->content_visi!!}
              @endif
            </div>
            <!-- misi content -->
            <h5 class="card-title">MISI</h5>
            <div class="quill-editor-misi" style="height: 300px;">
              @if($visiMisi)
              {!!$visiMisi->content_misi!!}
              @endif
            </div>
            <div class="col-12 mt-3">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- visi misi list -->
    @if($visiMisi)
    <div class="col-12">
      <div class="card">
        <div class="card-body p-5">
          <section id="services" class="services">
            <div class="container">
              <div class="section-title">
                <h2></h2>
                <p>Visi dan Misi</p>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <h2 class="text-center mb-3">Visi</h2>
                  {!! $visiMisi->content_visi !!}
                </div>
                <div class="col-lg-6 col-md-12">
                  <h2 class="text-center mb-3">Misi</h2>
                  {!! $visiMisi->content_misi !!}
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

  const vision = new Quill(".quill-editor-visi", {
    modules: {
      toolbar: toolbarOptions
    },
    theme: "snow",
    placeholder: 'Tulis Visi MSI disini..'
  });

  const mision = new Quill(".quill-editor-misi", {
    modules: {
      toolbar: toolbarOptions
    },
    theme: "snow",
    placeholder: 'Tulis Misi MSI disini..'
  });

  $('#form').submit(function(e) {
    e.preventDefault();
    var visi = vision.root.innerHTML;
    var misi = mision.root.innerHTML;

    var data = {
      visi: visi,
      misi: misi
    }
    $.ajax({
      url: "{{ route('visiMisiStore') }}",
      type: "POST",
      dataType: "json",
      data: data,
      headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
      },
      success: function(response) {
        location.reload();
      },
      error: function(error) {
        console.log(error);
      }
    });
  })
});
</script>
@endsection