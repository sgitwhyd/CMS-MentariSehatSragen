@extends('admin.layouts.main')

@section('title')
<title>Visi Misi</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Visi Misi</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
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
  </div>
</section>

@endsection

@section('script')
<script>
  if ($('.quill-editor-visi')) {
    new Quill(".quill-editor-visi", {
      modules: {
        toolbar: [
          [
            { font: [] },
            { size: [] }
          ],
          ["bold", "italic", "underline", "strike"],
          [
            { color: [] },
            { background: [] }
          ],
          [
            { script: "super" },
            { script: "sub" }
          ],
          [
            { list: "ordered" },
            { list: "bullet" },
            { indent: "-1" },
            { indent: "+1" }
          ],
          [
            "direction",
            { align: [] }
          ],
          ["link", "image", "video"],
          ["clean"]
        ]
      },
      theme: "snow"
    });
  }
  
  if ($('.quill-editor-misi')) {
    new Quill(".quill-editor-misi", {
      modules: {
        toolbar: [
          [
            { font: [] },
            { size: [] }
          ],
          ["bold", "italic", "underline", "strike"],
          [
            { color: [] },
            { background: [] }
          ],
          [
            { script: "super" },
            { script: "sub" }
          ],
          [
            { list: "ordered" },
            { list: "bullet" },
            { indent: "-1" },
            { indent: "+1" }
          ],
          [
            "direction",
            { align: [] }
          ],
          ["link", "image", "video"],
          ["clean"]
        ]
      },
      theme: "snow"
    });
  }

  $(document).ready(function() {
    $('#form').submit(function(e) {
      e.preventDefault();
      var visi = $('.quill-editor-visi').html();
      var misi = $('.quill-editor-misi').html();
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