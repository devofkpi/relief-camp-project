@extends('layouts.main_layout')

@section('title')
Basis Necessities
@endsection
@section('content_title')
Facilities Available at <span class="text-info">{{$relief_camp_name}} Relief Camp</span>
<a href="{{ route('update_facilities',$facilities_data[0]->id)}}" class=" btn btn-app bg-info float-right"><i class="fas fa-edit"></i>Edit</a>
@endsection
@section('content1')
<div class="row">
<div class="col-12">
    <div class="card">
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
                <td>Seprated Kitchen Available</td>
                <td>{{$facilities_data[0]->separate_kitchen?'Yes':'No'}}</td>
            </tr>
            <tr>
                <td>Open Space Available</td>
                <td>{{$facilities_data[0]->open_space?'Yes':'No'}}</td>
            </tr>
            <tr>
                <td>Water Tanks Capacity</td>
                <td>{{$facilities_data[0]->water_tanks_capacity}} in Liters</td>
            </tr>
            <tr>
                <td>Water Availability Ratio</td>
                <td>{{round($facilities_data[0]->water_avail_ratio,2)}}</td>
            </tr>
            <tr>
                <td>Number of Toilets</td>
                <td>{{$facilities_data[0]->number_of_toilets}}</td>
            </tr>
            <tr>
                <td>Toilet Ratio per Person</td>
                <td>{{round($facilities_data[0]->toilet_ratio_per_person,2)}}</td>
            </tr>
            <tr>
                <td>Number of Buckets</td>
                <td>{{$facilities_data[0]->number_of_buckets}}</td>
            </tr>
            <tr>
                <td>Bucket Ratio per Person</td>
                <td>{{round($facilities_data[0]->bucket_ratio_per_person,2)}}</td>
            </tr>
            <tr>
                <td>Number of Mugs</td>
                <td>{{$facilities_data[0]->number_of_mugs}}</td>
            </tr>
            <tr>
                <td>Mug Ratio per Person</td>
                <td>{{round($facilities_data[0]->mug_ratio_per_person,2)}}</td>
            </tr>
            <tr>
                <td>Sufficient Cooking Utensils Available</td>
                <td>{{$facilities_data[0]->sufficient_cooking_utensils?'Yes':'No'}}</td>
            </tr>
            <tr>
                <td>Number of Mattresses</td>
                <td>{{$facilities_data[0]->number_of_mattresses}}</td>
            </tr>
            <tr>
              <td>Mattress Ratio per Person</td>
              <td>{{round($facilities_data[0]->mattress_ratio_per_person,2)}}</td>
            </tr>
            <tr>
              <td>Number of Bedsheets</td>
              <td>{{$facilities_data[0]->number_of_bedsheets}}</td>
            </tr>
            <tr>
              <td>Bedsheet Ratio per Person</td>
              <td>{{round($facilities_data[0]->bedsheet_ratio_per_person,2)}}</td>
            </tr>
            <tr>
              <td>Number of Pillows</td>
              <td>{{$facilities_data[0]->number_of_pillows}}</td>
            </tr>
            <tr>
              <td>Pillow Ration per Person</td>
              <td>{{round($facilities_data[0]->pillow_ratio_per_person,2)}}</td>
            </tr>
            <tr>
              <td>Number of Blankets</td>
              <td>{{$facilities_data[0]->number_of_blankets}}</td>
            </tr>
            <tr>
              <td>Blanket Ratio per Person</td>
              <td>{{round($facilities_data[0]->blanket_ratio_per_person,2)}}</td>
            </tr>
            <tr>
              <td>Number of Mosquito Nets</td>
              <td>{{$facilities_data[0]->number_of_mosquitos}}</td>
            </tr>
            <tr>
              <td>Mosquito Net Ratio per Person</td>
              <td>{{round($facilities_data[0]->mosquito_ratio_per_person,2)}}</td>
            </tr>
            <tr>
              <td>Sufficient Lighting Facility Available</td>
              <td>{{$facilities_data[0]->sufficient_lighting_facility?'Yes':'No'}}</td>
            </tr>
            <tr>
              <td>Number of Fans</td>
              <td>{{$facilities_data[0]->number_of_fans}}</td>
            </tr>
            <tr>
              <td>Fans Ratio per Person</td>
              <td>{{round($facilities_data[0]->fans_ratio_per_person,2)}}</td>
            </tr>
            <tr>
              <td>Sufficient Plates and Glasses Available</td>
              <td>{{$facilities_data[0]->sufficient_plates_glasses?'Yes':'No'}}</td>
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
            {{-- <tr>
              <td>Number of Person Staying at Night</td>
              <td>{{$facilities_data[0]->number_of_persons_staying_at_night}}</td>
            </tr>
            <tr>
              <td>Availability of Food Grains in Days</td>
              <td>{{$facilities_data[0]->availability_of_food_grains_in_days}}</td>
            </tr> --}}
            <tr>
              <td>Availability of Safe Drinking Water</td>
              <td>{{$facilities_data[0]->safe_drinking_water?'Yes':'No'}}</td>
            </tr>
            <tr>
              <td>Provisioning of Supplement</td>
              <td>{{$facilities_data[0]->provisioning_of_supplement?'Yes':'No'}}</td>
            </tr>
            <tr>
              <td>Availability of Soap and Other Consumable items in Days</td>
              <td>{{$facilities_data[0]->availability_of_soap_consumable_in_days}}</td>
            </tr>
            <tr>
              <td>Number of School going Students Identified</td>
              <td>{{$facilities_data[0]->number_of_school_going_students}}</td>
            </tr>
            <tr>
              <td>Number of Students linked to School</td>
              <td>{{$facilities_data[0]->number_of_students_linked_to_school}}</td>
            </tr>
            <tr>
              <td>Percantage of Students linked to School</td>
              <td>{{$facilities_data[0]->per_of_students_linked_to_school}} %</td>
            </tr>
            <tr>
              <td>Number of Children Identified for Anganwadi</td>
              <td>{{$facilities_data[0]->number_of_child_identified_anganwadi}}</td>
            </tr>
            <tr>
              <td>Number of Children linked to Anganwadi</td>
              <td>{{$facilities_data[0]->number_of_child_linked_anganwadi}}</td>
            </tr>
            <tr>
              <td>Percantage of Children linked to Anganwadi</td>
              <td>{{$facilities_data[0]->per_child_linked_anganwadi}} %</td>
            </tr>
            <tr>
              <td>Number of Pregnant Women</td>
              <td>{{$facilities_data[0]->number_of_pregnant_women}}</td>
            </tr>
            <tr>
              <td>Number of Pregnant Women linked to Health facility</td>
              <td>{{$facilities_data[0]->number_of_pregnant_women_linked_health}}</td>
            </tr>
            <tr>
              <td>Percantage of Pregnant Women linked to Health facility</td>
              <td>{{$facilities_data[0]->per_of_pregnant_women_linked_health}} %</td>
            </tr>
            <tr>
              <td>Number of Specially Abled Person</td>
              <td>{{$facilities_data[0]->number_of_disabled_person}}</td>
            </tr>
            <tr>
              <td>Number of Specially Abled Person Linked to Some Facility</td>
              <td>{{$facilities_data[0]->number_of_disabled_person_linked_facility}}</td>
            </tr>
            <tr>
              <td>Percantage of Specially Abled Person Linked to Some Facility</td>
              <td>{{$facilities_data[0]->per_of_disabled_person_linked_facility}} %</td>
            </tr>
            <tr>
              <td>Number of Children separated from parents</td>
              <td>{{$facilities_data[0]->number_of_child_separated_parents}}</td>
            </tr>
            <tr>
              <td>Number of Children separated from parents linked to Social welfare</td>
              <td>{{$facilities_data[0]->number_of_child_separated_parents_linked_sw}}</td>
            </tr>
            <tr>
              <td>Percantage of Children Separated from parents linked to Social welfare</td>
              <td>{{$facilities_data[0]->per_of_child_separated_parents_linked_sw}} %</td>
            </tr>
            <tr>
              <td>Date of Visit of Health</td>
              <td>{{date('d-F-y',strtotime(str_replace('/','-',$facilities_data[0]->date_visit_of_health)))}}</td>
            </tr>
            <tr>
              <td>Date of Visit of PHED</td>
              <td>{{date('d-F-y',strtotime(str_replace('/','-',$facilities_data[0]->date_visit_of_phed)))}}</td>
            </tr>
            <tr>
              <td>Date of Visit of Social Welfare</td>
              <td>{{date('d-F-y',strtotime(str_replace('/','-',$facilities_data[0]->date_visit_of_social_welfare)))}}</td>
            </tr>
            <tr>
              <td>Date of Visit of Caf&PD</td>
              <td>{{date('d-F-y',strtotime(str_replace('/','-',$facilities_data[0]->date_visit_of_cafpd)))}}</td>
            </tr>
            <tr>
              <td>Date of Visit of Education</td>
              <td>{{date('d-F-y',strtotime(str_replace('/','-',$facilities_data[0]->date_visit_of_edu)))}}</td>
            </tr>
            <tr>
              <td>Date of Visit of Power</td>
              <td>{{date('d-F-y',strtotime(str_replace('/','-',$facilities_data[0]->date_visit_of_pow)))}}</td>
            </tr>
            <tr>
              <td>Date of Visit of MAHUD or CEO ADC</td>
              <td>{{date('d-F-y',strtotime(str_replace('/','-',$facilities_data[0]->date_visit_of_mahud_ceo_adc)))}}</td>
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
