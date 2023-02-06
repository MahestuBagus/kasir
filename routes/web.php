<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\itemsController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PDFController;
use App\Models\transaction;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/edit', function () {
    return view('editItem');
});




Auth::routes();

// Route::get('Home/{id}/destroy', [HomeController::class, 'destroy'])->name('admin.destroy');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('history',[TransactionController::class , 'history']);
// Route::get('transactiondetails',[TransactionController::class , 'transactiondetails']);

Route::resource('transaction', TransactionController::class); 
Route::post('transaction/checkout', [TransactionController::class, 'checkout'])->name('transaction.checkout'); 
Route::get('history', [TransactionController::class, 'history'])->name('history'); 

Route::resource('home', homeController::class);
Route::resource('item', itemsController::class);
Route::get('items/{id}/hapus', [itemsController::class, 'hapus'])->name('item.hapus');
// Route::resource('transaction', TransactionController::class);
Route::resource('category', CategoryController::class);
Route::get('category/{id}/hapus', [CategoryController::class, 'hapus'])->name('category.hapus');
// Route::get('/pegawai/cetak_pdf', PDFController::class);
