<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReliefCampImport implements ToCollection, WithHeadingRow
{

    private $subdivision_id;
    private $nodal_officers;

    public function __construct($id){
        $this->subdivision_id=$id;
        $this->nodal_officers=NodalOfficer::get();
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $relief_camps)
    {
        //

        foreach($relief_camps as $relief_camp){
            $address=Address::create([
                'address'=>$relief_camp['location'],
            ]);

            ReliefCamp::create([
                'relief_camp_name'=>$relief_camp['name'],
                'camp_code'=>$relief_camp['camp_code'],
                'address_id'=>$address->id,
                'sub_division_id'=>$this->subdivision_id, 
                'nodal_officer_id'=>
            ])
        }
    }
}
