@extends('admin.layouts.main')

@section('title')
<title>Change Password</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item active">Change Password</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="col-12">
    <div class="card">
      <div class="card-body mt-5">
        <form action="{{route('change-pass')}}" method="POST">
          @csrf
          <input type="hidden" name="id" id="id_user" value="{{$profile->id}}">
          <div class="row mb-3">
            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
            <div class="col-md-8 col-lg-9">
              <input name="oldpassword" type="password" class="form-control" id="currentPassword">
            </div>
          </div>

          <div class="row mb-3">
            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
            <div class="col-md-8 col-lg-9">
              <input name="newpassword" type="password" class="form-control" id="newPassword">
            </div>
          </div>

          <div class="row mb-3">
            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
            <div class="col-md-8 col-lg-9">
              <input name="renewpassword" type="password" class="form-control" id="renewPassword">
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Change Password</button>
          </div>
        </form><!-- End Change Password Form -->
      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')

@endsection