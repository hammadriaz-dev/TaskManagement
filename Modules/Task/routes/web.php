<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\Http\Controllers\TaskController;
use Modules\Task\Http\Controllers\UserTaskController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('tasks', TaskController::class);
});

Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/task', [UserTaskController::class, 'index'])->name('tasks.index');
    Route::get('task/{task}', [UserTaskController::class, 'show'])->name('tasks.show');

    
    Route::get('/tasks/{task}/status', [UserTaskController::class, 'editStatus'])->name('tasks.status.edit');
    Route::patch('/tasks/{task}/status', [UserTaskController::class, 'updateStatus'])->name('tasks.status.update');

    Route::get('/tasks/{task}/comment', [UserTaskController::class, 'createComment'])->name('tasks.comment.create');
    Route::post('/tasks/{task}/comment', [UserTaskController::class, 'comment'])->name('tasks.comment.store');
});