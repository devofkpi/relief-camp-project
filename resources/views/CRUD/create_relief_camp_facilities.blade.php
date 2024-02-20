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
                      <input type="text" class="form-control" placeholder="Building Type" name="building_type" required>
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control" placeholder="Number of Persons" name="number_of_persons" required>
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control" placeholder="Number of Rooms" name="number_of_rooms" required>
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control" placeholder="Number of Halls" name="number_of_halls" required>
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
                      <input type="text" class="form-control" placeholder="Number of Toilets" name="number_of_toilets" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Persons Utilising Toilets" name="number_of_person_utilising_toilets" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Water Tanks Capacity(in Litres)" name="water_tanks_capacity" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Water Availability Ratio Per Person" name="water_availability_ratio" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Toilets" name="number_of_toilets" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Toilet Ratio per Person" name="toilet_ratio_per_person" required>
                    </div>
                  </div>
        
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Buckets" name="number_of_buckets" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Bucket Ratio per Person" name="bucket_ratio_per_person" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Mugs" name="number_of_mugs" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Mug Ratio pe Person" name="mug_ratio_per_person" required>
                    </div>
                    <div class="col-4 form-group pl-4">
                      <input type="checkbox" class="form-check-input" value="1" name="sufficient_cooking_utensils" id="sufficient_cooking_utensils" checked>
                      <label class="form-check-label" for="sufficient_cooking_utensils">Sufficient Cooking Utensils Available</label>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Mattresses" name="number_of_mattresses" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Mattress Ratio per Person" name="mattress_ratio_per_person" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Bedsheets" name="number_of_bedsheets" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Bedsheet Ratio per Person" name="bedsheet_ratio_per_person" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Pillows" name="number_of_pillows" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Pillow Ratio per Person" name="pillow_ratio_per_person" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Blankets" name="number_of_blankets" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Blanket Ratio per Person" name="blanket_ratio_per_person" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Mosquito Nets" name="number_of_mosquito_nets" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Mosquito Nets Ratio per Person" name="mosquito_net_ratio" required>
                    </div>
                    <div class="col-4 pl-4">
                      <input type="checkbox" class="form-check-input" value="1" name="sufficient_lighting_facility" id="sufficient_lighting_facility" checked>
                      <label class="form-check-label" for="sufficient_lighting_facility">Sufficient Lighting Facility</label>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Number of Fans" name="number_of_fans" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Fan Ratio per Person" name="fan_ratio_per_person" required>
                    </div>
                    <div class="col-4 form-group pl-4">
                      <input type="checkbox" class="form-check-input" value="1" name="sufficient_plates_glasses" id="sufficient_plates_glasses" checked>
                      <label class="form-check-label" for="sufficient_plates_glasses">Sufficient Plates and Glasses Available</label>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Fuel Source" name="fuel_source" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Availability of Fuel in Days" name="avl_of_fuel_in_days" required>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Availability of Rice in Days" name="avl_of_rice_in_days" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Availability of Dal in Days" name="avl_of_dal_in_days" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Availability of Veg in Days" name="avl_of_veg_in_days" required>
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
                      <input type="text" class="form-control" placeholder="Soap and Other Consumable Items in Days" name="soap_and_other_consumable" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of School Going Students Identified" name="number_of_school_going_student_identified" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Students Linked to School" name="number_of_student_linked_to_school" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Per of Students Linked to School" name="per_of_student_linked_to_school" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Children Identified for Anganwadi" name="number_of_children_for_anganwadi" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Children Linked to Anganwadi" name="number_of_children_linked_to_anganwadi" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Percantage of Children Linked to Anganwadi" name="per_of_children_linked_to_anganwadi" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Pregnant Women" name="number_of_pregnant_women" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Pregnant Women Linked to Health Facility" name="number_of_pregnant_women_linked_to_health" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Percantage of Pregnant Women Linked to Health Facility" name="per_of_pregnant_women_linked_to_health" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Specially Abled Person" name="number_of_disabled" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Specially Abled Person Linked to Some Facility" name="number_of_disabled_linked_to_facility" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Percantage of Specially Abled Person Linked to Some Facility" name="per_of_disabled_linked_to_facility" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Children Seprated from Perants" name="number_of_child_sep_from_perants" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Number of Children Seprated from Perants Linked to Some Facility" name="number_of_child_sep_from_perants_linked_to_facility" required>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Percantage of Children Seprated from Perants Linked to Some Facility" name="per_of_child_sep_from_perants_linked_to_facility" required>
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
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection
