@extends('layouts.main_layout')
@section('title')
Create Relief Camp
@endsection

@section('content1')
<div class="row justify-content-center">
    <div class="col-12 col-sm-6">
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
                <div class="card-body">
                  <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Name of Camp" name="relief_camp_name">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-home"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Camp Code" name="camp_code">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control"  placeholder="Location" name="location">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-address"></span>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              <form action="{{route('upload_relief_camp.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Select Subdivision</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder">
                    @foreach ($sub_divisions_data as $sub_divisions )
                      <option>{{$sub_divisions->sub_division_name}}</option>
                     @endforeach
                  </select>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="reliefCampImportFile" name="relief_camp_excel">
                        <label class="custom-file-label" for="reliefCampImportFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-info btn-flat">Upload</button>
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