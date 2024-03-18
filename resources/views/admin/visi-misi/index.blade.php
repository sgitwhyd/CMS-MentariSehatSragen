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
            <div class="quill-editor-visi"> 
            </div>
            <!-- misi content -->
            <h5 class="card-title">MISI</h5>
            <div class="quill-editor-misi">
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
        <div class="card-body">
          <div class="card-title">Visi dan Misi</div>
          <div class="row">
            <div class="col-6">
              <h5>Visi</h5>
              {!!$visiMisi->content_visi!!}
            </div>
            <div class="col-6">
              <h5>Misi</h5>
              {!!$visiMisi->content_misi!!}
            </div>
          </div>
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
    const vision = new Quill(".quill-editor-visi", {
      modules: {
        toolbar: [
          ["bold", "italic", "underline"],
          [
            { list: "ordered" },
            { list: "bullet" },
          ],
          [
            { align: [] }
          ],
          ['link', 'blockquote', 'code-block', 'image'],
        ]
      },
      theme: "snow"
    });
  
    const mision = new Quill(".quill-editor-misi", {
      modules: {
        toolbar: [
          ["bold", "italic", "underline"],
          [
            { list: "ordered" },
            { list: "bullet" },
          ],
          [
            { align: [] }
          ],
          ['link', 'blockquote', 'code-block', 'image'],
        ]
      },
      theme: "snow"
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