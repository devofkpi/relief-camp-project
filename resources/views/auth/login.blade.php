<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Relief Camp | Log in</title>

  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Relief </b>Camp</a>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      
      @if($errors->has('email'))
          <p class="login-box-msg text-danger">{{$errors->first('email')}}</p>
      @elseif($errors->has('password'))
        <p class="login-box-msg text-danger">{{$errors->first('password')}}</p>
      @elseif($errors->has('wrong_credentials'))
        <p class="login-box-msg text-danger">{{$errors->first('wrong_credentials')}}</p>
      @endif
      <form action="{{route('login.post')}}" method="post" id="login_form">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="login_pwd" name="password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="login_btn" name="login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.min.js')}} "></script>
<script src="{{ asset('/js/forge-sha256.js')}}"></script>
<script src="{{ asset('/js/main.js')}}"></script>
</body>
</html>
