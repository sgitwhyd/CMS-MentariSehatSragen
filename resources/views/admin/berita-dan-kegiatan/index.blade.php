@extends('admin.layouts.main')

@section('title')
<title>About</title>
@endsection

@section('content')

<div class="pagetitle">
  <h1>Berita dan Kegiatan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Berita dan Kegiatan</li>
    </ol>
  </nav>
</div>

<section class="section dashboard">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <a href="{{ route('berita-dan-kegiatan-create') }}" class="btn btn-primary">Buat Berita dan Kegiatan</a>
          </div>
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">
                  Publish at
                </th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($blogs as $key => $blog)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->description }}</td>
                <td>{{ $blog->created_at }}</td>
                <td>
                  <div class="d-flex" style="gap: 6px;">
                    <a href="/blog/{{ $blog->slug }}" target="_blank" class="badge bg-info">
                      <svg viewBox="0 0 24 24" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                          <path
                            d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path
                            d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                      </svg></a>
                    <a href="/admin/berita-dan-kegiatan/edit/{{ $blog->slug }}" class="badge bg-warning">
                      <svg viewBox="0 0 24 24" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                          <path
                            d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                            stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path
                            d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                            stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                      </svg>
                    </a>
                    <form action="{{ route('berita-dan-kegiatan-delete', ['blog' => $blog->id]) }}" method="post"
                      class='d-inline delete_form'>
                      @csrf
                      @method('delete')
                      <a href="#" class="badge bg-danger modalDeleteTrigger" data-bs-toggle="modal"
                        data-bs-target="#verticalycentered">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                          <g id="SVGRepo_iconCarrier">
                            <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                            <path d="M6 7V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V7"
                              stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                          </g>
                        </svg>
                      </a>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Hapus Data
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="d-flex justify-content-center">
            <svg viewBox="0 0 24 24" width="72" height="72" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <circle cx="12" cy="17" r="1" fill="#ce0d0d"></circle>
                <path d="M12 10L12 14" stroke="#ce0d0d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                </path>
                <path
                  d="M3.44722 18.1056L10.2111 4.57771C10.9482 3.10361 13.0518 3.10362 13.7889 4.57771L20.5528 18.1056C21.2177 19.4354 20.2507 21 18.7639 21H5.23607C3.7493 21 2.78231 19.4354 3.44722 18.1056Z"
                  stroke="#ce0d0d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </g>
            </svg>
          </div>
          <div class="text-center mt-3">
            <h5>
              Apakah anda yakin ingin menghapus data ini?
            </h5>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary " id="deleteConfirmButton">
            Ya
          </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')
<script>
"use strict";


$(document).ready(function() {

  $('.modalDeleteTrigger').click(function() {
    var form = $(this).closest('form.delete_form');
    $('#deleteConfirmButton').click(function() {
      form.submit();
    });
  });

  $('#form').submit(function(e) {
    e.preventDefault();
    var content = quill.root.innerHTML;


    var formData = new FormData(this);
    formData.append('content', content);

    $.ajax({
      url: "{{ route('aboutStore') }}",
      type: "POST",
      data: formData,
      success: function(msg) {
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