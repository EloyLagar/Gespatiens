<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\MidStayReportController;

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

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/generatePDF', function () {
    return view('reports.mid_stay_report');
});
Route::post('/reports/mid-stay-report', [MidStayReportController::class, 'createPDF'])->name('prueba.pdf');
Route::get('/users/evaluations', 'App\Http\Controllers\Users\EvaluationController@index');
