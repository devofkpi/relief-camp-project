@extends('layouts.main_layout')

@section('title')
Basis Necessities
@endsection
@section('content_title')
Facilities Available at <span class="text-info">{{$relief_camp_name}} Relief Camp</span>
@endsection
@section('content1')
<div class="row">
<div class="col-12">
    <div class="card">
      {{-- <div class="card-header">
        <h3 class="card-title">Responsive Hover Table</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
                <th scope="col">Different Parameters</th>
                <th>Their Values</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>Building Type</td>
                <td>{{$facilities_data[0]->building_type}}</td>
            </tr>
            <tr>
                <td>Number of Persons</td>
                <td>{{$facilities_data[0]->number_of_persons}}</td>
            </tr>
            <tr>
                <td>Number of Rooms</td>
                <td>{{$facilities_data[0]->number_of_rooms}}</td>
            </tr>
            <tr>
                <td>Number of Halls</td>
                <td>{{$facilities_data[0]->number_of_halls}}</td>
            </tr>
            <tr>
              <td>Separate Kitchen Available</td>
              <td>{{$facilities_data[0]->separate_kitchen==1?'Yes':'No'}}</td>
            </tr>
            <tr>
              <td>Open Space Available</td>
              <td>{{$facilities_data[0]->open_space==1?'Yes':'No'}}</td>
            </tr>
            <tr>
              <td>Water Tanks Capacity</td>
              <td>{{$facilities_data[0]->water_tanks_capacity}} Liters</td>
            </tr>
            <tr>
              <td>Water Availability Ratio Per Person</td>
              <td>{{$facilities_data[0]->water_avail_ratio}}</td>
            </tr>
            <tr>
                <td>Number of Toilets</td>
                <td>{{$facilities_data[0]->number_of_toilets}}</td>
            </tr>
            <tr>
                <td>Toilet Ratio Per Person</td>
                <td>{{$facilities_data[0]->toilet_ratio_per_person}}</td>
            </tr>
            <tr>
              <td>Number of Buckets</td>
              <td>{{$facilities_data[0]->number_of_buckets}}</td>
            </tr>
            <tr>
              <td>Bucket Ration Per Person</td>
              <td>{{$facilities_data[0]->bucket_ratio_per_person}}</td>
            </tr>
            <tr>
              <td>Number of Mugs</td>
              <td>{{$facilities_data[0]->number_of_mugs}}</td>
            </tr>
            <tr>
              <td>Mug Ration Per Person</td>
              <td>{{$facilities_data[0]->mug_ratio_per_person}}</td>
            </tr>
            <tr>
              <td>Sufficient Cooking Utensils Available</td>
              <td>{{$facilities_data[0]->sufficient_cooking_utensils==1?'Yes':'No'}}</td>
            </tr>
            <tr>
                <td>Number of Mattresses</td>
                <td>{{$facilities_data[0]->number_of_mattresses}}</td>
            </tr>
            <tr>
              <td>Mattress Ratio Per Person </td>
              <td>{{$facilities_data[0]->mattress_ratio_per_person}}</td>
            </tr>
            <tr>
                <td>Number of Badsheets</td>
                <td>{{$facilities_data[0]->number_of_badsheets}}</td>
            </tr>
            <tr>
              <td>Badsheet Ration Per Person</td>
              <td>{{$facilities_data[0]->badsheet_ratio_per_person}}</td>
            </tr>
            <tr>
              <td>Number of Pillows</td>
              <td>{{$facilities_data[0]->number_of_pillows}}</td>
            </tr>
            <tr>
              <td>Pillow Ratio Per Person</td>
              <td>{{$facilities_data[0]->pillow_ratio_per_person}}</td>
            </tr>
            <tr>
                <td>Number of Blankets</td>
                <td>{{$facilities_data[0]->number_of_blankets}}</td>
            </tr>
            <tr>
              <td>Blanket Ration Per Person</td>
              <td>{{$facilities_data[0]->blanket_ratio_per_person}}</td>
            </tr>
            <tr>
                <td>Number of Mosquito</td>
                <td>{{$facilities_data[0]->number_of_mosquito}}</td>
            </tr>
            <tr>
              <td>Mosquito Ratio Per Person</td>
              <td>{{$facilities_data[0]->mosquito_ratio_per_person}}</td>
            </tr>
            <tr>
              <td>Sufficient Lighting Facility Available</td>
              <td>{{$facilities_data[0]->sufficient_lighting_facility==1?'Yes':'No'}}</td>
            </tr>
            <tr>
                <td>Number of Fans</td>
                <td>{{$facilities_data[0]->number_of_fans}}</td>
            </tr>
            <tr>
              <td>Fan Ratio Per Person</td>
              <td>{{$facilities_data[0]->fans_ratio_per_person}}</td>
            </tr>
            <tr>
              <td>Sufficient Plates and Glasses Available</td>
              <td>{{$facilities_data[0]->sufficient_plates_glasses==1?'Yes':'No'}}</td>
            </tr>
            <tr>
              <td>Fuel Sources</td>
              <td>{{$facilities_data[0]->fuel_sources}}</td>
            </tr>
            <tr>
              <td>Availability of Fuel in Days</td>
              <td>{{$facilities_data[0]->availability_of_fuel_in_days}}</td>
            </tr>
            <tr>
              <td>Availability of Rice in Days</td>
              <td>{{$facilities_data[0]->availability_of_rice_in_days}}</td>
            </tr>
           
            <tr>
              <td>Availability of Dal in Days</td>
              <td>{{$facilities_data[0]->availability_of_dal_in_days}}</td>
            </tr>
            <tr>
              <td>Availability of Veg in Days</td>
              <td>{{$facilities_data[0]->availability_of_veg_in_days}}</td>
            </tr>
            <tr>
                <td>Safe Drinking Water Available</td>
                <td>{{$facilities_data[0]->safe_drinking_water==1?'Yes':'No'}}</td>
            </tr>
            <tr>
                <td>Provisioning of Supplement</td>
                <td>{{$facilities_data[0]->provisioning_of_supplement==1?'Yes':'No'}}</td>
            </tr>
            <tr>
              <td>Availability of Soap and Other Consumable Items in Days</td>
              <td>{{$facilities_data[0]->availability_of_soap_consumable_in_days}}</td>
            </tr>
            <tr>
              <td>Number of School Going Student Identified</td>
              <td>{{$facilities_data[0]->number_of_school_going_students}}</td>
            </tr>
            <tr>
              <td>Number of Students Linked to School</td>
              <td>{{$facilities_data[0]->number_of_students_linked_to_school}}</td>
            </tr>
            {{-- <tr>
                <td>Number of Persons Staying at Night</td>
                <td>{{$facilities_data[0]->number_of_persons_staying_at_night}}</td>
            </tr> --}}
            {{-- <tr>
                <td>Availability of Food Grains in Days</td>
                <td>{{$facilities_data[0]->availability_of_food_grains_in_days}}</td>
            </tr> --}}
            <tr>
              <td>Percentage of Students Linked to School</td>
              <td>{{$facilities_data[0]->per_of_students_linked_to_school}}</td>
            </tr>
            <tr>
              <td>Number of Children Identified for Anganwadi</td>
              <td>{{$facilities_data[0]->number_of_child_identified_anganwadi}}</td>
            </tr>
            <tr>
              <td>Number of Children Linked to Anganwadi</td>
              <td>{{$facilities_data[0]->number_of_child_linked_anganwadi}}</td>
            </tr>
            <tr>
              <td>Percentage of Children Linked to Anganwadi</td>
              <td>{{$facilities_data[0]->per_child_linked_anganwadi}}</td>
            </tr>
            <tr>
              <td>Number of Pregnant Women</td>
              <td>{{$facilities_data[0]->number_of_pregnant_women}}</td>
            </tr>
            <tr>
              <td>Number of Pregnant Women Linked to Health Care Facility</td>
              <td>{{$facilities_data[0]->number_of_pregnant_women_linked_health}}</td>
            </tr>
            <tr>
              <td>Percentage of Pregnant Women Linked to Health Care Facility</td>
              <td>{{$facilities_data[0]->per_of_pregnant_women_linked_health}}</td>
            </tr>
            <tr>
              <td>Number of Specially Abled Persons</td>
              <td>{{$facilities_data[0]->number_of_disabled_person}}</td>
            </tr>
            <tr>
              <td>Number of Specially Abled Persons Linked to Some Facility</td>
              <td>{{$facilities_data[0]->number_of_disabled_person_liked_facility}}</td>
            </tr>
            <tr>
              <td>Percentage of Specially Abled Persons Linked to Some Facility</td>
              <td>{{$facilities_data[0]->per_of_disabled_person_liked_facility}}</td>
            </tr>
            <tr>
              <td>Number of Children Seprated from Parentes</td>
              <td>{{$facilities_data[0]->number_of_child_separated_parents}}</td>
            </tr>
            <tr>
              <td>Number of Children Seprated from Parentes Linked to Social Welfare</td>
              <td>{{$facilities_data[0]->number_of_child_separated_parents_linked_sw}}</td>
            </tr>
            <tr>
              <td>Percentage of Children Seprated from Parentes Linked to Social Welfare</td>
              <td>{{$facilities_data[0]->per_of_child_separated_parents_linked_sw}}</td>
            </tr>
            <tr>
              <td>Date of Visit of Health Department</td>
              <td>{{$facilities_data[0]->date_visit_of_health}}</td>
            </tr>
            <tr>
              <td>Date of Visit of PHED Department</td>
              <td>{{$facilities_data[0]->date_visit_of_phed}}</td>
            </tr>
            <tr>
              <td>Date of Visit of Social Welfare Department</td>
              <td>{{$facilities_data[0]->date_visit_of_social_welfare}}</td>
            </tr>
            <tr>
              <td>Date of Visit of CAF&PD Department</td>
              <td>{{$facilities_data[0]->date_visit_of_cafpd}}</td>
            </tr>
            <tr>
              <td>Date of Visit of Education Department</td>
              <td>{{$facilities_data[0]->date_visit_of_edu}}</td>
            </tr>
            <tr>
              <td>Date of Visit of Power Department</td>
              <td>{{$facilities_data[0]->date_visit_of_pow}}</td>
            </tr>
            <tr>
              <td>Date of Visit of MAHUD/CEO ADC Department</td>
              <td>{{$facilities_data[0]->date_visit_of_mahud_ceo_adc}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection
