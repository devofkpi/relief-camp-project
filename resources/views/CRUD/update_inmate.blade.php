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
              <form action="{{ route('update_inmate.post')}}" method="post">
                @csrf
                <div class="row mb-3">
                  <div class="col-6 form-group">
                    <label for="person_name">Person Name</label>
                    <input type="text" class="form-control" value="{{$inmate->person_name}}" id="input_text_person_name" name="person_name" required>
                    <span class="text-danger" id="input_text_error_person_name"></span>
                  </div>
                  <div class="col-6 form-group">
                    <label for="family_head">Family Head Name</label>
                    @if($inmate->familyHead)
                      <input type="text" class="form-control" value="{{ $inmate->familyHead->family_head_name }}" id="input_text_family_head_name" name="family_head_name">
                      <span class="text-danger" id="input_text_error_family_head"></span>
                      @else
                      <input type="text" class="form-control" placeholder="Family Head Name" id="input_text_family_head_name" name="family_head_name">
                      <span class="text-danger" id="input_text_error_family_head"></span>
                      @endif                  
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-6 form-group">
                    <label for="family_head_relation">Relation with family head</label>
                    @if ($inmate->familyHeadRelation)
                      <input type="text" class="form-control" value="{{ $inmate->familyHeadRelation->family_head_relation }}" id="input_text_relation" name="relation" required>                            
                    @else
                      <input type="text" class="form-control" placeholder="Family Head Relation" id="input_text_relation" name="relation" required>
                    @endif                  
                  </div>
                  <div class="col-6 form-group">
                    <label for="gender">Select Gender</label>
                      <select id="gender" class="form-control" name="gender">
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
                    <input type="text" class="form-control" value="{{ $inmate->age}}" id="input_number_age" name="age" required>
                    <span class="text-danger" id="input_number_error_age"></span>
                  </div>
                  <div class="col-6 form-group">
                      <label for="contact_number">Contact Number</label>
                      <input type="text" class="form-control" value="{{ $inmate->contact_number}}" id="input_number_contact_number" name="contact_number">                    
                      <span class="text-danger" id="input_number_error_contact"></span>
                    </div>
                </div>
                <div class="row mb-3">
                  <div class="col-6">
                      <span>Physically Disabled Person</span>
                      <div class="form-group">
                          <div class="form-check">
                              <input class="form-check-input"  id="dis_yes" type="radio" name="physically_disabled" value="1" {{$inmate->physically_disabled ?'checked':''}}>
                              <label class="form-check-label" for="dis_yes">Yes</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" id="dis_no" type="radio" name="physically_disabled" value="0" {{$inmate->physically_disabled ?'':'checked'}}>
                              <label class="form-check-label" for="dis_no">No</label>
                          </div>
                      </div>
                  </div>
                  <div class="col-6">
                      <span>Orphan</span>
                      <div class="form-group">
                          <div class="form-check">
                              <input class="form-check-input"  id="orph_yes" type="radio" name="orphan" value="1" {{$inmate->orphan?'checked':''}} >
                              <label class="form-check-label" for="orph_yes">Yes</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" id="orph_no" type="radio" name="orphan" value="0" {{$inmate->orphan?'':'checked'}}>
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
                              <input class="form-check-input"  id="lact_yes" type="radio" name="lactating" value="1" {{$inmate->lactating?'checked':''}}>
                              <label class="form-check-label" for="lact_yes">Yes</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" id="lact_no" type="radio" name="lactating" value="0" {{$inmate->lactating?'':'checked'}}>
                              <label class="form-check-label" for="lact_no">No</label>
                          </div>
                      </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="relief_camp">Select Relief Camp</label>
                    <select class="form-control select2" id="relief_camp" name="relief_camp_id">
                      <option value="{{ $inmate->relief_camp_id}}" selected>{{$inmate->reliefCamp->camp_code}}--{{$inmate->reliefCamp->relief_camp_name}}</option>
                      @foreach ($relief_camps as $relief_camp)
                        @if($inmate->relief_camp_id!=$relief_camp->id)
                          <option value="{{$relief_camp->id}}">{{$relief_camp->camp_code}}--{{$relief_camp->relief_camp_name}}</option>
                        @endif
                      @endforeach
                    </select>
                    </div>
                    </div> 
                </div>
                <div class="row mb-3">
                  <div class="col-6 form-group">
                    <label for="profession">Profession</label>
                      <input type="text" class="form-control" value="{{$inmate->profession}}" id="input_text_profession" name="profession">
                      <span class="text-danger" id="input_text_error_profession"></span>
                    </div>
                  <div class="col-6 form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" value="{{ $inmate->address->address}}" id="input_aphanum_address" name="address">
                    <span class="text-danger" id="input_aphanum_error_address"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-6 form-group">
                    <label for="any_special_condition">Any Special Condition</label>
                    <input type="text" value="{{$inmate->any_special_condition}}" class="form-control" id="input_text_any_special_condition" name="any_special_condition">
                  </div>
                  <div class="col-6 form-group">
                    <span>Willing to Go Back your Village</span>
                      <div class="form-group">
                          <div class="form-check">
                              <input class="form-check-input"  id="willing_yes" type="radio" name="willing_to_goback" value="1" {{$inmate->willing_to_goback?'checked':''}}>
                              <label class="form-check-label" for="willing_yes">Yes</label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" id="willing_no" type="radio" name="willing_to_goback" value="0" {{$inmate->willing_to_goback?'':'checked'}}>
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
                <input type="hidden" value="{{ $inmate->id }}" name="inmate_id">
              </form>
              @if(session()->has('success'))
                <p style="display: none" id="edit_msg">{{session()->get('success')}}</p>
              @elseif(session()->has('error'))
                <p style="display: none" id="edit_msg1">{{session()->get('error')}}</p>
              @endif
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection
