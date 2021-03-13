<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PoliceController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
// use App\Http\Controllers\ExcelController;
// use App\Http\Controllers\AttendanceExportController;
// use App\Http\Controllers\AttendanceImportController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\WantedPersonController;
use App\Http\Controllers\MissingPersonController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// LOGIN FORM
// Route::get('login', [HomeController:: class, 'showLogin']);
// Route::post('login', [HomeController:: class, 'doLogin']);


// EXCEL ROUTES 
// Route::get('importExportView', [AttendanceController:: class, 'importExportView']);
// Route::get('export', [AttendanceController::class, 'export'])->name('attendance.export');
// Route::post('import', [AttendanceController::class, 'import'])->name('attendance.import');
Route::get('importExportView', [AttendanceController::class, 'importExportView'])->name('importExportView');
Route::get('exportExcel/{type}', [AttendanceController::class, 'exportExcel'])->name('exportExcel');
Route::post('importExcel', [AttendanceController::class, 'importExcel'])->name('importExcel');
// LANDING PAGE

Route::get('/', function () {
    return view('welcome');
});

// AUTHENTICATE ROUTES
Auth::routes();


// GUEST ROUTES
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');

// ADMINS WITH DIFFERENT ROUTES DIRECTORY

Route::get('announcement/admin', [HomeController::class, 'announcementDashboard'])->name('announcement.index')->middleware('announcement_admin');
Route::get('attendance/admin', [HomeController::class, 'attendanceDashboard'])->name('attendance.index')->middleware('attendance_admin');
Route::get('report/admin', [HomeController::class, 'reportDashboard'])->name('report.index')->middleware('report_admin');

// Route::get('changeStatus', [IncidentController::class, 'changeStatus']);


// ROUTE RESOURCES
Route::resource('announcement', AnnouncementController::class);
Route::resource('police', PoliceController::class);
Route::resource('incident', IncidentController::class);
Route::resource('crime', CrimeController::class);
Route::resource('report', ReportController::class);
Route::resource('dashboard', DashboardController::class);
Route::resource('wanted', WantedPersonController::class);
Route::resource('missing', MissingPersonController::class);


