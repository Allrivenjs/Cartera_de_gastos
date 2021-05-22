<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseReportController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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



Route::resource('expense_reports',ExpenseReportController::class);
Route::resource('expense_reports/expenses',ExpenseController::class);



Route::get('expense_reports/{id}/delete',[ExpenseReportController::class,'destroy']);
Route::get('expense_reports/{id}/restore',[ExpenseReportController::class,'restore']);
Route::get('expense_reports/{id}/confirmDelete',[ExpenseReportController::class,'confirmDelete']);

Route::get('expense_reports/{id}/confirmSendEmail',[ExpenseReportController::class,'confirmSendEmail']);
Route::post('expense_reports/{id}/SendEmail',[ExpenseReportController::class,'SendEmail']);

Route::get('expense_reports/{expense_report}/expenses/create',[ExpenseController::class,'create']);
Route::post('expense_reports/{expense_report}/expenses',[ExpenseController::class,'store']);

Route::get('expense_reports/{expense_report}/expenses/edit',[ExpenseController::class,'edit']);
Route::put('expense_reports/{expense_report}/expenses',[ExpenseController::class,'update']);

Route::get('expense_reports/expenses/{expense_report}/delete',[ExpenseController::class,'destroy']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

