<?php

namespace App\Imports;

use App\Models\NodalOfficer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NodalOfficerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $nodal_officer)
    {
        return new NodalOfficer([
            'officer_name'=>$nodal_officer['name'],
            'officer_designation'=>$nodal_officer['designation'],
            'officer_contact'=>$nodal_officer['contact']
        ]);
    }
}
