@extends('admin.layouts.main')

@section('title')
<title>About</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>About</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">About</li>
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
            <div class="quill-editor-content"> 
            </div>
            <hr class="my-3">
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">File gambar</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="image" name="image">
              </div>
            </div>
            <div class="col-12 mt-3">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    {{-- list about --}}
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">About Detail</h5>
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{asset('images/about/'.$about->image)}}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  {{-- <h5 class="card-title">Card with an image on left</h5> --}}
                  {!!$about->content!!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')
<script>
  "use strict";
  if ($('.quill-editor-content')) {
    var quill = new Quill(".quill-editor-content", {
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
      var content = quill.getContents('ops');
      console.log(content);
      return false;
      var formData = new FormData(this);
      formData.append('content', content);

      $.ajax({
        url: "{{ route('aboutStore') }}",
        type: "POST",
        data: formData,
        success: function (msg) {
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