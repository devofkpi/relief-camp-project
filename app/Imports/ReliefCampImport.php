<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\{NodalOfficer,SubDivision,Address,ReliefCamp};

class ReliefCampImport implements ToCollection, WithHeadingRow
{

    private $nodal_officers;
    private $subdivisions;

    public function __construct(){
        
        $this->nodal_officers=NodalOfficer::select('id','officer_name')->get();
        $this->subdivisions=SubDivision::select('id','sub_division_code')->get();
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

            $str=explode("-", $relief_camp['camp_code'], 3);
            $subdivision_code=$str[0]."-".$str[1];
            $subdivision=$this->subdivisions->where('sub_division_code','=',$subdivision_code)->first();
            $nodal_officer=$this->nodal_officers->where('officer_name','LIKE',$relief_camp['nodal_officer'])->first();

            ReliefCamp::create([
                'relief_camp_name'=>$relief_camp['name_of_the_camp'],
                'camp_code'=>$relief_camp['camp_code'],
                'address_id'=>$address->id,
                'sub_division_id'=>$subdivision->id, 
                'nodal_officer_id'=>$nodal_officer->id?$nodal_officer->id:null,
            ]);
        }
    }
}
