@extends('layouts.main_layout')
@section('title')
Create User
@endsection

@section('custom_head_data')
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
              <form action="{{route('register.post')}}" method="post" id="register_form">
                @csrf
                <div class="card-body">
                  @if(auth()->user()->role==0 || auth()->user()->role==1)
                <div class="input-group mb-3">
                  <select class="custom-select form-control-border" name="user_role" id="user_role" required>
                    <option value="" selected>--Please select user role--</option>
                    <option value="moderate_user">Sub Divisional Officer</option>
                    <option value="normal_user">Nodal Officer</option>
                  </select>
                  <input id="ajax_url" type="hidden" value="{{route('user_jurisdiction')}}" >
                </div>
                <div class="input-group mb-3">
                  <select class="custom-select form-control-border" name="user_jurisdiction" id="user_jurisdiction" required>
                    <option value="" selected>--Please Select Nodal Officer--</option>
                  </select>
                </div>
                @elseif(auth()->user()->role==2)
                <div class="input-group mb-3">
                  <select class="custom-select form-control-border" name="user_jurisdiction" id="user_jurisdiction" required>
                    <option value="" selected>--Please Select Nodal Officer--</option>
                  </select>
                </div>
                @endif
                  <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Full name" name="full_name" id="full_name" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                    <span class="text-danger" id="input_error_full_name"></span>
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
                  <input type="password" class="form-control" id="register_pwd" placeholder="Password" name="password" autocomplete="off" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" id="register_cnf_pwd" placeholder="Retype password" name="confirm_password" autocomplete="off" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="create_user" id="register_btn">Register</button>
                    @if($errors->any()){
                      @foreach($errors->all as $error){
                        <p class="login-box-msg text-danger">{{ $error }}</p>
                      }@endforeach
                    }
                    @endif
                </div>
              </form>
              @if(session()->has('success'))
                <p style="display: none" id="edit_msg">{{session()->get('success')}}</p>
              @elseif(session()->has('error'))
              <p style="display: none" id="edit_msg">{{session()->get('error')}}</p>
              @endif
            </div>
          </div>
    </div>
@endsection