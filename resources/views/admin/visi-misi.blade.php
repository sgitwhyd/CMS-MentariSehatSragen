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
          <form action="" method="post" novalidate>
            @csrf
            <!-- visi content -->
            <h5 class="card-title">VISI</h5>
            <div class="quill-editor-visi">
              <p>Content for visi here</p>
              <p>Write all about visi</p>
            </div>
            <textarea style="display:none;" name="visi" id="visi"></textarea>
            <!-- misi content -->
            <h5 class="card-title">MISI</h5>
            <div class="quill-editor-misi" name="misi">
              <p>Content for misi here</p>
              <p>Write all about misi</p>
            </div>
            <div class="col-12 mt-3">
              <button class="btn btn-primary" type="submit" onClick="storeVisiMisi()">Simpan</button>
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
  function storeVisiMisi(e) {
    e.preventDefault();
    alert('Visi');
    var visi = document.getElementById('visi').value;
    var misi = document.getElementById('misi').value;
    var data = {
      visi: visi,
      misi: misi
    }
    $.ajax({
      url: "",
      method: "POST",
      data: data,
      success: function(response) {
        console.log(response);
      }
    })
  }
</script>
@endsection