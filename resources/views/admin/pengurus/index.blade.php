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
          <form action="" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="nama" name="nama" value="{{old('nama')}}" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="jabatan" name="jabatan" value="{{old('jabatan')}}" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">File gambar</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()" required>
                <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5" style="width: 300px;">
              </div>
            </div>
            <div class="row mb-3">
              <label for="sort" class="col-sm-2 col-form-label">Urutan</label>
              <div class="col-sm-10">
                <input class="form-control" type="number" id="sort" name="sort"value="{{old('sort')}}" required>
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
                <th width="25%">Position</th>
                <th width="25%">Profile</th>
                <th width="5%">Urutan</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teams as $key => $value)
                <tr>
                  <td>{{$key + 1}}</td>
                  <td>{{$value->nama}}</td>
                  <td>{{$value->jabatan}}</td>
                  <td><img width="50%" src="{{asset('storage/'.$value->image)}}" alt="..."></td>
                  <td>{{$value->sort}}</td>
                  <td>
                    <a href="{{route('edit-team', 'd='.$value->id)}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
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
  function previewImage () {
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