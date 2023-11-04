<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ReliefCampFacility,ReliefCamp};
use App\Imports\ReliefCampFacilitiesImport;
use Maatwebsite\Excel\HeadingRowImport;

use Maatwebsite\Excel\Facades\Excel;

class ReliefCampFacilityController extends Controller
{
    //
    public function showById(String $relief_camp_id=null){
        $relief_camp=ReliefCamp::findOrFail($relief_camp_id);
        $relief_camp_name=$relief_camp->relief_camp_name;
        $facilities_data=ReliefCampFacility::where('relief_camp_id','=',$relief_camp_id)->get();;
        return view('relief_camp_facilities',['facilities_data'=>$facilities_data,'relief_camp_name'=>$relief_camp_name]);
    }

    public function showFacilitiesForm(){

        $relief_camps=ReliefCamp::select('id','relief_camp_name','camp_code')->get();

        return view('CRUD.create_relief_camp_facilities',['relief_camps'=>$relief_camps]);
    }

    public function createFacilities(Request $request){

        ReliefCampFacility::create([
            'building_type'=>$request['building_type'],
            'number_of_persons'=>$request['number_of_persons'],
            'number_of_rooms'=>$request['number_of_rooms'],
            'number_of_halls'=>$request['number_of_halls'],
            'separate_kitchen'=>$request['separate_kitchen']=='yes'?true:false,
            'open_space'=>$request['open_space']=='yes'?true:false,
            'water_tanks_capacity'=>$request['water_tanks_capacity'],
            'water_availability_ratio'=>$request['water_availability_ratio'],
            'number_of_toilets'=>$request['number_of_toilets'],
            'number_of_persons_utilising_toilets'=>$request['number_of_persons_utilising_toilets'],
            'toilet_ratio_per_person'=>$request['toilet_ratio_per_person'],
            'number_of_buckets'=>$request['number_of_buckets'],
            'bucket_ratio_per_person'=>$request['bucket_ratio_per_person'],
            'number_of_mugs'=>$request['number_of_mugs'],
            'mug_ratio_per_person'=>$request['mug_ratio_per_person'],
            'sufficient_cooking_utensils'=>$request['sufficient_cooking_utensils']=='yes'?true:false,
            'number_of_mattresses'=>$request['number_of_mattresses'],
            'mattress_ratio_per_person'=>$request['mattress_ratio_per_person'],
            'number_of_badsheets'=>$request['number_of_badsheets'],
            'bedsheet_ratio_per_person'=>$request['bedsheet_ratio_per_person'],
            'number_of_pillows'=>$request['number_of_pillows'],
            'pillow_ratio_per_person'=>$request['pillow_ratio_per_person'],
            'number_of_blankets'=>$request['number_of_blankets'],
            'blanket_ratio_per_person'=>$request['blanket_ratio_per_person'],
            'number_of_mosquitos'=>$request['number_of_mosquito_nets'],
            'mosquito_ratio_per_person'=>$request['mosquito_net_ratio'],
            'sufficient_lighting_facility'=>$request['sufficient_lighting_facility']=='yes'?true:false,
            'number_of_fans'=>$request['number_of_fans'],
            'fans_ratio_per_person'=>$request['fan_ratio_per_person'],
            'sufficient_plates_glasses'=>$request['sufficient_plates_glasses']=='yes'?true:false,
            'fuel_sources'=>$request['fuel_source'],
            'availability_of_fuel_in_days'=>$request['avl_of_fuel_in_days'],
            'availability_of_rice_in_days'=>$request['avl_of_rice_in_days'],
            'availability_of_dal_in_days'=>$request['avl_of_dal_in_days'],
            'availability_of_veg_in_days'=>$request['availability_of_veg_in_days'],
            'safe_drinking_water'=>$request['safe_drinking_water']=='yes'?true:false,
            'provisioning_of_supplement'=>$request['provisioning_of_supplement']=='yes'?true:false,
            'availability_of_soap_consumable_in_days'=>$request['soap_and_other_consumable'],
            'number_of_school_going_students'=>$request['number_of_school_going_student_identified'],
            'number_of_students_linked_to_school'=>$request['number_of_student_linked_to_school'],
            'per_of_students_linked_to_school'=>$request['per_of_student_linked_to_school'],
            'number_of_child_identified_anganwadi'=>$request['number_of_children_for_anganwadi'],
            'number_of_child_linked_anganwadi'=>$request['number_of_children_linked_to_anganwadi'],
            'per_child_linked_anganwadi'=>$request['per_of_children_linked_to_anganwadi'],
            'number_of_pregnant_women'=>$request['number_of_pregnant_women'],
            'number_of_pregnant_women_linked_health'=>$request['number_of_pregnant_women_linked_to_health'],
            'per_of_pregnant_women_linked_health'=>$request['per_of_pregnant_women_linked_to_health'],
            'number_of_disabled_person'=>$request['number_of_disabled'],
            'number_of_disabled_person_linked_facility'=>$request['number_of_disabled_linked_to_facility'],
            'per_of_disabled_person_linked_facility'=>$request['per_of_disabled_linked_to_facility'],
            'number_of_child_separated_parents'=>$request['number_of_child_sep_from_perants'],
            'number_of_child_separated_parents_linked_sw'=>$request['number_of_child_sep_from_perants_linked_to_facility'],
            'per_of_child_separated_parents_linked_sw'=>$request['per_of_child_sep_from_perants_linked_to_facility'],
            'date_visit_of_health'=>$request['date_of_visit_of_health'],
            'date_visit_of_phed'=>$request['date_of_visit_of_phed'],
            'date_visit_of_social_welfare'=>$request['date_of_visit_of_sw'],
            'date_visit_of_cafpd'=>$request['date_of_visit_of_cafpd'],
            'date_visit_of_edu'=>$request['date_of_visit_of_edu'],
            'date_visit_of_pow'=>$request['date_of_visit_of_power'],
            'date_visit_of_mahud_ceo_adc'=>$request['date_of_visit_of_mahud_ceo_adc'],
            'relief_camp_id'=>$request['relief_camp_id']
        ]);

        return redirect()->back()->withSuccess('Relief Camp Facility created successfully');
    }

    public function campFacilitiesImport(Request $request){

        // $headings = (new HeadingRowImport)->toArray($request->file('relief_camp_facilities_excel'));

        Excel::import(new ReliefCampFacilitiesImport, $request->file('relief_camp_facilities_excel'));

        $relief_camps_facilities= ReliefCamp::with('reliefCampFacility')->get();

        return redirect()->back();

    }
}
