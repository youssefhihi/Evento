<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
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

Route::get('/dashboar', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('organizer.dashboard');
})->middleware(['auth', 'role:organizer'])->name('organizer');

Route::get('/', function () {
    return view('client.home');
})->middleware(['auth', 'role:client'])->name('client');

Route::get('/events', function () {
    return view('admin.event');
})->middleware(['auth', 'role:admin'])->name('event');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('/admin/category', CategoryController::class);
    Route::put('/admin/category/ff', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/ban-user', [AdminController::class, 'banUser'])->name('admin.banUser');
    Route::put('/admin/unban-user', [AdminController::class, 'unbanUser'])->name('admin.unbanUser');



});

require __DIR__.'/auth.php';
