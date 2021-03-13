<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
// use Illuminate\Support\Facades\File;
use App\Exports\AttendanceExport;
use App\Imports\AttendanceImport;
// use Maatwebsite\Excel\Facades\Excel;
use Auth;

class AttendanceController extends Controller
{
    public function importExportView()
    {
        // if(Auth::user()->announcement_admin)
        // {
            return view('attendance.index');   
        // }
    }
    
    public function exportExcel($type)
    {
        // if(Auth::user()->announcement_admin)
        // {
            return \Excel::download(new AttendanceExport, 'attendances.'.$type);
        // }
    }
    
    public function importExcel(Request $request)
    {
        // if(Auth::user()->announcement_admin)
        // {

            \Excel::import(new AttendanceImport, $request->import_file);
            
            \Session::put('success', 'Your file is imported successfully in database.');

            return back();
        // }
    }
}
