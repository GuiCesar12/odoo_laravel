<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ContractsController;

use function Laravel\Prompts\select;

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
Route::get('/logout',[LoginController::class,'logout'])->name('logout')->middleware('odoo');
///////////Invoices///////////////////
Route::prefix('invoices')->group(function(){
    Route::get('/',[InvoiceController::class,'index'])->name('invoices')->middleware('odoo');
    Route::get('/select',[InvoiceController::class,'select'])->name('selectInvoices')->middleware('odoo');
    Route::get('/download',[InvoiceController::class,'download'])->name('downloadInvoice')->middleware('odoo');
});
/////////Contracts///////////////////////////////////
Route::prefix('contracts')->group(function(){
    Route::get('/',[ContractsController::class,'index'])->name('contracts')->middleware('odoo');
    Route::get('/select',[ContractsController::class,'select'])->name('selectContracts');
    Route::post('/updatePayment',[ContractsController::class,'update'])->name('updatePayments');
    
});