<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ReliefCampDemographyImport implements ToCollection
{

    private $family_head;

    private $relation;

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
            
            $this->address=Address::create([

                'address'=>$inmate['address']
            ]);

            $this->family_head=FamilyHead::create([

                'family_head_name'=>$inmate['family_head_name']
            ]);

            $this->relation=FamilyHeadRelation::where('family_head_relation','=',$inmate['relation'])->first();

            ReliefCampDemograpy::create([

                'person_name'=>$inmate['person_name'],
                'family_head_id'=>$this->family_head->id,
                'family_head_relation_id'=>$this->relation->id,
                'gender'=>$inmate['gender'],
                'age'=>$inmate['age'],
                'contact_number'=>$inmate['contact_number'],
                'physically_disabled'=>strcasecmp($inmate['any_special_condition'],'disabled')==0?true:false,
                'orphan'=>strcasecmp($inmate['any_special_condition'],'orphan')==0?true:false,
                'lactating'=>strcasecmp($inmate['any_special_condition'],'lactating')==0?true:false,
                'profession'=>$inmate['profession'],
                'willing_to_goback'=>strcasecmp($inmate['willing_to_goback'],'yes')==0?true:false,
                'remark'=>$inmate['remark'],
                'address_id'=>$this->address->id,
                'relief_camp_id'=>$this->relief_camp_id,
                'active_status'=>true
            ]);
        }
    }
}
