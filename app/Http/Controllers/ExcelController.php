<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OfficerImport;
use App\Exports\OfficerExport;
// use App\Models\User;
use App\Models\Attendance;
use Auth;

class ExcelController extends Controller
{
    public function importExportView()
    {
        if(Auth::user()->attendance_admin)
        {
            return view('attendance.index');
        }
    }

    public function exportExcel($type)
    {
        if(Auth::user()->attendance_admin)
        {
            return \Excel::download(new OfficerMultiSheetExport(2021), 'attendances.'.$type);
        }
    }

    public function importExcel(Request $request)
    {
        if(Auth::user()->attendance_admin)
        {
            \Excel::import(new OfficerImport, $request->import_file);

            \Session::put('success', 'Your file is imported in database.');

            return back();
        }
    }
}
