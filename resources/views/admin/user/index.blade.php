@extends('admin.layouts.main')

@section('title')
<title>User</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>User</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Management</a></li>
      <li class="breadcrumb-item active">User</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">User</h5>
          <form action="" method="POST" class="row g-3 needs-validation" novalidate="">
            @csrf
            <div class="row mb-3">
              <label for="name" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required="">
              </div>
            </div>
            <div class="row mb-3">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username" required="">
              </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" required="">
              </div>
            </div>
            <div class="row mb-3">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password" required="">
              </div>
            </div>
            <div class="row mb-3">
              <label for="role" class="col-sm-2 col-form-label">Role</label>
              <div class="col-sm-10">
                <select class="form-select" id="role" name="role" required="">
                  <option selected>Role...</option>
                  <option value="admin">Admin</option>
                  <option value="pengurus">Pengurus</option>
                </select>
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
    @if (count($users) > 0)
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar User</h5>          
          <table class="table datatable-users" id="table-users">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th width="30%">Name</th>
                <th width="25%">Username</th>
                <th width="15%">Email</th>
                <th width="15%">Role</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $key => $value)
                <tr>
                  <td>{{$key + 1}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->username}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->role}}</td>
                  <td>
                    <button type="button" class="btn btn-danger deleteUser" data-id="{{$value->id}}"><i class="bi bi-trash"></i></button>
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
    new DataTable('.datatable-users');
    $('#table-users tbody').on('click', '.deleteUser', function() {
      var id = $(this).data('id');
      $.ajax({
        url: "{{ route('userDelete') }}",
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