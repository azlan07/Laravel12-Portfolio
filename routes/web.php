<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Resource Routes
Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource("blog", BlogController::class);
});

//Resource Routes
Route::resource('project', projectController::class);
Route::get('/project/{project}', [HomeController::class, 'show'])->name('project.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
