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
    <div class="col-12">
      <div class="card">
        <div class="card-body">
              <form action="{{route('update_relief_camp.post')}}" method="post">
                @csrf
                <div class="row justify-content-center">
                  <div class="col-8">
                    <div class="form-group mb-3">
                      <label for="relief_camp_name">Relief Camp Name</label>
                      <input type="text" class="form-control" value="{{ $relief_camp->relief_camp_name }}" id="relief_camp_name" name="relief_camp_name" required>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                      <div class="form-group mb-3">
                        <label for="camp_code">Camp Code</label>
                        <input type="text" class="form-control" value="{{ $relief_camp->camp_code }}" id="camp_code" name="camp_code" required>
                      </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                      <div class="form-group mb-3">
                        <label for="camp_address">Relief Camp Address</label>
                        <input type="text" class="form-control"  value="{{ $relief_camp->address->address }}" id="camp_address" name="location" required>
                      </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                    <div class="form-group mb-3">
                      <label for="sub_division">Select Subdivision</label>
                      <select  class="custom-select form-control-border mt-4" name="sub_division_id" id="sub_division">
                        <option  selected value="{{ $relief_camp->subDivision->id}}">{{ $relief_camp->subDivision->sub_division_name }}</option>
                        @foreach ($sub_divisions as $sub_division)
                          @if ($sub_division->sub_division_name!=$relief_camp->subDivision->sub_division_name )
                            <option value="{{$sub_division->id}}">{{$sub_division->sub_division_name}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                    <div class="form-group mb-3">
                      <label for="nodal_officer">Select Nodal Officer</Select></label>
                      <select  class="custom-select form-control-border mt-4" name="nodal_officer_id" id="nodal_officer">
                        <option selected value="{{ $relief_camp->nodalOfficer->id }}">{{ $relief_camp->nodalOfficer->officer_name }}</option>
                        @foreach ($nodal_officers as $nodal_officer)
                          @if ($nodal_officer->officer_name!=$relief_camp->nodalOfficer->officer_name)
                          <option value="{{$nodal_officer->id}}">{{$nodal_officer->officer_name}}</option>                            
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
                <input type="hidden" value="{{ $relief_camp->id}}" name="relief_camp_id">
              </form>
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