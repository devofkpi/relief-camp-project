@extends('layouts.main_layout')
@section('title')
Upload Inmates Data
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
                <div class="card-body">
                  <form action="{{route('create_inmate.post')}}" method="post">
                    @csrf
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Person Name" name="person_name" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Family Head Name" name="family_head_name" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Family Head Relation" name="relation" required>
                    </div>
                    <div class="col-6">
                        <select class="form-control" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="third_gender">Third Gender</option>
                        </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Age" name="age" required>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text" placeholder="(___) ___-____ Contact Number" name="contact_number">                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                        <span>Physically Disabled Person</span>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input"  id="dis_yes" type="radio" name="physically_disabled" value="1">
                                <label class="form-check-label" for="dis_yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="dis_no" type="radio" name="physically_disabled" value="0" checked>
                                <label class="form-check-label" for="dis_no">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <span>Orphan</span>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input"  id="orph_yes" type="radio" name="orphan" value="1">
                                <label class="form-check-label" for="orph_yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="orph_no" type="radio" name="orphan" value="0" checked>
                                <label class="form-check-label" for="orph_no">No</label>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                        <span>Lactating</span>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input"  id="lact_yes" type="radio" name="lactating" value="1">
                                <label class="form-check-label" for="lact_yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="lact_no" type="radio" name="lactating" value="0" checked>
                                <label class="form-check-label" for="lact_no">No</label>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Profession" name="profession" required>
                      </div>
                      <div class="col-6 form-group">
                        <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-6 form-group">
                        <input type="text"  class="form-control" id="any_special_condition" placeholder="Any Special Condition" name="any_special_condition">
                      </div>
                      <div class="col-6 form-group">
                        <span>Willing to Go Back your Village</span>
                          <div class="form-group">
                              <div class="form-check">
                                  <input class="form-check-input"  id="willing_yes" type="radio" name="willing_to_goback" value="1">
                                  <label class="form-check-label" for="willing_yes">Yes</label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" id="willing_no" type="radio" name="willing_to_goback" value="0" checked>
                                  <label class="form-check-label" for="willing_no">No</label>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row m1">
                    <div class="col-6">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              <form action="{{route('upload_inmates.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-8">
                      <h5 class="text-danger">Please upload the data in the format given here, also sanitize the data before uploading it.</h5>
                      <h6 class="text-info"><a href="#">( Click here )</a> to Download the format.</h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-8">
                      <div class="form-group">
                        <label for="relief_camp_id">Select Relief Camp</label>
                        <div class="input-group">
                          <select  class="form-control" name="relief_camp_id" id="relief_camp_id">
                            @foreach ($relief_camps as $relief_camp)
                            <option value="{{$relief_camp->id}}">{{$relief_camp->relief_camp_name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <label for="inmatesImportFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inmatesImportFile" name="inmates_excel" required>
                            <label class="custom-file-label" for="inmatesImportFile">Choose file</label>
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