@extends('layouts.main_layout')
@section('title')
Create User
@endsection

@section('content1')
    <div class="row justify-content-center">
        <div class="col-md-6">
    <!-- general form elements -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Creation Form</h3>
              </div>
            <!-- /.card-header -->
              <form action="{{route('register.post')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Full name" name="full_name" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" name="email" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Retype password" name="confirm_password" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <select class="custom-select form-control-border" name="user_role" required>
                    <option value="">--Please select user role--</option>
                    <option value="super_user">Deputy Commissioner</option>
                    <option value="admin_user">Additional Deputy Commissioner</option>
                    <option value="normal_user">Sub Divisional Officer</option>
                  </select>
                </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="create_user">Register</button>
                </div>
              </form>
            </div>
          </div>
    </div>
@endsection