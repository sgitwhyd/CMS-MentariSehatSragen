@extends('admin.layouts.main')

@section('title')
<title>Footer</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Footer</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pages</a></li>
      <li class="breadcrumb-item active">Footer</li>
    </ol>
  </nav>
</div>

<div class="success-alert" data-alert="{{session('success')}}"></div>
<div class="danger-alert" data-alert="{{session('error')}}"></div>
<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Custom Footer</h5>
          <form action="" method="POST" class="row g-3" id="form" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
              <label for="title" class="form-label">Judul</label>
              <input type="text" class="form-control" id="title" name="title">
              <div class="invalid-feedback">Judul harus diisi!</div>
            </div>
            <div class="col-md-6">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
              <div class="invalid-feedback">Alamat harus diisi!</div>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" >
              <div class="invalid-feedback">Judul harus diisi!</div>
            </div>
            <div class="col-md-6">
              <label for="no_telp" class="form-label">No. Telp</label>
              <input type="number" class="form-control" id="no_telp" name="no_telp">
              <div class="invalid-feedback">Alamat harus diisi!</div>
            </div>
            <hr class="my-3">
            <div class="row mb-3">
              <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="facebook" name="facebook">
              </div>
            </div>
            <div class="row mb-3">
              <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="instagram" name="instagram">
              </div>
            </div>
            <div class="row mb-3">
              <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="twitter" name="twitter">
              </div>
            </div>
            <div class="row mb-3">
              <label for="tiktok" class="col-sm-2 col-form-label">Tiktok</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tiktok" name="tiktok">
              </div>
            </div>
            <div class="row mb-3">
              <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="youtube" name="youtube">
              </div>
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
     <!-- list footer -->
    @if ($footer)
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Footer Detail</div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Judul</div>
              <div class="col-lg-9 col-md-8">{{$footer->title}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Email</div>
              <div class="col-lg-9 col-md-8">{{$footer->email}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">No. Telp</div>
              <div class="col-lg-9 col-md-8">{{$footer->no_telp}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Alamat</div>
              <div class="col-lg-9 col-md-8">{{$footer->alamat}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Facebook</div>
              <div class="col-lg-9 col-md-8">{{$footer->facebook ? $footer->facebook : "-"}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Instagram</div>
              <div class="col-lg-9 col-md-8">{{$footer->instagram ? $footer->instagram : "-"}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Tiktok</div>
              <div class="col-lg-9 col-md-8">{{$footer->tiktok ? $footer->tiktok : "-"}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Twitter</div>
              <div class="col-lg-9 col-md-8">{{$footer->twitter ? $footer->twitter : "-"}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Youtube</div>
              <div class="col-lg-9 col-md-8">{{$footer->youtube ? $footer->youtube : "-"}}</div>
            </div>
            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 mb-2 label">Gambar Backgroud</div>
              @if ($footer->image)
                <img src="{{asset('images/footer/'.$footer->image)}}" alt="">
              @else
              <div class="col-lg-9 col-md-8"><span>-</span></div> 
              @endif
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
    console.log($('.success-alert').data('alert'));
    if($('.success-alert').data('alert')){
      Swal.fire({
        icon:'success',
        title: 'Success',
        text: $('.success-alert').data('alert')
      })
    }
    if($('.danger-alert').data('alert')){
      Swal.fire({
        icon:'danger',
        title: 'Error',
        text: $('.danger-alert').data('alert')
      })
    }
  });
</script>

@endsection