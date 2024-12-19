<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComponentTestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:owners', 'verified'])->name('dashboard');

Route::middleware('auth:owners')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('component-test1', [ComponentTestController::class, 'showComponent1'])
    ->name('tests.showComponent1');

Route::get('component-test2', [ComponentTestController::class, 'showComponent2'])
    ->name('tests.showComponent2');

require __DIR__ . '/ownerAuth.php';
