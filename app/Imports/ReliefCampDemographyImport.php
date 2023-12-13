<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{ToCollection,WithHeadingRow, WithCalculatedFormulas};
use App\Models\{Address,FamilyHead,FamilyHeadRelation,ReliefCampDemography};

class ReliefCampDemographyImport implements ToCollection,WithHeadingRow, WithCalculatedFormulas
{

    private $family_head=null;

    private $relation=null;

    private $relief_camp_id;

    private $address;

    public function __construct($id){

        $this->relief_camp_id=$id;

    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $inmates_data)
    {
        foreach($inmates_data as $inmate){
            
            if(!empty($inmate['displaced_from_village'])||!empty($inmate['displaced_from_village'])){

                $this->address=Address::create([

                'address'=>$inmate['displaced_from_village'],
                'city'=>$inmate['displaced_from_district']
            ]);}

            if($inmate->contains('family_head_name')){
                $this->family_head=FamilyHead::create([

                    'family_head_name'=>$inmate['family_head_name']
                ]);
    
                $family_head_relation=FamilyHeadRelation::firstOrCreate(['family_head_relation'=>$request['relation']]);    
            }

            
            ReliefCampDemography::create([

                'person_name'=>$inmate['name_of_person'],
                'family_head_id'=>$this->family_head?$this->family_head->id:null,
                'family_head_relation_id'=>$this->relation?$this->relation->id:null,
                'gender'=>$inmate['gender'],
                'age'=>$inmate['age'],
                'contact_number'=>$inmate['contact_number'],
                'physically_disabled'=>strcasecmp($inmate['physically_disabled'],'yes')==0?true:false,
                'orphan'=>strcasecmp($inmate['orphan'],'yes')==0?true:false,
                'lactating'=>strcasecmp($inmate['lactating'],'yes')==0?true:false,
                'any_special_condition'=>$inmate['any_special_condition'],
                'profession'=>$inmate['profession'],
                'willing_to_goback'=>strcasecmp($inmate['willing_to_go_back_to_village'],'yes')==0?true:false,
                'remark'=>$inmate['remarks'],
                'address_id'=>$this->address->id,
                'relief_camp_id'=>$this->relief_camp_id,
                'active_status'=>true
            ]);
        }
    }
    
}