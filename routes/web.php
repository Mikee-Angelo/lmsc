<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenaltyController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::controller(BookController::class)->prefix('books')->group(function() { 
        Route::get('/', 'show')->name('books.show');
    });

    Route::controller(UserController::class)->prefix('users')->group(function() { 
        Route::get('/', 'show')->name('users.show');
    });

    Route::controller(PenaltyController::class)->prefix('penalties')->group(function() { 
        Route::get('/', 'show')->name('penalty.show');
    });
});

require __DIR__.'/auth.php';
