@extends('home.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 col-md-6">
          <h1 class="m-0">All Student Details</h1>
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
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">Sl. No</th>
          <th class="text-center">Class Name</th>
          <th class="text-center">First Name</th>
          <th class="text-center">Last Name</th>
          <th class="text-center">Email</th>
        </tr> 
        </thead>
        <tbody>
          @forelse ($students as $key => $student)
          <tr>
            <td class="text-center">{{$key+1}}</td>
            <td class="text-center">{{$student->classname->class_name}}</td>
            <td class="text-center">{{$student->first_name}}</td>
            <td class="text-center">{{$student->last_name}}</td>
            <td class="text-center">{{$student->email}}</td>
          </tr>
          @empty
          <td colspan="3">{{__('No Data Found')}}</td>
          @endforelse



        
        </tbody>
        
      </table>

      <div class="my-4">
        {{-- {{$list->links()}} --}}
      </div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection