<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

      Route::resource('workspaces', WorkspaceController::class);
    
    Route::prefix('workspaces/{workspace}')->group(function () {
        Route::resource('tasks', TaskController::class)->except(['index']);
        Route::get('tasks', [TaskController::class, 'index'])->name('workspaces.tasks.index');
    });
});

Route::middleware('auth')->group(function () {
  
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
