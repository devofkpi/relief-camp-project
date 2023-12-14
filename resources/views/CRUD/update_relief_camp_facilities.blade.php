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
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->building_type }}" name="building_type" required>
              </div>
              <div class="col-3 form-group">
                <label for="">Number of Persons</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_persons }}" name="number_of_persons" required>
              </div>
              <div class="col-3 form-group">
                <label for="">Number of Rooms</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_rooms }}" name="number_of_rooms" required>
              </div>
              <div class="col-3 form-group">
                <label for="">Number of Halls</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_halls }}" name="number_of_halls" required>
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
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->water_tanks_capacity }}" name="water_tanks_capacity" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Water availability ratio</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->water_avail_ratio,2) }}" name="water_availability_ratio" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of Toilets</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_toilets }}" name="number_of_toilets" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-4 form-group">
                <label for="">Toilet ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->toilet_ratio_per_person,2) }}" name="toilet_ratio_per_person" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of Buckets</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_buckets }}" name="number_of_buckets" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Bucket ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->bucket_ratio_per_person,2) }}" name="bucket_ratio_per_person" required>
              </div>
            </div>
  
            <div class="row mb-3">
              <div class="col-4 form-group">
                <label for="">Number of Mugs</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_mugs }}" name="number_of_mugs" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Mug ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->mug_ratio_per_person,2) }}" name="mug_ratio_per_person" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of mattresses</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_mattresses }}" name="number_of_mattresses" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-4 form-group">
                <label for="">Mattress ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->mattress_ratio_per_person,2) }}" name="mattress_ratio_per_person" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of bedsheets</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_badsheets }}" name="number_of_bedsheets" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Bedsheet ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->badsheet_ratio_per_person,2) }}" name="bedsheet_ratio_per_person" required>
              </div>
            </div>
            <div class="row mb-3">
              
              <div class="col-4 form-group">
                <label for="">Number of pillows</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_pillows }}" name="number_of_pillows" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Pillow ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->pillow_ratio_per_person,2) }}" name="pillow_ratio_per_person" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of blankets</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_blankets }}" name="number_of_blankets" required>
              </div>
            </div>
            <div class="row mb-3">
              
              <div class="col-4 form-group">
                <label for="">Blanket ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->blanket_ratio_per_person,2) }}" name="blanket_ratio_per_person" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Number of mosquito nets</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_mosquitos }}" name="number_of_mosquito_nets" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Mosquito net ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->mosquito_ratio_per_person,2) }}" name="mosquito_net_ratio" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-4 form-group">
                <label for="">Number of fans</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_fans }}" name="number_of_fans" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Fan ratio per person</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->fans_ratio_per_person,2) }}" name="fan_ratio_per_person" required>
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
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->fuel_sources }}" name="fuel_source" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Availability of fuel in days</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->availability_of_fuel_in_days }}" name="avl_of_fuel_in_days" required>
              </div>
              <div class="col-4 form-group">
                <label for="">Availability of rice in days</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->availability_of_rice_in_days }}" name="avl_of_rice_in_days" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Availability of dal in days</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->availability_of_dal_in_days }}" name="avl_of_dal_in_days" required>
              </div>
              <div class="col-6 form-group">
                <label for="">Availability of veg in days</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->availability_of_veg_in_days }}" name="avl_of_veg_in_days" required>
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
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->availability_of_soap_consumable_in_days }}" name="soap_and_other_consumable" required>
              </div>
              <div class="col-6 form-group">
                <label for="">Number of school going students</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_school_going_students }}" name="number_of_school_going_student_identified" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Number of students linked to school</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_students_linked_to_school }}" name="number_of_student_linked_to_school" required>
              </div>
              <div class="col-6 form-group">
                <label for="">Percantage of students linked to school</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->per_of_students_linked_to_school,2) }}" name="per_of_student_linked_to_school" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Number of children identified for anganwadi</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_child_identified_anganwadi }}" name="number_of_children_for_anganwadi" required>
              </div>
              <div class="col-6 form-group">
                <label for="">Number of children linked to anaganwadi</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_child_linked_anganwadi }}" name="number_of_children_linked_to_anganwadi" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Percantage of children linked to anganwadi</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->per_child_linked_anganwadi,2) }}" name="per_of_children_linked_to_anganwadi" required>
              </div>
              <div class="col-6 form-group">
                <label for="">Number of pregnant women</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_pregnant_women }}" name="number_of_pregnant_women" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Number of pregnant women linked to health facility</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_pregnant_women_linked_health }}" name="number_of_pregnant_women_linked_to_health" required>
              </div>
              <div class="col-6 form-group">
                <label for="">Percantage of pregnant women linked to health facility</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->per_of_pregnant_women_linked_health,2) }}" name="per_of_pregnant_women_linked_to_health" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Number of specially abled person</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_disabled_person }}" name="number_of_disabled" required>
              </div>
              <div class="col-6 form-group">
                <label for="">Number of specially abled person linked to some facility</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_disabled_person_liked_facility }}" name="number_of_disabled_linked_to_facility" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Percantage of specially abled person linked to some facility</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->per_of_disabled_person_liked_facility,2) }}" name="per_of_disabled_linked_to_facility" required>
              </div>
              <div class="col-6 form-group">
                <label for="">Number of children separated from parents</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_child_separated_parents }}" name="number_of_child_sep_from_perants" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-6 form-group">
                <label for="">Number of children separated from parents linked to social welfare</label>
                <input type="text" class="form-control" value="{{ $relief_camp_facilities->number_of_child_separated_parents_linked_sw }}" name="number_of_child_sep_from_perants_linked_to_facility" required>
              </div>
              <div class="col-6 form-group">
                <label for="">Percantage of children separated from parents linked to social welfare</label>
                <input type="text" class="form-control" value="{{ round($relief_camp_facilities->per_of_child_separated_parents_linked_sw,2) }}" name="per_of_child_sep_from_perants_linked_to_facility" required>
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
      </div>
    </div>
    </div>
</div>

@endsection