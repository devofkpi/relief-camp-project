<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{ToCollection,WithCalculatedFormulas,WithHeadingRow};;
use App\Models\{ReliefCampDemography,Address,FamilyHead,FamilyHeadRelation};

class ReliefCampDemographyImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
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
                    'city'=>$inmate['displaced_from_village']
                ]);
            }
            
            if(!empty($inmate['family_head_name'])){
                $this->family_head=FamilyHead::create([

                    'family_head_name'=>$inmate['family_head_name']
                ]);

                $this->relation=FamilyHeadRelation::where('family_head_relation','=',$inmate['relation'])->first();
            }


            ReliefCampDemography::create([

                'person_name'=>$inmate['name_of_person'],
                'family_head_id'=>$this->family_head==null?null:$this->family_head->id,
                'family_head_relation_id'=>$this->relation==null?null:$this->relation->id,
                'gender'=>$inmate['gender'],
                'age'=>$inmate['age'],
                'contact_number'=>$inmate['contact_number'],
                'physically_disabled'=>strcasecmp($inmate['any_special_condition'],'disabled')==0?true:false,
                'orphan'=>strcasecmp($inmate['any_special_condition'],'orphan')==0?true:false,
                'lactating'=>strcasecmp($inmate['any_special_condition'],'lactating')==0?true:false,
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
