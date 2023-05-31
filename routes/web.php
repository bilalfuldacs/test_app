<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();
Route::get('/create_logs_form', [App\Http\Controllers\Time_LogController::class, 'index'])->name('time_logs_form');
Route::view('/time_logs_evaluation','Evaluation_report')->name('time_logs_evaluation');
Route::post('/save_time_logs', [App\Http\Controllers\Time_LogController::class, 'store'])->name('save_time_logs');
Route::get('/logs_display', [App\Http\Controllers\Time_LogController::class, 'view'])->name('logs_display');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Time_Logs_Edit/{id}', [App\Http\Controllers\Time_LogController::class, 'edit'])->name('Time_Logs_Edit');
Route::patch('/update_time_logs/{id}', [App\Http\Controllers\Time_LogController::class, 'update'])->name('update_time_logs');
Route::delete('/delete_time_log/{id}', [App\Http\Controllers\Time_LogController::class, 'destroy'])->name('delete_time_log');
Route::post('/Time_logs_evaluation_fetch', [App\Http\Controllers\Time_Log_EvaluationController::class, 'index'])->name('Time_logs_evaluation_fetch');