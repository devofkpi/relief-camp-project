@extends('layouts.main_layout')
@section('title')
View Profile
@endsection
@section('content1')
<div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Change Password</h3>
          </div>
          <form action="{{route('change_pwd.post')}}" method="post">
            @csrf
            <div class="card-body">
            <div class="input-group mb-3">
                <input type="password" placeholder="Password" class="form-control" name="full_name" id="full_name">
            </div>
            <div class="input-group mb-3">
                <input type="password" placeholder="Confirm Password" class="form-control" name="full_name" id="full_name">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection