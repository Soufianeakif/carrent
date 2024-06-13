<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentController;

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

Route::get('/', [CarController::class, 'indexGeneral'])->name('home');

Route::get('/rentclient/{car}', [RentController::class, 'showForm'])->name('rentclient.show');
Route::post('/rentclient/{car}', [RentController::class, 'submitForm'])->name('rentclient.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('cars', CarController::class);
    Route::get('/rent', [RentController::class, 'index'])->name('rents.index'); // Show all rents
    Route::get('/rent/create', [RentController::class, 'create'])->name('rents.create'); // Show form to create a new rent
    Route::post('/rent', [RentController::class, 'store'])->name('rents.store'); // Store new rent request
    Route::post('/rents/{rent}/approve', [RentController::class, 'approve'])->name('rents.approve'); // Approve rent request
    Route::post('/rents/{rent}/deny', [RentController::class, 'deny'])->name('rents.deny'); // Deny rent request
    Route::get('/rent/create', [RentController::class, 'create'])->name('rent.create'); // Corrected route name
    Route::post('/rents', [RentController::class, 'store'])->name('rent.store');


});

require __DIR__.'/auth.php';
