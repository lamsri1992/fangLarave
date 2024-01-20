<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderController;
use App\Http\Controllers\dataController;

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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Coding
Route::get('/dashboard', [orderController::class, 'index'])->middleware(['auth', 'verified'])->name('order.all');
Route::post('/create', [orderController::class, 'create'])->name('order.create');
Route::post('/update', [orderController::class, 'update'])->name('order.update');
Route::get('/confirm/{id}', [orderController::class, 'confirm'])->name('order.confirm');
Route::get('/success/{id}', [orderController::class, 'success'])->name('order.success');
//

Route::get('/user/create', function () {
    return view('users.register');
});

Route::get('/department', [dataController::class, 'departmentList'])->name('department');
Route::post('/department/create', [dataController::class, 'departmentCreate'])->name('department.create');
Route::get('/department/edit/{id}', [dataController::class, 'departmentEdit'])->name('department.edit');
Route::post('/department/update/{id}', [dataController::class, 'departmentUpdate'])->name('department.update');
Route::post('/department/delete', [dataController::class, 'departmentDelete'])->name('department.delete');
Route::get('/officer', [dataController::class, 'officerList'])->name('officer');
// php artisan make:controller dataController
// 1 click open 
// 2 edit data
// 3 update data