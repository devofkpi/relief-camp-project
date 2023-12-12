@extends('layouts.main_layout')
@section('title')
View Profile
@endsection
@section('page_related_css')
  <!-- Toastr -->
  <link rel="stylesheet" href={{ asset('/plugins/toastr/toastr.min.css')}}>
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
                <input type="text" class="form-control" value="{{$user->name}}" name="full_name" id="full_name">
            </div>
            @if($user->role==3)
            <div class="input-group mb-3">
              <input type="text" class="form-control" value="{{$nodal_officer->officer_contact}}" name="officer_cotact">
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" value="{{$nodal_officer->officer_designation}}" name="officer_designation">
            </div>
            
            @endif
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <input type="hidden" value="{{ $user->id}}" name="user_id">
          </form>
          @if(session()->has('success'))
            <p style="display: none" id="edit_msg">{{session()->get('success')}}</p>
          @endif
        </div>
      </div>
</div>
@endsection
@section('custom_script')
<!-- Toastr -->
<script src="{{ asset('/plugins/toastr/toastr.min.js')}}"></script>
<script>
$(window).on('load',function(e) {
      var toastr_msg=$('#edit_msg').text();
      if(toastr_msg){
        toastr.success(toastr_msg);
      }
});
</script>
@endsection