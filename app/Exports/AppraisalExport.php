<?php

namespace App\Exports;

use App\Models\BusinessAppraisal;
use Maatwebsite\Excel\Concerns\FromCollection;

class AppraisalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BusinessAppraisal::all();
    }
}
