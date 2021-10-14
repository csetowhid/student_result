<div class="card-body">
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="First Name">First Name</label>
      <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
      <p>{{$errors->first('first_name')}}</p>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="Last Name">Last Name</label>
      <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
      <p>{{$errors->first('last_name')}}</p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="Email address">Email address</label>
      <input type="email" name="email" class="form-control" placeholder="Enter email">
    </div>
  </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Class</label>
        <select class="form-control" name="class_id" required>
          <option value="">Select</option>
          @if(!empty($studentclass))
          @foreach ($studentclass as $class)
          <option value="{{$class->id}}">{{$class->class_name}}</option>
          @endforeach
          @endif
        </select>
      </div>
    
  </div>
</div>
    
    
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Insert</button>
  </div>