<?php

namespace App\Exports;

use App\Models\Aktivitas;
use Maatwebsite\Excel\Concerns\FromCollection;

class AktivitasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Aktivitas::all();
    }
}
