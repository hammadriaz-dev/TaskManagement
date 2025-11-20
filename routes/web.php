<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if($user->hasRole('admin')){
        return redirect()->route('admin.dashboard');
    }

    if($user->hasRole('user')){
        return redirect()->route('user.dashboard');
    }

    abort(403, 'No role assigned to this user.');

})->middleware(['auth', 'verified'])->name('dashboard');

// ADMIN ROUTE
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');
});

// USER ROUTE
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'user'])->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
