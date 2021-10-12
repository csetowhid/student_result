<div class="card-body">
  {{-- @if($errors->any())
  @foreach ($errors->all() as $error)
     <div>{{ $error }}</div>
 @endforeach
@endif  --}}
    <div class="form-group">
      <label>Student</label>
      <select class="form-control" name="student_id" required>
        <option value="">Select</option>
        @if(!empty($students))
        @foreach ($students as $student)
        <option value="{{$student->id}}">{{$student->first_name}}</option>
        @endforeach
        @endif
      </select>
    </div>
    <div class="form-group">
      <label>Subject</label>
      <select class="form-control" name="subject_id" required>
        <option value="">Select</option>
        @if(!empty($subjects))
        @foreach ($subjects as $subject)
        <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
        @endforeach
        @endif
      </select>
      {{-- <p>{{$errors->first('subject_id')}}</p> --}}
    </div>
    <div class="form-group">
      <label for="Email address">Mark</label>
      <input type="number" name="marks" class="form-control" placeholder="Enter Mark" min="0" max="100" required>
      {{-- <p>{{$errors->first('last_name')}}</p> --}}
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Insert</button>
  </div>