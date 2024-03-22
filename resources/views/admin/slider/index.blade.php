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
          <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate="">
            @csrf
            <div class="col-md-6">
              <label for="title" class="form-label">Judul</label>
              <input type="text" class="form-control" id="title" name="title" required>
              <div class="invalid-feedback">Judul harus diisi!</div>
            </div>
            <div class="col-md-6">
              <label for="description" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" id="description" name="description">
            </div>
            <hr class="my-3">
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label">File gambar</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="image" name="image" required>
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
            <div class="card-title">Slider List</div>
            <div class="row">
              @foreach ($slider as $key => $value)
              <div class="col-12 mb-3">
                <button class="btn mb-2 btn-danger" onclick="sliderDelete('{{$value->id}}')">Hapus</button>
                <h3>{{$value->title}}</h3>
                <h5>{{$value->description}}</h5>
                <img width="100%" src="{{asset('images/slider/'.$value->image)}}" alt="...">
                <hr class="my-3">
              </div>
              @endforeach
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
  $(document).ready(function() {
    if($('.success-alert').data('alert')) {
      Swal.fire({
        icon:'success',
        title: 'Success',
        text: $('.success-alert').data('alert'),
        showConfirmButton: false,
        timer: 1500
      })
    }
  });
  function sliderDelete(id) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "{{route('slider.destroy')}}",
          type: 'POST',
          dataType: 'json',
          data: {
            'id': id,
            '_token': "{{ csrf_token() }}"
          },
          success: function(result) {
            Swal.fire({
              icon:'success',
              title: 'Success',
              text: result['success'],
              showConfirmButton: false,
              timer: 2000
            }).then( () => {
              location.reload();
            })
          }
        })
      }
    });
  }
</script>
@endsection