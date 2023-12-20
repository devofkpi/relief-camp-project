@extends('layouts.main_layout')
@section('title')
Create Relief Camp
@endsection

@section('page_related_css')
 <!-- Select2 -->
 <link rel="stylesheet" href='{{ asset("/plugins/select2/css/select2.min.css")}}'>
 <link rel="stylesheet" href='{{ asset("/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}'>

@endsection

@section('content1')
<div class="row justify-content-center">
    <div class="col-8">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">By Submiting Form</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">By Uploading Excel File</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <form action="{{route('create_relief_camp.post')}}" method="post">
                @csrf
                <div class="row justify-content-center">
                  <div class="col-8">
                    <div class="input-group mb-3">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-home"></span>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Name of Camp" name="relief_camp_name" required>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                    <div class="input-group mb-3">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-address-card"></span>
                        </div>
                      </div>
                      <input type="text" class="form-control"  placeholder="Location" name="location" required>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                    <div class="form-group mb-3">
                      <label for="sub_division">Select Subdivision</label>
                      <select  class="form-control" name="sub_division_code" id="sub_division">
                        @foreach ($sub_divisions as $sub_division)
                        <option value="{{$sub_division->sub_division_code}}">{{$sub_division->sub_division_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                      <div class="input-group mb-3">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span id="camp_code_slug"></span>
                          </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Camp Code" name="camp_code" required>
                      </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                        <div class="form-group mb-3">
                          <label for="nodal_officer">Select Nodal Officer</label>
                          <select  class="form-control" name="nodal_officer_id" id="nodal_officer">
                            @foreach ($nodal_officers as $nodal_officer)
                            <option value="{{$nodal_officer->id}}">{{$nodal_officer->officer_name}}</option>
                            @endforeach
                          </select>
                        </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              <form action="{{route('upload_relief_camp.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-8">
                      <h5 class="text-danger">Please upload the data in the format given here, also sanitize the data before uploading it.</h5>
                      <h6 class="text-info"><a href="{{ route('download_excel_sample','Relief Camp Sample.xlsx')}}" target="_blank">( Click here )</a> to Download the format.</h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-8">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="reliefCampImportFile" name="relief_camp_excel" required>
                            <label class="custom-file-label" for="reliefCampImportFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-info btn-flat">Upload</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              @if(session()->has('success'))
                <p style="display: none" id="edit_msg">{{session()->get('success')}}</p>
              @endif
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection
@section('custom_script')
<!-- Select2 -->
<script src="{{ asset("/plugins/select2/js/select2.full.min.js")}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })


    bsCustomFileInput.init();
    
  })
</script>
<script>
  $(window).on('load',function(e) {
        var toastr_msg=$('#edit_msg').text();
        if(toastr_msg){
          toastr.success(toastr_msg);
        }
  });
  </script>
  <script>
    $('#sub_division').on('change',function(e){
    console.log($(this).val());
    $('#camp_code_slug').text($(this).val()+'-');
  });
  </script>
@endsection