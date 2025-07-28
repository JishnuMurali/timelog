<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TimeLogController;
use App\Http\Controllers\LeaveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Breeze Auth Routes (Login, Register, Logout)
require __DIR__.'/auth.php';

// Authenticated routes only
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Time Logs
    Route::get('/timelogs', [TimeLogController::class, 'index'])->name('timelogs.index');
    Route::get('/timelogs/create', [TimeLogController::class, 'create'])->name('timelogs.create');
    Route::post('/timelogs', [TimeLogController::class, 'store'])->name('timelogs.store');
    Route::get('/timelogs/{id}/edit', [TimeLogController::class, 'edit'])->name('timelogs.edit');
    Route::put('/timelogs/{id}', [TimeLogController::class, 'update'])->name('timelogs.update');

    // Leaves
    Route::get('/leaves', [LeaveController::class, 'index'])->name('leaves.index');
    Route::get('/leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
    Route::post('/leaves', [LeaveController::class, 'store'])->name('leaves.store');

});
