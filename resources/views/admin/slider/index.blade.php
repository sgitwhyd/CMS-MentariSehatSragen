@extends('admin.layouts.main')

@section('title')
<title>Slider</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Slider</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pages</a></li>
      <li class="breadcrumb-item active">Slider</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="success-alert" data-alert="{{session('success')}}"></div>
<div class="danger-alert" data-alert="{{session('error')}}"></div>
<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Custom Slider</h5>
          <form action="" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">Judul</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="title" value="{{old('title')}}" name="title" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="description" value="{{old('description')}}"
                  name="description" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">File gambar</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()" required>
                <img src="" alt="" class="img-preview img-fluid mb-3 mt-3 col-sm-5" style="width: 300px;">
              </div>
            </div>
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">Urutan Slider</label>
              <div class="col-sm-10">
                <input class="form-control" type="number" id="sort" value="{{old('sort')}}" name="sort" required>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form><!-- End Custom Styled Validation -->
        </div>
      </div>
    </div>
    <!-- slider list -->
    @if (count($slider) > 0)
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Pengurus</h5>
          <table class="table datatable-teams" id="table-teams">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th width="25%">Judul</th>
                <th width="30%">Deskripsi</th>
                <th width="25%">Gambar</th>
                <th width="5%">Slider</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($slider as $key => $value)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->title}}</td>
                <td>{{$value->description}}</td>
                <td><img width="50%" src="{{asset('storage/'.$value->image)}}" alt="..."></td>
                <td>{{$value->sort}}</td>
                <td>
                  <button type="button" class="btn btn-danger" onclick="sliderDelete('{{$value->id}}')"><i
                      class="bi bi-trash"></i></button>
                  <a href="{{route('edit-slider', 'd='.$value->id)}}" class="btn btn-warning"><i
                      class="bi bi-pencil"></i></a>
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
"use strict";

function sliderDelete(id) {
  if (confirm('Anda yakin ingin menghapus slider?')) {
    $.ajax({
      url: "{{route('slider.destroy')}}",
      type: 'POST',
      dataType: 'json',
      data: {
        'id': id,
        '_token': "{{ csrf_token() }}"
      },
      success: function(result) {
        location.reload();
      }
    })
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
  imgPreview.style.width = '500px';
  imgPreview.style.maxHeight = '300px';
  imgPreview.style.objectFit = 'cover';

  const fileReader = new FileReader();
  fileReader.readAsDataURL(file);

  fileReader.onload = function(event) {
    imgPreview.src = event.target.result;
  }
}
</script>
@endsection