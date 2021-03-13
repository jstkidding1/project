<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Attendance::all();
    }

    public function headings(): array
    {
        return [
            'NAME',
            'ARRIVAL_DATE',
            'ARRIVAL_TIME',
            'DEPARTURE_DATE',
            'DEPARTURE_TIME',
            'TOTAL',
        ];
    }

    public function map($attendance): array
    {
        return [
            $attendance->NAME,
            $attendance->ARRIVAL_DATE,
            $attendance->ARRIVAL_TIME,
            $attendance->DEPARTURE_DATE,
            $attendance->DEPARTURE_TIME,
            $attendance->TOTAL,
        ];
    }
}
