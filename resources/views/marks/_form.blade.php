<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Class</label>
        <select id="class_idd" class="form-control" name="class_id">
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
        <select class="form-control" name="student_id">
          <option value="">Select</option>
          @if(!empty($students))
          @foreach ($students as $student)
          <option value="{{$student->id}}">{{$student->first_name}}</option>
          @endforeach
          @endif
        </select>
      </div>
    </div>
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

    {{-- <div class="form-group">
      <label>Subject</label>
      <select class="form-control" name="subject_id" required>
        <option value="">Select</option>
        @if(!empty($subjects))
        @foreach ($subjects as $subject)
        <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
        @endforeach
        @endif
      </select>
      
    </div> --}}
    {{-- <div class="form-group">
      <label for="Email address">Mark</label>
      <input type="number" name="marks" class="form-control" placeholder="Enter Mark" min="0" max="100" required>
    </div> --}}
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Insert</button>
  </div>
  