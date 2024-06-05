<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Final_reportController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\OutingsController;
use App\Http\Controllers\ReductionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\Therapeutic_groupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WalkController;
use App\Models\Therapeutic_group;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mid_stay_reportController;
use App\Http\Controllers\LoginController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.app');
// });



// Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/verify', [LoginController::class, 'verify'])->name('verify');


//Auth routes-----------------------------------------------------------------

Route::middleware(['auth'])->group(function () {

    //Reportes
    Route::get('mid_stay_form/{patient}', 'App\Http\Controllers\ReportController@mid_stay_report_form')->name('reports.mid_stay_report_form');
    Route::get('final_report_form/{patient}', 'App\Http\Controllers\ReportController@final_report_form')->name('reports.final_report_form');

    Route::resource('/reports', 'App\Http\Controllers\ReportController')->only('index', 'edit');
    Route::resource('final_reports', 'App\Http\Controllers\Final_reportController')->only('update');
    Route::resource('mid_stay_reports', 'App\Http\Controllers\Mid_stay_reportController')->only('update');

    Route::get('/final_report/preview/{finalReport}', 'App\Http\Controllers\Final_reportController@preview')->name('reports.finalReport_preview');
    Route::get('/final_report/download/{finalReport}', 'App\Http\Controllers\Final_reportController@download')->name('reports.finalReport_download');
    Route::get('/mid_report/preview/{midStayReport}', 'App\Http\Controllers\Mid_stay_reportController@preview')->name('reports.midStayReport_preview');
    Route::get('/mid_report/download/{midStayReport}', 'App\Http\Controllers\Mid_stay_reportController@download')->name('reports.midStayReport_download');
    Route::post('/report/close', 'App\Http\Controllers\ReportController@setStateFalse')->name('report.close');

    //Diario
    Route::get('/diary/form', 'App\Http\Controllers\DiaryController@diaryForm')->name('diary.diaryForm');
    Route::match(['get', 'post'], '/diary/{date?}', 'App\Http\Controllers\DiaryController@showPage')->name('diary.showPage');

    //Turnos
    Route::resource('shifts', ShiftController::class)->only(['edit', 'update']);

    //Idioma
    Route::post('language', [LanguageController::class, 'change'])->name('language.change');

    //Ruta de cración de contraeña por parte del empleado
    Route::post('/users/create-password', [LoginController::class, 'updatePassword'])->name('updatePassword');

    //Actividades
    Route::get('activities/{activity}/attendance', [ActivityController::class, 'edit_attendance'])->name('activities.edit_attendance');
    Route::put('activities/updateAttendance/{activity}', [ActivityController::class, 'updateAttendance'])->name('activities.updateAttendance');
    Route::resource('activities', ActivityController::class)->only(['index', 'create', 'edit', 'update']);
    Route::resource('lessons', LessonController::class)->only('store');
    Route::resource('sports', SportController::class)->only('store');
    Route::resource('therapeutic_groups', Therapeutic_groupController::class)->only('store');
    Route::resource('walks', WalkController::class)->only('store');
    Route::post('/activity/close', 'App\Http\Controllers\ActivityController@setStateFalse')->name('activity.close');

    //Salidas
    Route::get('outings/create/{date}', [OutingsController::class, 'create'])->name('outings.create');
    Route::resource('outings', OutingsController::class)->only(['edit', 'update', 'store']);

    //Intervenciones
    Route::get('interventions/create/{date}', [InterventionController::class, 'create'])->name('interventions.create');
    Route::resource('interventions', InterventionController::class)->only('store');


    //Rebajas
    Route::get('reductions/create/{date}', [ReductionController::class, 'create'])->name('reductions.create');
    Route::resource('reductions', ReductionController::class)->only(['store', 'edit', 'update']);

    //Patients
    Route::post('/patients/update/visitors', [PatientController::class, 'updateVisitors'])->name('patients.updateVisitors');
    Route::get('/patients/visitors', [PatientController::class, 'visitorsForm'])->name('patients.manageVisitors');
    Route::get('/residents', [PatientController::class, 'indexResidents'])->name('indexResidents');
    Route::get('/patients/unsuscribe/{patient}', [PatientController::class, 'unsuscribe'])->name('patients.unsuscribe');
    Route::get('/patients/register/{patient}', [PatientController::class, 'register'])->name('patients.register');
    Route::post('/patients/update_tutors/{patient}', [PatientController::class, 'updateTutors'])->name('patients.updateTutors');
    Route::resource('patients', PatientController::class)->only('index', 'edit');

    //Evaluaciones
    Route::get('/evaluations/form', 'App\Http\Controllers\EvaluationController@indexForm')->name('evaluations.indexForm');
    Route::post('/evaluations/save_mark', 'App\Http\Controllers\EvaluationController@saveEvaluation')->name('evaluations.save_evaluation');
    Route::post('/evaluations', 'App\Http\Controllers\EvaluationController@index')->name('evaluations.index');

    //Como no entra el Auth::user() en adminlte.php para ir al perfil pues se hace así ->
    Route::get('/profile', [UserController::class, 'redirectToEdit'])->name('redirectToEdit');
    Route::resource('users', UserController::class)->only('edit', 'update');

    //Avisos
    Route::resource('notices', NoticeController::class)->only('edit', 'update', 'create', 'store', 'destroy');
});

Route::middleware(['admin'])->group(function () {
    Route::resource('users', UserController::class)->only('create', 'store', 'index');
    Route::resource('patients', PatientController::class)->only('create', 'store', 'update');
});
