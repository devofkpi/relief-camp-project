<?php

namespace App\Exports;

use App\Models\NodalOfficer;
use Maatwebsite\Excel\Concerns\FromCollection;

class NodalOfficersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NodalOfficer::all();
    }
}
