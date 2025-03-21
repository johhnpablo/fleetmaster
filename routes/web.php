<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles');
    Route::get('vehicles/vehicle/{id}', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::get('vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
