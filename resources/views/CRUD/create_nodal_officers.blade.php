@extends('layouts.main_layout')

@section('title')
Create Nodal Officer
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
              <form action="{{route('create_nodal_officer.post')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-8">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Officer Name" name="officer_name">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-8">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Officer Designation" name="officer_designation">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-8">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text" placeholder="(___) ___-____" name="officer_contact">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-8">
                      <select multiple class="custom-select form-control-border mt-4" name="nodal_officer_id" id="nodal_officer">
                        <option selected>--Please select Relief Camp--</option>
                        @foreach ($relief_camps as $relief_camp)
                          <option value="{{$relief_camp->id}}">{{$relief_camp->relief_camp_name}}</option>                            
                        @endforeach
                      </select>
                    </div>
                  </div>  
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                    <button type="submit" class="btn btn-primary" name="create_user">Create</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              <form action="{{route('upload_nodal_officer.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-8">
                      <h5 class="text-danger">Please upload the data in the format given here, also sanitize the data before uploading it.</h5>
                      <h6 class="text-info"><a href="{{ route('download_excel_sample','Nodal Officer Sample.xlsx')}}">( Click here )</a> to Download the format.</h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-8">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="nodalOfficerImportFile" name="nodal_officer_excel">
                            <label class="custom-file-label" for="nodalOfficerImportFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-info btn-flat" name="create_user">Upload</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection
