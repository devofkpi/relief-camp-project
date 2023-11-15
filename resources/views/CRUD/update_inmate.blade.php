@extends('layouts.main_layout')
@section('title')
Update Inmate Details
@endsection

@section('page_related_css')
 <!-- Select2 -->
 <link rel="stylesheet" href='{{ asset("/plugins/select2/css/select2.min.css")}}'>
 <link rel="stylesheet" href='{{ asset("/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}'>

@endsection

@section('content1')
<div class="row justify-content-center">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <form action="" method="post">
                @csrf
                <div class="row justify-content-center">
                  <div class="col-8">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" value="{{ $inmate->person_name }}" name="relief_camp_name" required>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-8">
                      <div class="input-group mb-3">
                        @if($inmate->familyHead)
                            <input type="text" class="form-control" value="{{ $inmate->familyHead->family_head_name }}" name="relief_camp_name" required>
                        @else
                        <input type="text" class="form-control" placeholder="Family Head Name" name="relief_camp_name" required>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-8">
                      <div class="input-group mb-3">
                        @if ($inmate->familyHeadRelation)
                            <input type="text" class="form-control" value="{{ $inmate->familyHeadRelation->family_head_relation }}" name="relief_camp_name" required>                            
                        @else
                            <input type="text" class="form-control" placeholder="Family Head Relation" name="relief_camp_name" required>
                        @endif
                      </div>
                    </div>
                </div>                
                <div class="row justify-content-center">
                  <div class="col-8">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
                <input type="hidden" value="" name="relief_camp_id">
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