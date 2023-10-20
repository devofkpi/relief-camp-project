@extends('layouts.main_layout')
@section('title')
Upload Facilities Data
@endsection

@section('page_related_css')
 <!-- Select2 -->
 <link rel="stylesheet" href='{{ asset("/plugins/select2/css/select2.min.css")}}'>
 <link rel="stylesheet" href='{{ asset("/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}'>

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
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Building Type" name="building_type" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Persons" name="number_of_persons" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Rooms" name="number_of_rooms" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Toilets" name="number_of_toilets" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Halls" name="number_of_halls" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Persons Utilising Toilets" name="number_of_persons_utilising_toilets" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Persons Staying at Night" name="number_of_persons_staying_at_night" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Mattresses" name="number_of_mattresses" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Badsheets" name="number_of_badsheets" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Blankets" name="number_of_blankets" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Mosquito" name="number_of_mosquito" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Fans" name="number_of_fans" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Availability of Food Grains in Days" name="availability_of_food_grains_in_days" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Availability of Veg in Days" name="availability_of_veg_in_days" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="relief_camp">Select Relief Camp</label>
                    <select class="form-control select2" id="relief_camp" name="relief_camp_id">
                      @foreach ($relief_camps as $relief_camp)
                          <option value="{{$relief_camp->id}}">{{$relief_camp->camp_code}}--{{$relief_camp->relief_camp_name}}</option>
                      @endforeach
                    </select>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6 form-group">
                      <input type="checkbox" class="form-check-input" valu="yes" name="safe_drinking_water" checked>
                      <label class="form-check-label">Safe Drinking Water Available</label>
                    </div>
                    <div class="col-6 form-group">
                      <input type="checkbox" class="form-check-input" value="yes" name="provisioning_of_supplement" checked>
                      <label class="form-check-label">Provisioning of Supplement Available</label>
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <div class="col-6">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </div>
              </form>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              <form action="{{route('upload_relief_camp.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="relief_camp_id">Select Relief Camp</label>
                    <div class="input-group">
                      <select  class="form-control" name="relief_camp_id" id="relief_camp_id">
                        @foreach ($relief_camps as $relief_camp)
                        <option value="{{$relief_camp->id}}">{{ $relief_camp->camp_code}}--{{$relief_camp->relief_camp_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <label for="reliefCampImportFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="reliefCampImportFile" name="relief_camp_facilities_excel" required>
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
@section('custom_script')
<!-- Select2 -->
<script src="{{ asset("/plugins/select2/js/select2.full.min.js")}}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
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
@endsection