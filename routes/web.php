<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenaltyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LibraryCardController;
use App\Http\Controllers\ReportController;
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
    
    Route::controller(RoleController::class)->prefix('role')->group(function() { 
        Route::get('/', 'show')->name('role.show');
    });

    Route::controller(StudentController::class)->prefix('student')->group(function() { 
        Route::get('/', 'show')->name('student.show');
    });

    Route::controller(AuthorController::class)->prefix('authors')->group(function() { 
        Route::get('/', 'show')->name('authors.show');
    });

    Route::get('/student/{student_id}/lc/generate', [LibraryCardController::class, 'show'])->name('lc.show');

    Route::get('/reports', [ReportController::class, 'show'])->name('reports.show');

});

require __DIR__.'/auth.php';
