<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReliefCampFacilitiesImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public function __counstruct($id){

        $this->relief_camp_id=$id;
    }

    public function collection(Collection $relief_camp_facilities)
    {
        foreach($relief_camp_facilities as $relief_camp_facility){

            ReliefCampFacility::create([
                'building_type'=>$relief_camp_facility['building_type'],
                'number_of_persons'=>$relief_camp_facility['number_of_persons'],
                'number_of_rooms'=>$relief_camp_facility['number_of_rooms'],
                'number_of_halls'=>$relief_camp_facility['number_of_halls'],
                'number_of_toilets'=>$relief_camp_facility['number_of_toilets'],
                'number_of_persons_utilising_toilets'=>$relief_camp_facility['number_of_persons_utilising_toilets'],
                'number_of_persons_staying_at_night'=>$relief_camp_facility['number_of_persons_staying_at_night'],
                'number_of_mattresses'=>$relief_camp_facility['number_of_mattresses'],
                'number_of_badsheets'=>$relief_camp_facility['number_of_badsheets'],
                'number_of_blankets'=>$relief_camp_facility['number_of_blankets'],
                'number_of_mosquito'=>$relief_camp_facility['number_of_mosquito'],
                'number_of_fans'=>$relief_camp_facility['number_of_fans'],
                'availability_of_food_grains_in_days'=>$relief_camp_facility['availability_of_food_grains_in_days'],
                'availability_of_veg_in_days'=>$relief_camp_facility['availability_of_veg_in_days'],
                'safe_drinking_water'=>$relief_camp_facility['safe_drinking_water']=='yes'?true:false,
                'provisioning_of_supplement'=>$relief_camp_facility['provisioning_of_supplement']=='yes'?true:false,
                'relief_camp_id'=>$this->relief_camp_id
            ]);
        }
    }
}
