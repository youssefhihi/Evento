<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ReservationController;
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
    return view('client.tickets');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/events', function () {
    return view('admin.event');
})->middleware(['auth', 'role:admin'])->name('event');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
  
    Route::delete('/admin/{event}', [EventController::class, 'destroy'])->name('event.destroyA');
    Route::resource('/admin/category', CategoryController::class);
    Route::put('/admin/category/ff', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/ban-user', [AdminController::class, 'banUser'])->name('admin.banUser');
    Route::put('/admin/unban-user', [AdminController::class, 'unbanUser'])->name('admin.unbanUser');
    Route::get('/admin/approve-event',[AdminController::class,'approveEvents'])->name('approveEvent');
    Route::get('/admin/single-event/{event}',[AdminController::class,'eventPage'])->name('eventPage');
    Route::put('/admin/accept-event/{event}',[AdminController::class,'acceptEvent'])->name('acceptEvent');

});
Route::middleware(['auth', 'role:organizer'])->group(function () {
    Route::get('/dashboard',[OrganizerController::class,'index'])->name('organizer');
    Route::get('/dashbord/events',[EventController::class,'index'])->name('event.index');
    Route::get('/dashbord/event-not-approved',[EventController::class,'eventNotApproved'])->name('eventNotApproved'); 
    Route::put('/dashboard/reservations/{reservation}',[ReservationController::class,'update'])->name('reservation.update');
    Route::resource('dashboard/event', EventController::class);
    Route::resource('dashboard/reservation', ReservationController::class);
    Route::get('/dashbord/single-event/{event}',[OrganizerController::class,'eventPage'])->name('eventPage');
});



Route::get('/',[ClientController::class,'index'])->name('client');

Route::middleware(['auth', 'role:client'])->group(function () {
    
    Route::get('/home/search',[ClientController::class,'index'])->name('event.search');
    Route::get('/home/filter',[ClientController::class,'index'])->name('event.filter');
    Route::get('/event-page/{event}',[ClientController::class,'eventPage'])->name('eventPage.show');
    Route::post('/reserve/{event}',[ReservationController::class,'store'])->name('reservation.store');
    Route::get('/home/events-tickets',[ClientController::class,'tickets'])->name('tickets');
});
require __DIR__.'/auth.php';
