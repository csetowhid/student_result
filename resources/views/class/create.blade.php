@extends('home.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create Class</h1>
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
        <div class="mx-auto col-lg-6 col-6">
         
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add New Class</h3>
                </div>
                <form action="{{route('studentclasses.store')}}" method="POST">
                  @csrf
                  @include('class._form', ['buttonText' => __('Insert')])
                </form>
              </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection