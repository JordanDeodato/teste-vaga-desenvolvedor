<?php

use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index', [SaleController::class, 'index']);
Route::get('/create', [SaleController::class, 'create']);
Route::post('/sales', [SaleController::class, 'store']);
Route::delete('/sales/{id}', [SaleController::class, 'destroy']);
Route::get('/sales/edit/{id}', [SaleController::class, 'edit']);
Route::put('/sales/update/{id}', [SaleController::class, 'update']);

## AUTH
Route::get('/auth/register', function(){
    return view('auth.register');
});
Route::get('/auth/login', function(){
    return view('auth.login');
});
Route::get('/', function(){
    return view('auth.home');
});