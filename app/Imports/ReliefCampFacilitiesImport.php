<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{ToCollection,WithCalculatedFormulas,WithHeadingRow};
use App\Models\{ReliefCamp,ReliefCampFacility};



class ReliefCampFacilitiesImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param Collection $collection
    */
    private $relief_camps;

    public function __construct(){

        $this->relief_camps=ReliefCamp::select('id','camp_code')->get();
    }

    // public function headings(){
    //     return [
    //         'number_of_persons',
    //         'number_of_rooms',
    //         'number_of_halls',
    //         'separate_kitchen_available',
    //         'open_space_available',
    //         'water_tanks_capacity',
    //         'water_availability_ratio',
    //         'number_of_toilets',
    //         'toilet_ratio_per_persons',
    //         'number_of_buckets',
    //         'bucket_ratio_per_persons',
    //         'number_of_mugs',
    //         'mug_ratio_per_persons',
    //         'sufficient_cooking_utensils_available',
    //         'number_of_mattresses',
    //         'mattress_ratio_per_persons',
    //         'number_of_bedsheets',
    //         'bedsheet_ratio_per_persons',
    //         'number_of_pillows',
    //         'pillow_ratio_per_persons',
    //         'number_of_blankets',
    //         'blanket_ratio_per_persons',
    //         'number_of_mosquito_nets',
    //         'mosquito_net_ratio_per_persons',
    //         'sufficient_lighting_facility_available',
    //         'number_of_fans',
    //         'fan_ratio_per_persons',
    //         'sufficient_plates_and_glasses_available',
    //         'fuel_source',
    //         'availability_of_fuel_in_days',
    //         'availability_of_rice_in_days',
    //         'availability_of_dal_in_days',
    //         'availability_of_vegetables_in_days',
    //         'safe_drinking_water_available',
    //         'provisioning_of_supplement',
    //         'availability_of_soap_and_other_consumables_in_days',
    //         'number_of_school_going_students',
    //         'number_of_students_linked_to_school',
    //         'per_of_students_linked_to_school',
    //         'number_of_children_identified_for_anganwadi',
    //         'number_of_children_linked_to_anganwadi',
    //         'per_of_children_linked_to_anganwadi',
    //         'number_of_pregnant_women',
    //         'number_of_pregnant_women_linked_to_health_facilities',
    //         'per_of_pregnant_women_linked_to_health_facilities',
    //         'number_of_specially_abled_person',
    //         'number_of_specially_abled_persons_linked_to_some_facility',
    //         'per_of_specially_abled_persons_linked',
    //         'number_of_children_separated_from_parents',
    //         'number_of_children_separated_from_parents_linked_to_social_welfare',
    //         'per_of_separated_children_linked',
    //         'date_of_visit_of_health',
    //         'date_of_visit_of_phed',
    //         'date_of_visit_of_social_welfare',
    //         'date_of_visit_of_caf_and_pd',
    //         'date_of_visit_of_education',
    //         'date_of_visit_of_power',
    //         'date_of_visit_of_mahud_or_ceo_adc'
    //     ];
    // }
    public function collection(Collection $relief_camp_facilities)
    {
        foreach($relief_camp_facilities as $key=>$relief_camp_facility){

            $relief_camp=$this->relief_camps->where('camp_code','=',$relief_camp_facility['camp_code'])->first();
            ReliefCampFacility::create([
                'number_of_persons'=>$relief_camp_facility['number_of_persons'],
                'number_of_rooms'=>$relief_camp_facility['number_of_rooms'],
                'number_of_halls'=>$relief_camp_facility['number_of_halls'],
                'separate_kitchen'=>strcasecmp($relief_camp_facility['separate_kitchen_available'],'yes')==0 ||strcasecmp($relief_camp_facility['separate_kitchen_available'],'y')==0 ?true:false,
                'open_space'=>strcasecmp($relief_camp_facility['open_space_available'],'yes')==0 ||strcasecmp($relief_camp_facility['open_space_available'],'y')==0 ?true:false,
                'water_tanks_capacity'=>$relief_camp_facility['water_tanks_capacity'],
                'water_avail_ratio'=>$relief_camp_facility['water_availability_ratio']=='#DIV/0!'?0.0:$relief_camp_facility['water_availability_ratio'],
                'number_of_toilets'=>$relief_camp_facility['number_of_toilets'],
                'toilet_ratio_per_person'=>$relief_camp_facility['toilet_ratio_per_persons']=='#DIV/0!'?0.0:$relief_camp_facility['toilet_ratio_per_persons'],
                'number_of_buckets'=>$relief_camp_facility['number_of_buckets'],
                'bucket_ratio_per_person'=>$relief_camp_facility['bucket_ratio_per_persons']=='#DIV/0!'?0.0:$relief_camp_facility['bucket_ratio_per_persons'],
                'number_of_mugs'=>$relief_camp_facility['number_of_mugs'],
                'mug_ratio_per_person'=>$relief_camp_facility['mug_ratio_per_persons']=='#DIV/0!'?0.0:$relief_camp_facility['mug_ratio_per_persons'],
                'sufficient_cooking_utensils'=>strcasecmp($relief_camp_facility['sufficient_cooking_utensils_available'],'yes')==0 ||strcasecmp($relief_camp_facility['sufficient_cooking_utensils_available'],'y')==0 ?true:false,
                'number_of_mattresses'=>$relief_camp_facility['number_of_mattresses'],
                'mattress_ratio_per_person'=>$relief_camp_facility['mattress_ratio_per_persons']=='#DIV/0!'?0.0:$relief_camp_facility['mattress_ratio_per_persons'],
                'number_of_bedsheets'=>$relief_camp_facility['number_of_bedsheets'],
                'bedsheet_ratio_per_person'=>$relief_camp_facility['bedsheet_ratio_per_persons']=='#DIV/0!'?0.0:$relief_camp_facility['bedsheet_ratio_per_persons'],
                'number_of_pillows'=>$relief_camp_facility['number_of_pillows'],
                'pillow_ratio_per_person'=>$relief_camp_facility['pillow_ratio_per_persons']=='#DIV/0!'?0.0:$relief_camp_facility['pillow_ratio_per_persons'],
                'number_of_blankets'=>$relief_camp_facility['number_of_blankets'],
                'blanket_ratio_per_person'=>$relief_camp_facility['blanket_ratio_per_persons']=='#DIV/0!'?0.0:$relief_camp_facility['blanket_ratio_per_persons'],
                'number_of_mosquitos'=>$relief_camp_facility['number_of_mosquito_nets'],
                'mosquito_ratio_per_person'=>$relief_camp_facility['mosquito_net_ratio_per_persons']=='#DIV/0!'?0.0:$relief_camp_facility['mosquito_net_ratio_per_persons'],
                'sufficient_lighting_facility'=>strcasecmp($relief_camp_facility['sufficient_lighting_facility_available'],'yes')==0 ||strcasecmp($relief_camp_facility['sufficient_lighting_facility_available'],'y')==0 ?true:false,
                'number_of_fans'=>$relief_camp_facility['number_of_fans'],
                'fans_ratio_per_person'=>$relief_camp_facility['fan_ratio_per_persons']=='#DIV/0!'?0.0:$relief_camp_facility['fan_ratio_per_persons'],
                'sufficient_plates_glasses'=>strcasecmp($relief_camp_facility['sufficient_plates_and_glasses_available'],'yes')==0 ||strcasecmp($relief_camp_facility['sufficient_plates_and_glasses_available'],'y')==0 ?true:false,
                'fuel_sources'=>$relief_camp_facility['fuel_source'],
                'availability_of_fuel_in_days'=>$relief_camp_facility['availability_of_fuel_in_days'],
                'availability_of_rice_in_days'=>$relief_camp_facility['availability_of_rice_in_days'],
                'availability_of_dal_in_days'=>$relief_camp_facility['availability_of_dal_in_days'],
                'availability_of_veg_in_days'=>$relief_camp_facility['availability_of_vegetables_in_days'],
                'safe_drinking_water'=>strcasecmp($relief_camp_facility['safe_drinking_water_available'],'yes')==0 ||strcasecmp($relief_camp_facility['safe_drinking_water_available'],'y')==0 ?true:false,
                'provisioning_of_supplement'=>strcasecmp($relief_camp_facility['provisioning_of_supplement'],'yes')==0 ||strcasecmp($relief_camp_facility['provisioning_of_supplement'],'y')==0 ?true:false,
                'availability_of_soap_consumable_in_days'=>$relief_camp_facility['availability_of_soap_and_other_consumables_in_days'],
                'number_of_school_going_students'=>$relief_camp_facility['number_of_school_going_students'],
                'number_of_students_linked_to_school'=>$relief_camp_facility['number_of_students_linked_to_school'],
                'per_of_students_linked_to_school'=>$relief_camp_facility['per_of_students_linked_to_school']=='#DIV/0!'?0.0:$relief_camp_facility['per_of_students_linked_to_school'],
                'number_of_child_identified_anganwadi'=>$relief_camp_facility['number_of_children_identified_for_anganwadi'],
                'number_of_child_linked_anganwadi'=>$relief_camp_facility['number_of_children_linked_to_anganwadi'],
                'per_child_linked_anganwadi'=>$relief_camp_facility['per_of_children_linked_to_anganwadi']=='#DIV/0!'?0.0:$relief_camp_facility['per_of_children_linked_to_anganwadi'],
                'number_of_pregnant_women'=>$relief_camp_facility['number_of_pregnant_women'],
                'number_of_pregnant_women_linked_health'=>$relief_camp_facility['number_of_pregnant_women_linked_to_health_facilities'],
                'per_of_pregnant_women_linked_health'=>$relief_camp_facility['per_of_pregnant_women_linked_to_health_facilities']=='#DIV/0!'?0.0:$relief_camp_facility['per_of_pregnant_women_linked_to_health_facilities'],
                'number_of_disabled_person'=>$relief_camp_facility['number_of_specially_abled_person'],
                'number_of_disabled_person_linked_facility'=>$relief_camp_facility['number_of_specially_abled_persons_linked_to_some_facility'],
                'per_of_disabled_person_linked_facility'=>$relief_camp_facility['per_of_specially_abled_persons_linked']=='#DIV/0!'?0.0:$relief_camp_facility['per_of_specially_abled_persons_linked'],
                'number_of_child_separated_parents'=>$relief_camp_facility['number_of_children_separated_from_parents'],
                'number_of_child_separated_parents_linked_sw'=>$relief_camp_facility['number_of_children_separated_from_parents_linked_to_social_welfare'],
                'per_of_child_separated_parents_linked_sw'=>$relief_camp_facility['per_of_separated_children_linked']=='#DIV/0!'?0.0:$relief_camp_facility['per_of_separated_children_linked'],
                'date_visit_of_health'=>str_replace('/','-',$relief_camp_facility['date_of_visit_of_health']),
                'date_visit_of_phed'=>str_replace('/','-',$relief_camp_facility['date_of_visit_of_phed']),
                'date_visit_of_social_welfare'=>str_replace('/','-',$relief_camp_facility['date_of_visit_of_social_welfare']),
                'date_visit_of_cafpd'=>str_replace('/','-',$relief_camp_facility['date_of_visit_of_caf_and_pd']),
                'date_visit_of_edu'=>str_replace('/','-',$relief_camp_facility['date_of_visit_of_education']),
                'date_visit_of_pow'=>str_replace('/','-',$relief_camp_facility['date_of_visit_of_power']),
                'date_visit_of_mahud_ceo_adc'=>str_replace('/','-',$relief_camp_facility['date_of_visit_of_mahud_or_ceo_adc']),
                'relief_camp_id'=>$relief_camp->id
            ]);
        }
    }
}
