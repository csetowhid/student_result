<div class="card-body">
  {{-- @if($errors->any())
  @foreach ($errors->all() as $error)
     <div>{{ $error }}</div>
 @endforeach
@endif  --}}
    <div class="form-group">
      <label for="First Name">First Name</label>
      <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
      <p>{{$errors->first('first_name')}}</p>
    </div>
    <div class="form-group">
      <label for="Last Name">Last Name</label>
      <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
      <p>{{$errors->first('last_name')}}</p>
    </div>
    <div class="form-group">
      <label for="Email address">Email address</label>
      <input type="email" name="email" class="form-control" placeholder="Enter email">
      {{-- <p>{{$errors->first('last_name')}}</p> --}}
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Insert</button>
  </div>