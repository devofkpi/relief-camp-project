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
                  <select class="custom-select form-control-border" name="user_role" id="user_role" required>
                    <option value="" selected>--Please select user role--</option>
                    <option value="moderate_user">Sub Divisional Officer</option>
                    <option value="normal_user">Nodal Officer</option>
                  </select>
                  <input id="ajax_url" type="hidden" value="{{route('user_jurisdiction')}}" >
                </div>
                <div class="input-group mb-3">
                  <select class="custom-select form-control-border" name="user_jurisdiction" id="user_jurisdiction" required>
                    <option value="" selected>--Please Select Jurisdiction--</option>
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
@section('custom_script')
<script>
  $('#user_role').on('change',function(e){
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    var user_role=$(this).val();
    var ajax_url=$('#ajax_url').val();
    var selectOption='<option value="" selected>--Please Select Jurisdiction--</option>';
    $.ajax({
      type:"POST",
      url:ajax_url,
      data:{'user_role':user_role},
      dataType:'json',
      success:function(data){
        $.each(JSON.parse(data),function(index,value){
          if(user_role=='moderate_user'){
            selectOption+='<option value="'+value.id+'">'+value.sub_division_name.charAt(0).toUpperCase() + value.sub_division_name.slice(1)+'</option>';
          }else{
            selectOption+='<option value="'+value.id+'">'+value.relief_camp_name.charAt(0).toUpperCase() + value.relief_camp_name.slice(1)+'</option>';
          }
          $('#user_jurisdiction').html(selectOption);
        });
      },
      error:function(data){
        console.log(data);
      }
    });
  });
</script>
@endsection