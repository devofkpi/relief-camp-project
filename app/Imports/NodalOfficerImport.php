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
    public function model(array $row)
    {
        return new NodalOfficer([
            'officer_name'=>$row['name'],
            'officer_designation'=>$row['designation'],
            'officer_contact'=>$row['contact']
        ]);
    }
}
