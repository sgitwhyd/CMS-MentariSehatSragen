@extends('admin.layouts.main')

@section('title')
<title>Profile</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
   <div class="row">
     <div class="col-xl-4">
       <div class="card">
         <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
           <h2>{{ucwords($profile->full_name)}}</h2>
           <h3>{{ucwords($profile->job)}}</h3>
           <h3>Username : {{$profile->user->username}}</h3>
         </div>
       </div>
     </div>

     <div class="col-xl-8">
       <div class="card">
         <div class="card-body pt-3">
           <!-- Bordered Tabs -->
           <ul class="nav nav-tabs nav-tabs-bordered">
             <li class="nav-item">
               <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
             </li>
             <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
             </li>
             <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
             </li>
           </ul>
           <div class="tab-content pt-2">

             <div class="tab-pane fade show active profile-overview" id="profile-overview">
               <h5 class="card-title">Profile Details</h5>
               <div class="row">
                 <div class="col-lg-3 col-md-4 label">Full Name</div>
                 <div class="col-lg-9 col-md-8">{{$profile->full_name}}</div>
               </div>
               <div class="row">
                 <div class="col-lg-3 col-md-4 label">Company</div>
                 <div class="col-lg-9 col-md-8">{{$profile->company}}</div>
               </div>
               <div class="row">
                 <div class="col-lg-3 col-md-4 label">Job</div>
                 <div class="col-lg-9 col-md-8">{{$profile->job}}</div>
               </div>
               <div class="row">
                 <div class="col-lg-3 col-md-4 label">Address</div>
                 <div class="col-lg-9 col-md-8">{{$profile->address}}</div>
               </div>
               <div class="row">
                 <div class="col-lg-3 col-md-4 label">Phone</div>
                 <div class="col-lg-9 col-md-8">{{$profile->phone}}</div>
               </div>
             </div>

             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

               <!-- Profile Edit Form -->
               <form action="{{route('save-profile')}}" method="POST">
                  @csrf
                  <input type="hidden" name="id" id="id_profile" value="{{$profile->id}}">
                 <div class="row mb-3">
                   <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                   <div class="col-md-8 col-lg-9">
                     <input name="username" type="text" class="form-control" id="username" value="{{$profile->user->username}}">
                   </div>
                 </div>

                 <div class="row mb-3">
                   <label for="full_name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                   <div class="col-md-8 col-lg-9">
                     <input name="full_name" type="text" class="form-control" id="full_name" value="{{$profile->full_name}}">
                   </div>
                 </div>

                 <div class="row mb-3">
                   <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                   <div class="col-md-8 col-lg-9">
                     <input name="company" type="text" class="form-control" id="company" value="{{$profile->company}}">
                   </div>
                 </div>

                 <div class="row mb-3">
                   <label for="job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                   <div class="col-md-8 col-lg-9">
                     <input name="job" type="text" class="form-control" id="job" value="{{$profile->job}}">
                   </div>
                 </div>

                 <div class="row mb-3">
                   <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                   <div class="col-md-8 col-lg-9">
                     <input name="address" type="text" class="form-control" id="Address" value="{{$profile->address}}">
                   </div>
                 </div>

                 <div class="row mb-3">
                   <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                   <div class="col-md-8 col-lg-9">
                     <input name="phone" type="text" class="form-control" id="Phone" value="{{$profile->phone}}">
                   </div>
                 </div>

                 <div class="text-center">
                   <button type="submit" class="btn btn-primary">Save Changes</button>
                 </div>
               </form><!-- End Profile Edit Form -->
             </div>

             <div class="tab-pane fade pt-3" id="profile-change-password">
               <!-- Change Password Form -->
               <form action="{{route('change-pass')}}" method="POST">
                  @csrf
                  <input type="hidden" name="id" id="id_user" value="{{$profile->user->id}}">
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

           </div><!-- End Bordered Tabs -->

         </div>
       </div>

     </div>
   </div>
 </section>

 @endsection

 @section('scripts')

 @endsection