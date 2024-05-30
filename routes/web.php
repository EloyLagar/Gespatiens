<?php

use App\Http\Controllers\Final_reportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\LanguageController;
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
Route::get('mid_stay_form/{patient}', 'App\Http\Controllers\ReportController@mid_stay_report_form')->name('reports.mid_stay_report_form');
Route::get('final_report_form/{patient}', 'App\Http\Controllers\ReportController@final_report_form')->name('reports.final_report_form');

// Route::put('/mid_stay_reports/{report}', 'App\Http\Controllers\Mid_stay_reportController@update')->name('mid_stay_reports.update');
// Route::put('/final_reports/{report}', 'App\Http\Controllers\Final_reportController@update')->name('final_reports.update');
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
    Route::post('/diary', 'App\Http\Controllers\DiaryController@showPage')->name('diary.showPage');

    //Idioma
    Route::post('language', [LanguageController::class, 'change'])->name('language.change');

    //Ruta de cración de contraeña por parte del empleado
    Route::post('/users/create-password', [LoginController::class, 'updatePassword'])->name('updatePassword');

    //Index solo de residents
    Route::get('/residents', [PatientController::class, 'indexResidents'])->name('indexResidents');
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
