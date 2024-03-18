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
      <li class="breadcrumb-item active">Pengurus</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Pengurus</h5>
          <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate="">
            @csrf
            <div class="col-md-6">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required="">
              <div class="invalid-feedback">Nama harus diisi!</div>
            </div>
            <div class="col-md-6">
              <label for="jabatan" class="form-label">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" required="">
              <div class="invalid-feedback">Jabatan harus diisi!</div>
            </div>
            <hr class="my-3">
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">File gambar</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="image" name="image">
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- teams list -->
    @if (count($teams) > 0)
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Pengurus</h5>          
          <table class="table datatable-teams" id="table-teams">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th width="30%">Name</th>
                <th width="30%">Position</th>
                <th width="25%">Profile</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teams as $key => $value)
                <tr>
                  <td>{{$key + 1}}</td>
                  <td>{{$value->nama}}</td>
                  <td>{{$value->jabatan}}</td>
                  <td><img width="50%" src="{{asset('images/teams/'.$value->image)}}" alt="..."></td>
                  <td>
                    <button type="button" class="btn btn-danger deleteTeam" data-id="{{$value->id}}"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endif
  </div>
</section>

@endsection

@section('script')
<script>
  $(document).ready(function() {
    new DataTable('.datatable-teams');
    $('#table-teams tbody').on('click', '.deleteTeam', function() {
      var id = $(this).data('id');
      $.ajax({
        url: "{{ route('teamDelete') }}",
        type: "DELETE",
        data: {
          'id': id,
          '_token': "{{ csrf_token() }}"
        },
        success: function(msg) {
          location.reload();
        },
      });
    })
  });

</script>

@endsection