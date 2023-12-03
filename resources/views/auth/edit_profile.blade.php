@extends('layouts.main_layout')
@section('title')
View Profile
@endsection
@section('content1')
<div class="row justify-content-center">
    <div class="col-md-6">
<!-- general form elements -->
      <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Profile</h3>
          </div>
          <form action="{{route('edit_profile.post')}}" method="post">
            @csrf
            <div class="card-body">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Full name" name="full_name" id="full_name">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="create_user">Register</button>
            </div>
          </form>
        </div>
      </div>
</div>
@endsection