@extends('home.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Upload Mark</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="mx-auto col-lg-8 col-8">
         
            <div class="card card-primary">
                {{-- <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h3 class="card-title">Add New Student</h3>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                      <a href="{{route('students.index')}}">All Students</a>
                    </div>
                  </div>
                  
                </div> --}}
                <form action="{{route('markuploads.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @include('markupload._form', ['buttonText' => __('Upload Mark')])
                </form>
              </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection