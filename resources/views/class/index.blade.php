@extends('home.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Class List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="card">
    <div class="card-header">
      {{-- <h3 class="card-title">{{$marks->student->first_name}} Student Details</h3> --}}
      {{-- <h3 class="card-title">Name: <b>{{$students->first_name.' '.$students->last_name}}</b></h3> <br>
      <h3 class="card-title">Email: <b>{{$students->email}}</b></h3> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body mx-auto col-md-8">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">Class Name</th>
          <th class="text-center">Total Students</th>
        </tr> 
        </thead>
        <tbody>
          @forelse ($student_class as $class)
          <tr>
            <td class="text-center">{{$class->class_id}}</td>
            <td class="text-center">{{$class->total_student}}</td>
          </tr>
          @empty
          <td colspan="3">{{__('No Data Found')}}</td>
          @endforelse



        
        </tbody>
        
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection