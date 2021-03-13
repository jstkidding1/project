<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendanceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Attendance([
            'NAME' => $row[0],
            'ARRIVAL_DATE' => $row[1],
            'ARRIVAL_TIME' => $row[2],
            'DEPARTURE_DATE' => $row[3],
            'DEPARTURE_TIME' => $row[4],
            'TOTAL' => $row[5],
        ]);
    }
}
