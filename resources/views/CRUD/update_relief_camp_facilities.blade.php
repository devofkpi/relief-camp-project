@extends('layouts.main_layout')
@section('title')
Update Camp Facilities
@endsection
@section('content1')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card card-primary">
            <div class="card-body">
              <form action="{{route('update_facilities.post')}}" method="post">
                @csrf
            <div class="row mb-3">
              <div class="col-3 form-group">
                <label for="">Building Type</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->building_type }}" id="input_text_build_type" name="building_type" required>
                <span class="text-danger" id="input_text_error_build_type"></span>
              </div>
              <div class="col-3 form-group">
                <label for="">Number of Persons</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_persons }}" id="input_number_persons" name="number_of_persons" required>
                <span class="text-danger" id="input_number_error_persons"></span>
              </div>
              <div class="col-3 form-group">
                <label for="">Number of Rooms</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_rooms }}" id="input_number_rooms"  name="number_of_rooms" required>
                <span class="text-danger" id="input_number_error_rooms"></span>
              </div>
              <div class="col-3 form-group">
                <label for="">Number of Halls</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_halls }}" id="input_number_halls" name="number_of_halls" required>
                <span class="text-danger" id="input_number_error_halls"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-4 form-group pl-4">
                <input type="checkbox" class="form-check-input" value="1" name="separate_kitchen" id="separate_kitchen" {{ $relief_camp_facilities->separate_kitchen?'checked':'' }}>
                <label class="form-check-label" for="separate_kitchen">Separate Kitchen Available</label>
              </div>
              <div class="col-4 form-group pl-4">
                <input type="checkbox" class="form-check-input" value="1" name="open_space" id="open_space" checked>
                <label class="form-check-label" for="open_space">Open Space Available</label>
              </div>
              <div class="col-4 form-group pl-4">
                <input type="checkbox" class="form-check-input" value="1" name="sufficient_cooking_utensils" id="sufficient_cooking_utensils" {{ $relief_camp_facilities->sufficient_cooking_utensils?'checked':'' }}>
                <label class="form-check-label" for="sufficient_cooking_utensils">Sufficient Cooking Utensils Available</label>
              </div>
            </div>
            <div class="row mb-3 form-group">
              <div class="col-4 form-group">
                <label for="">Water tank capacity</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->water_tanks_capacity }}" id="input_number_water_cpcty" name="water_tanks_capacity" required>
                <span class="text-danger" id="input_number_error_water_cpcity"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Water availability ratio</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->water_avail_ratio,2) }}" id="input_number_water_avail_ratio" name="water_availability_ratio" required>
                <span class="text-danger" id="input_number_error_avl_water"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of Toilets</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_toilets }}" id="input_number_toilets" name="number_of_toilets" required>
                <span class="text-danger" id="input_number_error_tlts"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-4 form-group">
                <label for="">Toilet ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->toilet_ratio_per_person,2) }}" id="input_number_toilet_ratio" name="toilet_ratio_per_person" required>
                <span class="text-danger" id="input_number_error_ratio_tlts"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of Buckets</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_buckets }}" id="input_number_buckets" name="number_of_buckets" required>
                <span class="text-danger" id="input_number_error_buckets"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Bucket ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->bucket_ratio_per_person,2) }}" id="input_number_buckets_ratio" name="bucket_ratio_per_person" required>
                <span class="text-danger" id="input_number_error_ratio_buckets"></span>
              </div>
            </div>
  
            <div class="row mb-3">
              <div class="col-4 form-group">
                <label for="">Number of Mugs</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_mugs }}" id="input_number_mugs" name="number_of_mugs" required>
                <span class="text-danger" id="input_number_error_mugs"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Mug ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->mug_ratio_per_person,2) }}" id="input_number_mugs_ratio" name="mug_ratio_per_person" required>
                <span class="text-danger" id="input_number_error_ratio_mugs"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of mattresses</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_mattresses }}" id="input_number_matteress" name="number_of_mattresses" required>
                <span class="text-danger" id="input_number_error_matres"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-4 form-group">
                <label for="">Mattress ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->mattress_ratio_per_person,2) }}" id="input_number_matteress_ratio" name="mattress_ratio_per_person" required>
                <span class="text-danger" id="input_number_error_ratio_matres"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of bedsheets</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_bedsheets }}" id="input_number_bedsheet" name="number_of_bedsheets" required>
                <span class="text-danger" id="input_number_error_bedsheet"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Bedsheet ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->bedsheet_ratio_per_person,2) }}" id="input_number_badsheet_ratio" name="bedsheet_ratio_per_person" required>
                <span class="text-danger" id="input_number_error_ratio_bedsheet"></span>
              </div>
            </div>
            <div class="row mb-3">
              
              <div class="col-4 form-group">
                <label for="">Number of pillows</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_pillows }}" id="input_number_pillows" name="number_of_pillows" required>
                <span class="text-danger" id="input_number_error_pillows"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Pillow ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->pillow_ratio_per_person,2) }}" id="input_number_pillows_ratio" name="pillow_ratio_per_person" required>
                <span class="text-danger" id="input_number_error_ratio_pillow"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of blankets</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_blankets }}" id="input_number_blankets" name="number_of_blankets" required>
                <span class="text-danger" id="input_number_error_blankets"></span>
              </div>
            </div>
            <div class="row mb-3">
              
              <div class="col-4 form-group">
                <label for="">Blanket ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->blanket_ratio_per_person,2) }}" id="input_number_blankets_ratio" name="blanket_ratio_per_person" required>
                <span class="text-danger" id="input_number_error_ratio_blanket"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of mosquito nets</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_mosquitos }}" id="input_number_mosquito" name="number_of_mosquito_nets" required>
                <span class="text-danger" id="input_number_error_mosqito_net"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Mosquito net ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->mosquito_ratio_per_person,2) }}" id="input_number_mosquito_ratio" name="mosquito_net_ratio" required>
                <span class="text-danger" id="input_number_error_ratio_mosqito_net"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-4 form-group">
                <label for="">Number of fans</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_fans }}" id="input_number_fans" name="number_of_fans" required>
                <span class="text-danger" id="input_number_error_fans"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Fan ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->fans_ratio_per_person,2) }}" id="input_number_fans_ratio" name="fan_ratio_per_person" required>
                <span class="text-danger" id="input_number_error_ratio_fans"></span>
              </div>
            </div>
            <div class="row mb-3">
              
              <div class="col-4 form-group pl-4">
                <input type="checkbox" class="form-check-input" value="1" name="sufficient_plates_glasses" id="sufficient_plates_glasses" {{ $relief_camp_facilities->sufficient_plates_glasses?'checked':'' }}>
                <label class="form-check-label" for="sufficient_plates_glasses">Sufficient Plates and Glasses Available</label>
              </div>
              <div class="col-4 pl-4">
                <input type="checkbox" class="form-check-input" value="1" name="sufficient_lighting_facility" id="sufficient_lighting_facility" {{ $relief_camp_facilities->sufficient_lighting_facility?'checked':'' }}>
                <label class="form-check-label" for="sufficient_lighting_facility">Sufficient Lighting Facility</label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-4 form-group">
                <label for="">Fuel sources</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->fuel_sources }}" id="input_text_fuel_source" name="fuel_source" required>
                <span class="text-danger" id="input_text_error_fuel"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Availability of fuel in days</label>" name="water_availability_ratio" required>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->availability_of_fuel_in_days }}" id="input_number_avail_fuel" name="avl_of_fuel_in_days" required>
                <span class="text-danger" id="input_number_error_avl_fuel"></span>
              </div>
              <div class="col-4 form-group">
                <label for="">Availability of rice in days</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->availability_of_rice_in_days }}" id="input_number_avail_rice" name="avl_of_rice_in_days" required>
                <span class="text-danger" id="input_number_error_avl_rice"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Availability of dal in days</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->availability_of_dal_in_days }}" id="input_number_avail_dal" name="avl_of_dal_in_days" required>
                <span class="text-danger" id="input_number_error_avl_daal"></span>
              </div>
              <div class="col-6 form-group">
                <label for="">Availability of veg in days</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->availability_of_veg_in_days }}" id="input_number_avail_veg" name="avl_of_veg_in_days" required>
                <span class="text-danger" id="input_number_error_avl_veg"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-4 form-group pl-4">
                <input type="checkbox" class="form-check-input" value="1" name="safe_drinking_water" id="safe_drinking_water" {{ $relief_camp_facilities->safe_drinking_water?'checked':'' }}>
                <label class="form-check-label" for="safe_drinking_water">Safe Drinking Water Available</label>
              </div>
              <div class="col-4 form-group">
                <input type="checkbox" class="form-check-input" value="1" name="provisioning_of_suppl" id="provisioning_of_suppl" {{ $relief_camp_facilities->provisioning_of_supplement?'checked':'' }}>
                <label class="form-check-label" for="provisioning_of_suppl">Provisioning of Supplement Available</label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Availability Soap and other cosumable items in days</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->availability_of_soap_consumable_in_days }}" id="input_number_soap_and_other_consumable" name="soap_and_other_consumable" required>
                <span class="text-danger" id="input_number_error_soap"></span>
              </div>
              <div class="col-6 form-group">
                <label for="">Number of school going students</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_school_going_students }}" id="input_number_school_going_student" name="number_of_school_going_student_identified" required>
                <span class="text-danger" id="input_number_error_school_stdnts"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Number of students linked to school</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_students_linked_to_school }}" id="input_number_school_going_student_linked" name="number_of_student_linked_to_school" required>
                <span class="text-danger" id="input_number_error_school_stdnts_lnkd"></span>
              </div>
              <div class="col-6 form-group">
                <label for="">Percantage of students linked to school</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->per_of_students_linked_to_school,2) }}" id="input_number_student_linked_per" name="per_of_student_linked_to_school" required>
                <span class="text-danger" id="input_number_error_school_stdnts_lnkd_per"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Number of children identified for anganwadi</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_child_identified_anganwadi }}" id="input_number_children_for_anganwadi" name="number_of_children_for_anganwadi" required>
                <span class="text-danger" id="input_number_error_children_angwadi"></span>
              </div>
              <div class="col-6 form-group">
                <label for="">Number of children linked to anaganwadi</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_child_linked_anganwadi }}" id="input_number_children_for_anganwadi_linked" name="number_of_children_linked_to_anganwadi" required>
                <span class="text-danger" id="input_number_error_children_angwadi_lnkd"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Percantage of children linked to anganwadi</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->per_child_linked_anganwadi,2) }}" id="input_number_children_for_anganwadi_per" name="per_of_children_linked_to_anganwadi" required>
                <span class="text-danger" id="input_number_error_children_angwadi_per"></span>
              </div>
              <div class="col-6 form-group">
                <label for="">Number of pregnant women</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_pregnant_women }}" id="input_number_of_pregnant_women" name="number_of_pregnant_women" required>
                <span class="text-danger" id="input_number_error_prgnt_women"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Number of pregnant women linked to health facility</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_pregnant_women_linked_health }}" id="input_number_of_pregnant_women_linked" name="number_of_pregnant_women_linked_to_health" required>
                <span class="text-danger" id="input_number_error_prgnt_women_lnkd"></span>
              </div>
              <div class="col-6 form-group">
                <label for="">Percantage of pregnant women linked to health facility</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->per_of_pregnant_women_linked_health,2) }}" id="input_number_of_pregnant_women_linked_per" name="per_of_pregnant_women_linked_to_health" required>
                <span class="text-danger" id="input_number_error_prgnt_women_lnkd_per"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Number of specially abled person</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_disabled_person }}" id="input_number_disabled" name="number_of_disabled" required>
                <span class="text-danger" id="input_number_error_pwd"></span>
              </div>
              <div class="col-6 form-group">
                <label for="">Number of specially abled person linked to some facility</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_disabled_person_linked_facility }}" id="input_number_disabled_linked" name="number_of_disabled_linked_to_facility" required>
                <span class="text-danger" id="input_number_error_pwd_lnkd"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Percantage of specially abled person linked to some facility</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->per_of_disabled_person_linked_facility,2) }}" id="input_number_disabled_linked_per" name="per_of_disabled_linked_to_facility" required>
                <span class="text-danger" id="input_number_error_pwd_lnkd_per"></span>
              </div>
              <div class="col-6 form-group">
                <label for="">Number of children separated from parents</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_child_separated_parents }}" id="input_number_child_sep" name="number_of_child_sep_from_perants" required>
                <span class="text-danger" id="input_number_error_child_prnts"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Number of children separated from parents linked to social welfare</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_child_separated_parents_linked_sw }}" id="input_number_child_sep_linked" name="number_of_child_sep_from_perants_linked_to_facility" required>
                <span class="text-danger" id="input_number_error_child_prnts_lnkd"></span>
              </div>
              <div class="col-6 form-group">
                <label for="">Percantage of children separated from parents linked to social welfare</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->per_of_child_separated_parents_linked_sw,2) }}" id="input_number_child_sep_linked_per" name="per_of_child_sep_from_perants_linked_to_facility" required>
                <span class="text-danger" id="input_number_error_child_prnts_lnkd_per"></span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="date_of_visit_of_health">Date of Visit of Health</label>
                <input type="date" class="form-control" value="{{ date('Y-m-d',strtotime($relief_camp_facilities->date_visit_of_health)) }}" name="date_of_visit_of_health" id="date_of_visit_of_health" required>
              </div>
              <div class="col-6 form-group">
                <label for="date_of_visit_of_phed">Date of Visit of PHED</label>
                <input type="date" class="form-control" value="{{ date('Y-m-d',strtotime($relief_camp_facilities->date_visit_of_phed)) }}" name="date_of_visit_of_phed" id="date_of_visit_of_phed" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="date_of_visit_of_sw">Date of Visit of Social Welfare</label>
                <input type="date" class="form-control" value="{{ date('Y-m-d',strtotime($relief_camp_facilities->date_visit_of_social_welfare)) }}" name="date_of_visit_of_sw" id="date_of_visit_of_sw" required>
              </div>
              <div class="col-6 form-group">
                <label for="date_of_visit_of_cafpd">Date of Visit of CAF and PD</label>
                <input type="date" class="form-control" value="{{ date('Y-m-d',strtotime($relief_camp_facilities->date_visit_of_cafpd)) }}" name="date_of_visit_of_cafpd" id="date_of_visit_of_cafpd" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="date_of_visit_of_edu">Date of Visit of Education</label>
                <input type="date" class="form-control" value="{{date('Y-m-d', strtotime($relief_camp_facilities->date_visit_of_edu ))}}" name="date_of_visit_of_edu" id="date_of_visit_of_edu" required>
              </div>
              <div class="col-6 form-group">
                <label for="date_of_visit_of_power">Date of Visit of Power</label>
                <input type="date" class="form-control" value="{{date('Y-m-d', strtotime($relief_camp_facilities->date_visit_of_pow)) }}" name="date_of_visit_of_power" id="date_of_visit_of_power" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="date_of_visit_of_mahud_ceo_adc">Date of Visit of MAHUD or CEO ADC</label>
                <input type="date" class="form-control" value="{{ date('Y-m-d',strtotime($relief_camp_facilities->date_visit_of_mahud_ceo_adc)) }}" name="date_of_visit_of_mahud_ceo_adc" id="date_of_visit_of_mahud_ceo_adc" required>
              </div>
              <div class="col-6">
                
                {{-- <select class="custom-select form-control-border mt-4" name="relief_camp" required>
                  <option selected>Select Relief Camp</option>
                  @foreach ($relief_camps as $relief_camp)
                      <option value="{{$relief_camp->id}}">{{$relief_camp->relief_camp_name}}</option>
                  @endforeach
                </select> --}}
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6">
                <button type="submit" class="btn btn-info btn-flat">Update</button>
              </div>
            </div>
            <input type="hidden" value="{{$relief_camp_facilities->id}}" name="relief_camp_facility_id">
        </form>
        @if(session()->has('success'))
                <p style="display: none" id="edit_msg">{{session()->get('success')}}</p>
        @elseif(session()->has('error'))
                <p style="display: none" id="edit_msg1">{{session()->get('error')}}</p>
        @endif
      </div>
    </div>
    </div>
</div>

@endsection