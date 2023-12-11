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
    <div class="col-8">
      <div class="card">
        <div class="card-body">
              <form action="" method="post">
                @csrf
                <div class="row mb-3">
                  <div class="col-6 form-group">
                    <label for="person_name">Person Name</label>
                    <input type="text" class="form-control" value="{{$inmate->person_name}}" id="person_name" name="person_name" required>
                  </div>
                  <div class="col-6 form-group">
                    <label for="family_head">Family Head Name</label>
                    @if($inmate->familyHead)
                      <input type="text" class="form-control" value="{{ $inmate->familyHead->family_head_name }}" id="family_head_name" name="family_head_name">
                    @else
                      <input type="text" class="form-control" placeholder="Family Head Name" id="family_head_name" name="family_head_name">
                    @endif                  
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-6 form-group">
                    <label for="family_head_relation">Relation with family head</label>
                    @if ($inmate->familyHeadRelation)
                      <input type="text" class="form-control" value="{{ $inmate->familyHeadRelation->family_head_relation }}" id="family_head_relation" name="family_head_relation" required>                            
                    @else
                      <input type="text" class="form-control" placeholder="Family Head Relation" id="family_head_realtion" name="family_head_relation" required>
                    @endif                  
                  </div>
                  <div class="col-6 form-group">
                    <label for="gender">Select Gender</label>
                      <select id="gender" class="form-control">
                        @if ($inmate->gender=='male')
                          <option selected value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="third_gender">Third Gender</option>
                        @elseif($inmate->gender=='female')
                          <option selected value="female">Female</option>
                          <option value="male">Male</option>
                          <option value="third_gender">Third Gender</option>
                        @else
                          <option selected value="third_gender">Third Gender</option>
                          <option value="female">Female</option>
                          <option value="male">Male</option>                    
                        @endif
                      </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-6 form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" placeholder="Age" id="age" name="age" required>
                  </div>
                  <div class="col-6 form-group">
                      <label for="contact_number">Contact Number</label>
                      <input type="text" class="form-control" value="{{ $inmate->contact_number}}" id="contact_number" name="contact_number">                    
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-6">
                      <span>Physically Disabled Person</span>
                      <div class="form-group">
                          <div class="form-check">
                              <input class="form-check-input"  id="dis_yes" type="radio" name="physically_disabled" value="true">
                              <label class="form-check-label" for="dis_yes">Yes</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" id="dis_no" type="radio" name="physically_disabled" value="false" checked>
                              <label class="form-check-label" for="dis_no">No</label>
                          </div>
                      </div>
                  </div>
                  <div class="col-6">
                      <span>Orphan</span>
                      <div class="form-group">
                          <div class="form-check">
                              <input class="form-check-input"  id="orph_yes" type="radio" name="orphan" value="true">
                              <label class="form-check-label" for="orph_yes">Yes</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" id="orph_no" type="radio" name="orphan" value="false" checked>
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
                              <input class="form-check-input"  id="lact_yes" type="radio" name="lactating" value="true">
                              <label class="form-check-label" for="lact_yes">Yes</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" id="lact_no" type="radio" name="lactating" value="false" checked>
                              <label class="form-check-label" for="lact_no">No</label>
                          </div>
                      </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="relief_camp">Select Relief Camp</label>
                    <select class="form-control select2" id="relief_camp" name="relief_camp_id">
                      {{-- @foreach ($relief_camps as $relief_camp)
                          <option value="{{$relief_camp->id}}">{{$relief_camp->camp_code}}--{{$relief_camp->relief_camp_name}}</option>
                      @endforeach --}}
                    </select>
                    </div>
                    </div> 
                </div>
                <div class="row mb-3">
                  <div class="col-6 form-group">
                    <label for="profession">Profession</label>
                      <input type="text" class="form-control" value="{{$inmate->profession}}" id="profession" name="profession">
                    </div>
                  <div class="col-6 form-group">
                    <span>Willing to Go Back your Village</span>
                      <div class="form-group">
                          <div class="form-check">
                              <input class="form-check-input"  id="willing_yes" type="radio" name="willing_to_goback" value="true" {{$inmate->willing_to_goback?'checked':''}}>
                              <label class="form-check-label" for="willing_yes">Yes</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" id="willing_no" type="radio" name="willing_to_goback" value="false" {{$inmate->willing_to_goback?'':'checked'}}>
                              <label class="form-check-label" for="willing_no">No</label>
                          </div>
                      </div>
                  </div>
                </div>               
                <div class="row">
                  <div class="col-8">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
                <input type="hidden" value="" name="relief_camp_id">
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