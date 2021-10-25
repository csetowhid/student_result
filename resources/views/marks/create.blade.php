@extends('home.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Student Marks</h1>
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
                <div class="card-header">
                  <h3 class="card-title">Add Student Marks</h3>
                </div>
                <form action="{{route('marks.store')}}" method="POST">
                  @csrf
                  {{-- @include('marks._form', ['buttonText' => __('Insert')]) --}}


                   <!------------------------------>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Class</label>
                          <select id="select_student" class="form-control" name="class_id">
                            <option value="">Select</option>
                            @if(!empty($class))
                            @foreach ($class as $clas)
                            <option value="{{$clas->id}}">{{$clas->class_name}}</option>
                            @endforeach
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">

                        <div class="form-group">
                          <label>Student</label>
                          <select class="form-control" name="student_id" id="student">
                            
                          </select>
                        </div>

                        {{-- <div class="form-group">
                          <label>Student</label>
                          <select class="form-control" name="student_id">
                            <option value="">Select</option>
                            @if(!empty($students))
                            @foreach ($students as $student)
                            <option value="{{$student->id}}">{{$student->first_name}}</option>
                            @endforeach
                            @endif
                          </select>
                        </div> --}}
                      </div>
                    </div>
                   
                  
                      <div class="row">
                        @if(!empty($subjects))
                          @foreach ($subjects as $subject)
                        <div class="col-md-6">
                          <label class="form-control">{{$subject->subject_name}}</label>
                          <input type="hidden" name="subject_id[]" value="{{$subject->id}}">
                        </div>
                        <div class="col-md-6">
                          <input type="number" name="marks[]" class="form-control" placeholder="Enter Mark" min="0" max="100">
                        </div>
                       
                          @endforeach
                          @endif
                        </div>
                      </div>
                  
                    
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
  <!------------------------------>                  
                </form>
              </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
@section('js')
<script type=text/javascript>
  $('#select_student').change(function(){
  var classs_Id = $(this).val();  
  if(classs_Id){
    $.ajax({
      type:"GET",
      // url:"{{url('selectstudent')}}/"+classs_Id,
      url: "<?php echo env('APP_URL'); ?>/selectstudent/" + classs_Id,

      success:function(res){    

        // console.log(res); 
      if(res){
        $("#student").empty();
        $("#student").append('<option>Select Student</option>');
        $.each(res,function(key,value){
          $("#student").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#student").empty();
      }
      }
    });
  }else{
    $("#student").empty();
  }   
  });

</script>
@endsection