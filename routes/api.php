<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SalesAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Sales
Route::get('/customers', [SalesAPIController::class, 'index']);

// Route::post('/add-customers', [SalesController::class, 'store'])->name('customer');

// Route::get('/detail-customers-{slug}', [SalesController::class, 'show'])->name('customer');

// Route::get('/edit-customers-{slug}', [SalesController::class, 'edit'])->name('customer');

// Route::post('/update-customers', [SalesController::class, 'update'])->name('customer');

// Route::post('/delete-customers-{slug}', [SalesController::class, 'destroy'])->name('customer');
