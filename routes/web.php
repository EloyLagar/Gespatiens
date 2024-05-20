<?php

use App\Http\Controllers\UserController;
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
Route::middleware(['auth'])->group(function (){
    Route::post('/users/create-password', [LoginController::class, 'updatePassword'])->name('updatePassword');
    Route::resource('users', UserController::class)->only('edit');
});

Route::middleware(['admin'])->group(function (){
    Route::resource('users', UserController::class)->only('create', 'store', 'index');
});

Route::get('/generatePDF', function () {
    return view('reports.mid_stay_report');
});
Route::post('/reports/mid-stay-report', [MidStayReportController::class, 'createPDF'])->name('prueba.pdf');
Route::get('/users/evaluations', 'App\Http\Controllers\Users\EvaluationController@index');
