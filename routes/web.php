<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PDFController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\AdminController;

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
})->middleware('guest');


// Auth Routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

Route::get('/edit-profile', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('profile');

Route::post('/update-profile', [App\Http\Controllers\HomeController::class, 'update_profile'])->name('profile');

Route::get('/edit-password', [App\Http\Controllers\HomeController::class, 'edit_password'])->name('profile');

Route::post('/update-password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('profile');



//Admin Routes
Route::get('/packages', [AdminController::class, 'index'])->name('packages');

Route::post('/add-packages', [AdminController::class, 'store'])->name('packages');

Route::get('/detail-packages-{slug}', [AdminController::class, 'show'])->name('packages');

Route::get('/edit-packages-{slug}', [AdminController::class, 'edit'])->name('packages');

Route::post('/update-packages', [AdminController::class, 'update'])->name('packages');

Route::post('/delete-packages-{slug}', [AdminController::class, 'destroy'])->name('packages');

Route::get('/sales-data', [AdminController::class, 'sales_data'])->name('sales');

Route::post('/add-sales', [AdminController::class, 'add_sales'])->name('sales');

Route::get('/report', [AdminController::class, 'report'])->name('report');

Route::get('/print', [PDFController::class, 'createPDF']);



//Sales Routes
Route::get('/customers', [SalesController::class, 'index'])->name('customer');

Route::post('/add-customers', [SalesController::class, 'store'])->name('customer');

Route::get('/detail-customers-{slug}', [SalesController::class, 'show'])->name('customer');

Route::get('/edit-customers-{slug}', [SalesController::class, 'edit'])->name('customer');

Route::post('/update-customers', [SalesController::class, 'update'])->name('customer');

Route::post('/delete-customers-{slug}', [SalesController::class, 'destroy'])->name('customer');


