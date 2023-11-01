<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InvoiceController;
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
    return view('index.index');
})->name('index')->middleware('odoo');



Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/validate',[LoginController::class,'login'])->name('login_validate');

///////////Invoices///////////////////
Route::prefix('invoices')->group(function(){
    Route::get('/',[InvoiceController::class,'index'])->name('invoices')->middleware('odoo');
    Route::get('/select',[InvoiceController::class,'select'])->name('selectInvoices')->middleware('odoo');
});

