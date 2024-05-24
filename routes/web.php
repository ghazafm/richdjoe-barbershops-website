<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminKapsterController;
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

require __DIR__ . '/auth.php';

//Malicious
Route::get('/malicious', [MaliciousController::class, 'index']);

//User Book
Route::get('/book', [UserBookController::class,'index'])->middleware('auth', 'verified');
Route::get('/book/service/{place}', [UserBookController::class,'services'])->middleware('auth', 'verified');
Route::get('/book/service/haircut/{place}', [UserBookController::class,'haircut'])->middleware('auth', 'verified');
Route::get('/book/service/haircut/kapster/{place}/{service}', [UserBookController::class,'kapsters'])->middleware('auth', 'verified');
Route::get('/book/service/haircut/profil_kapster/{kapster}', [UserBookController::class,'showKapster'])->middleware('auth', 'verified');


//A dmin Book
Route::get('/admin', function () {
    return redirect('/admin/dashboard');
})->middleware(['auth', 'admin']);
Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin/book/add', [AdminBookController::class, 'add'])->middleware(['auth', 'admin']);
Route::get('/admin/book', [AdminBookController::class, 'book'])->middleware(['auth', 'admin']);
Route::get('/admin/book/{id}', [AdminBookController::class, 'detail_book'])->middleware(['auth', 'admin']);
Route::get('/admin/book/add', [AdminBookController::class, 'add_book'])->middleware(['auth', 'admin']);
Route::get('/admin/service', [AdminServiceController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin/hairartist', [AdminKapsterController::class, 'index'])->middleware(['auth', 'admin']);

// Admin Paymet
Route::get('/admin/payment', [AdminBookController::class, 'payment'])->middleware(['auth', 'admin']);
