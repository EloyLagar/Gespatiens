<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\MidStayReportController;
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
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/verify', [LoginController::class, 'verify'])->name('verify');


//Auth routes-----------------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::post('language', [LanguageController::class, 'change'])->name('language.change');
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations');
    Route::post('/users/create-password', [LoginController::class, 'updatePassword'])->name('updatePassword');
    Route::get('/residents', [PatientController::class, 'indexResidents'])->name('indexResidents');
    Route::post('/users/evaluations/save', 'App\Http\Controllers\EvaluationController@saveEvaluation')->name('evaluations.save_evaluation');
    Route::get('/users/evaluations', 'App\Http\Controllers\EvaluationController@indexForm')->name('evaluations.indexForm');
    Route::post('/users/evaluations', 'App\Http\Controllers\EvaluationController@index')->name('evaluations.index');
    Route::resource('patients', PatientController::class)->only('index');
    Route::get('/profile', [UserController::class, 'redirecToEdit'])->name('redirecToEdit');
    Route::resource('users', UserController::class)->only('edit', 'update');
});

Route::middleware(['admin'])->group(function () {
    Route::resource('users', UserController::class)->only('create', 'store', 'index');
    Route::resource('patients', PatientController::class)->only('create', 'store', 'edit', 'update');
});


Route::get('/generatePDF', function () {
    return view('reports.mid_stay_report');
});
Route::post('/reports/mid-stay-report', [MidStayReportController::class, 'createPDF'])->name('prueba.pdf');
