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
    <div class="col-8">
      @if($errors->has('msg'))
      <p class="text-danger">{{$errors->first('msg')}}</p>
      @endif
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
              <form action="{{route('create_facilities.post')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-3">
                      <input type="text" class="form-control" placeholder="Building Type" name="building_type" id="input_text_build_type" required>
                    <span class="text-danger" id="input_text_error_build_type"></span>
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control" placeholder="Number of Persons" id="input_number_persons" name="number_of_persons" required>
                      <span class="text-danger" id="input_number_error_persons"></span>
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control" placeholder="Number of Rooms" id="input_number_rooms" name="number_of_rooms" required>
                      <span class="text-danger" id="input_number_error_rooms"></span>
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control" placeholder="Number of Halls" id="input_number_halls" name="number_of_halls" required>
                      <span class="text-danger" id="input_number_error_halls"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4 form-group pl-4">
                      <input type="checkbox" class="form-check-input" value="1" name="separate_kitchen" id="separate_kitchen" checked>
                      <label class="form-check-label" for="separate_kitchen">Separate Kitchen Available</label>
                    </div>
                    <div class="col-4 form-group pl-4">
                      <input type="checkbox" class="form-check-input" value="1" name="open_space" id="open_space" checked>
                      <label class="form-check-label" for="open_space">Open Space Available</label>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Toilets" id="input_number_toilets" name="number_of_toilets" required>
                      <span class="text-danger" id="input_number_error_toilets"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Persons Utilising Toilets" id="input_number_toilets" name="number_of_person_utilising_toilets" required>
                      <span class="text-danger" id="input_number_error_utilising_toilets"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Water Tanks Capacity(in Litres)" id="input_number_water_capacity" name="water_tanks_capacity" required>
                      <span class="text-danger" id="input_number_error_water_cpcity"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Water Availability Ratio Per Person" id="input_number_avl_water" name="water_availability_ratio" required>
                      <span class="text-danger" id="input_number_error_avl_water"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Toilets" id="input_number_tlts" name="number_of_toilets" required>
                      <span class="text-danger" id="input_number_error_tlts"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Toilet Ratio per Person" id="input_number_ratio_tlts" name="toilet_ratio_per_person" required>
                      <span class="text-danger" id="input_number_error_ratio_tlts"></span>
                    </div>
                  </div>
        
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Buckets" id="input_number_buckets" name="number_of_buckets" required>
                      <span class="text-danger" id="input_number_error_buckets"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Bucket Ratio per Person" id="input_number_ratio_buckets" name="bucket_ratio_per_person" required>
                      <span class="text-danger" id="input_number_error_ratio_buckets"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Mugs" id="input_number_mugs" name="number_of_mugs" required>
                      <span class="text-danger" id="input_number_error_mugs"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Mug Ratio pe Person" id="input_number_ratio_mug" name="mug_ratio_per_person" required>
                      <span class="text-danger" id="input_number_error_ratio_mugs"></span>
                    </div>
                    <div class="col-4 form-group pl-4">
                      <input type="checkbox" class="form-check-input" value="1" name="sufficient_cooking_utensils" id="sufficient_cooking_utensils" checked>
                      <label class="form-check-label" for="sufficient_cooking_utensils">Sufficient Cooking Utensils Available</label>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Mattresses" id="input_number_matres" name="number_of_mattresses" required>
                      <span class="text-danger" id="input_number_error_matres"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Mattress Ratio per Person" id="input_number_ratio_matres" name="mattress_ratio_per_person" required>
                      <span class="text-danger" id="input_number_error_ratio_matres"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Bedsheets" id="input_number_bedsheet" name="number_of_bedsheets" required>
                      <span class="text-danger" id="input_number_error_bedsheet"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Bedsheet Ratio per Person" id="input_number_ratio_bedsheet" name="bedsheet_ratio_per_person" required>
                      <span class="text-danger" id="input_number_error_ratio_bedsheet"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Pillows" id="input_number_pillows" name="number_of_pillows" required>
                      <span class="text-danger" id="input_number_error_pillows"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Pillow Ratio per Person" id="input_number_ratio_pillows" name="pillow_ratio_per_person" required>
                      <span class="text-danger" id="input_number_error_ratio_pillow"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Blankets" id="input_number_blankets" name="number_of_blankets" required>
                      <span class="text-danger" id="input_number_error_blankets"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Blanket Ratio per Person" id="input_number_ratio_blanket" name="blanket_ratio_per_person" required>
                      <span class="text-danger" id="input_number_error_ratio_blanket"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Mosquito Nets" id="input_number_mosqito_net" name="number_of_mosquito_nets" required>
                      <span class="text-danger" id="input_number_error_mosqito_net"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Mosquito Nets Ratio per Person" id="input_number_ratio_mosqito_net" name="mosquito_net_ratio" required>
                      <span class="text-danger" id="input_number_error_ratio_mosqito_net"></span>
                    </div>
                    <div class="col-4 pl-4">
                      <input type="checkbox" class="form-check-input" value="1" name="sufficient_lighting_facility" id="sufficient_lighting_facility" checked>
                      <label class="form-check-label" for="sufficient_lighting_facility">Sufficient Lighting Facility</label>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Fans" id="input_number_fans" name="number_of_fans" required>
                      <span class="text-danger" id="input_number_error_fans"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Fan Ratio per Person" id="input_number_ratio_fans" name="fan_ratio_per_person" required>
                      <span class="text-danger" id="input_number_error_ratio_fans"></span>
                    </div>
                    <div class="col-4 form-group pl-4">
                      <input type="checkbox" class="form-check-input" value="1" name="sufficient_plates_glasses" id="sufficient_plates_glasses" checked>
                      <label class="form-check-label" for="sufficient_plates_glasses">Sufficient Plates and Glasses Available</label>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Fuel Source" id="input_text_fuel" name="fuel_source" required>
                      <span class="text-danger" id="input_text_error_fuel"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Availability of Fuel in Days" id="input_number_avl_fuel" name="avl_of_fuel_in_days" required>
                      <span class="text-danger" id="input_number_error_avl_fuel"></span>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Availability of Rice in Days" id="input_number_avl_rice" name="avl_of_rice_in_days" required>
                      <span class="text-danger" id="input_number_error_avl_rice"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Availability of Dal in Days" id="input_number_avl_dal" name="avl_of_dal_in_days" required>
                      <span class="text-danger" id="input_number_error_avl_daal"></span>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Availability of Veg in Days" id="input_number_avl_veg" name="avl_of_veg_in_days" required>
                      <span class="text-danger" id="input_number_error_avl_veg"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4 form-group pl-4">
                      <input type="checkbox" class="form-check-input" value="1" name="safe_drinking_water" id="safe_drinking_water" checked>
                      <label class="form-check-label" for="safe_drinking_water">Safe Drinking Water Available</label>
                    </div>
                    <div class="col-4 form-group">
                      <input type="checkbox" class="form-check-input" value="1" name="provisioning_of_suppl" id="provisioning_of_suppl" checked>
                      <label class="form-check-label" for="provisioning_of_suppl">Provisioning of Supplement Available</label>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Soap and Other Consumable Items in Days"  id="input_number_soap" name="soap_and_other_consumable" required>
                      <span class="text-danger" id="input_number_error_soap"></span>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of School Going Students Identified" id="input_number_school_stdnt" name="number_of_school_going_student_identified" required>
                      <span class="text-danger" id="input_number_error_school_stdnts"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Students Linked to School" id="input_number_school_stdnts_lnkd" name="number_of_student_linked_to_school" required>
                      <span class="text-danger" id="input_number_error_school_stdnts_lnkd"></span>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Per of Students Linked to School" id="input_number_school_stdnts_lnkd_per"  name="per_of_student_linked_to_school" required>
                      <span class="text-danger" id="input_number_error_school_stdnts_lnkd_per"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Children Identified for Anganwadi" id="input_number_child_angwadi" name="number_of_children_for_anganwadi" required>
                      <span class="text-danger" id="input_number_error_children_angwadi"></span>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Children Linked to Anganwadi" id="input_number_child_angwadi_lnkd" name="number_of_children_linked_to_anganwadi" required>
                      <span class="text-danger" id="input_number_error_children_angwadi_lnkd"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Percantage of Children Linked to Anganwadi" id="input_number_child_angwadi_per" name="per_of_children_linked_to_anganwadi" required>
                      <span class="text-danger" id="input_number_error_children_angwadi_per"></span>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Pregnant Women" id="input_number_prgnt_women" name="number_of_pregnant_women" required>
                      <span class="text-danger" id="input_number_error_prgnt_women"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Pregnant Women Linked to Health Facility" id="input_number_prgnt_women_lnkd" name="number_of_pregnant_women_linked_to_health" required>
                      <span class="text-danger" id="input_number_error_prgnt_women_lnkd"></span>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Percantage of Pregnant Women Linked to Health Facility" id="input_number_prgnt_women_lnkd_per" name="per_of_pregnant_women_linked_to_health" required>
                      <span class="text-danger" id="input_number_error_prgnt_women_lnkd_per"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Specially Abled Person" id="input_number_pwd" name="number_of_disabled" required>
                      <span class="text-danger" id="input_number_error_pwd"></span>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Specially Abled Person Linked to Some Facility" id="input_number_pwd_lnkd" name="number_of_disabled_linked_to_facility" required>
                      <span class="text-danger" id="input_number_error_pwd_lnkd"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Percantage of Specially Abled Person Linked to Some Facility" id="input_number_pwd_lnkd_per" name="per_of_disabled_linked_to_facility" required>
                      <span class="text-danger" id="input_number_error_pwd_lnkd_per"></span>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Children Seprated from Perants" id="input_number_child_prnts" name="number_of_child_sep_from_perants" required>
                      <span class="text-danger" id="input_number_error_child_prnts"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Children Seprated from Perants Linked to Some Facility" id="input_number_child_prnts_lnkd" name="number_of_child_sep_from_perants_linked_to_facility" required>
                      <span class="text-danger" id="input_number_error_child_prnts_lnkd"></span>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Percantage of Children Seprated from Perants Linked to Some Facility" id="input_number_child_prnts_lnkd_per" name="per_of_child_sep_from_perants_linked_to_facility" required>
                      <span class="text-danger" id="input_number_error_child_prnts_lnkd_per"></span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6 form-group">
                      <label for="date_of_visit_of_health">Date of Visit of Health</label>
                      <input type="date" class="form-control" name="date_of_visit_of_health" id="date_of_visit_of_health" required>
                    </div>
                    <div class="col-6 form-group">
                      <label for="date_of_visit_of_phed">Date of Visit of PHED</label>
                      <input type="date" class="form-control" name="date_of_visit_of_phed" id="date_of_visit_of_phed" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6 form-group">
                      <label for="date_of_visit_of_sw">Date of Visit of Social Welfare</label>
                      <input type="date" class="form-control" name="date_of_visit_of_sw" id="date_of_visit_of_sw" required>
                    </div>
                    <div class="col-6 form-group">
                      <label for="date_of_visit_of_cafpd">Date of Visit of CAF and PD</label>
                      <input type="date" class="form-control" name="date_of_visit_of_cafpd" id="date_of_visit_of_cafpd" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6 form-group">
                      <label for="date_of_visit_of_edu">Date of Visit of Education</label>
                      <input type="date" class="form-control" name="date_of_visit_of_edu" id="date_of_visit_of_edu" required>
                    </div>
                    <div class="col-6 form-group">
                      <label for="date_of_visit_of_power">Date of Visit of Power</label>
                      <input type="date" class="form-control" name="date_of_visit_of_power" id="date_of_visit_of_power" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6 form-group">
                      <label for="date_of_visit_of_mahud_ceo_adc">Date of Visit of MAHUD or CEO ADC</label>
                      <input type="date" class="form-control" name="date_of_visit_of_mahud_ceo_adc" id="date_of_visit_of_mahud_ceo_adc" required>
                    </div>
                    <div class="col-6">
                      
                      <select class="custom-select form-control-border mt-4" name="relief_camp_id" required>
                        <option selected>Select Relief Camp</option>
                        @foreach ($relief_camps as $relief_camp)
                            <option value="{{$relief_camp->id}}">{{$relief_camp->relief_camp_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <button type="submit" class="btn btn-info btn-flat">Create</button>
                    </div>
                  </div>
              </form>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              <form action="{{route('upload_facilities.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-8">
                      <h5 class="text-danger">Please upload the data in the format given here, also sanitize the data before uploading it.</h5>
                      <h6 class="text-info"><a href="{{ route('download_excel_sample',Crypt::encrypt('Relief Camp Facilities Sample.xlsx'))}}">( Click here )</a> to Download the format.</h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-8">
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
                  </div>
                </div>
              </form>
              @if(session()->has('success'))
                <p style="display: none" id="edit_msg">{{session()->get('success')}}</p>
              @elseif(session()->has('error'))
                <p style="display: none" id="edit_msg1">{{session()->get('error')}}</p>
              @endif
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection
