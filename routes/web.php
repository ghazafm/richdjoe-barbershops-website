<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserBookController;
use App\Http\Controllers\Malicious\MaliciousController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Malicious
Route::get('/malicious', [MaliciousController::class,'index']);

//User Book
Route::get('/book', [UserBookController::class,'index'])->middleware('auth', 'verified');
Route::get('/book/service/{place}', [UserBookController::class,'services'])->middleware('auth', 'verified');


//Admin
Route::get('/admin/dashboard', [AdminController::class,'index'])->middleware(['auth', 'admin']);

