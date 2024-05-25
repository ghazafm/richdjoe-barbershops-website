<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminKapsterController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPaymentController;
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
Route::get('/profil_kapster/{place}/{service}/{kapster}', [UserBookController::class,'showKapster'])->middleware('auth', 'verified');
Route::get('/book/service/haircut/kapster/schedule/{place}/{service}/{kapster}', [UserBookController::class,'schedule'])->middleware('auth', 'verified');
Route::get('/book/service/haircut/kapster/schedule/confirmation/{place}/{service}/{kapster}/{schedule}', [UserBookController::class,'confirmation'])->middleware('auth', 'verified');


//Admin
Route::get('/admin', function () {
    return redirect('/admin/dashboard');
})->middleware(['auth', 'admin']);
Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin/book/add', [AdminBookController::class, 'book'])->middleware(['auth', 'admin']);
Route::get('/admin/book', [AdminBookController::class, 'book'])->middleware(['auth', 'admin']);
Route::get('/admin/book/{id}', [AdminBookController::class, 'detail_book'])->middleware(['auth', 'admin']);
Route::get('/admin/book/verify/{id}', [AdminBookController::class, 'verify_service'])->middleware(['auth', 'admin']);
Route::get('/admin/book/add', [AdminBookController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('/admin/book/addsave', [AdminBookController::class, 'addsave'])->middleware(['auth', 'admin']);
Route::get('/admin/service', [AdminServiceController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin/hairartist', [AdminKapsterController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin/hairartist/edit/{id}', [AdminKapsterController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('/admin/hairartist/editsave', [AdminKapsterController::class, 'editsave'])->middleware(['auth', 'admin']);
Route::get('/admin/hairartist/delete/{id}', [AdminKapsterController::class, 'delete'])->middleware(['auth', 'admin']);
Route::get('/admin/hairartist/add', [AdminKapsterController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('/admin/hairartist/addsave', [AdminKapsterController::class, 'addsave'])->middleware(['auth', 'admin']);



// Admin Paymet
Route::get('/admin/payment', [AdminPaymentController::class, 'payment'])->middleware(['auth', 'admin']);
Route::get('/admin/payment/{id}', [AdminPaymentController::class, 'detail'])->middleware(['auth', 'admin']);
Route::get('/admin/user', [AdminUserController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin/user/add', [AdminUserController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('/admin/user/addsave', [AdminUserController::class, 'addsave'])->middleware(['auth', 'admin']);
Route::get('/admin/service/add', [AdminServiceController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('/admin/service/addsave', [AdminServiceController::class, 'addsave'])->middleware(['auth', 'admin']);
Route::get('/admin/service/edit/{id}', [AdminServiceController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('/admin/service/editsave', [AdminServiceController::class, 'editsave'])->middleware(['auth', 'admin']);
Route::get('/admin/service/delete/{id}', [AdminServiceController::class, 'delete'])->middleware(['auth', 'admin']);
Route::get('/admin/user/edit/{id}', [AdminUserController::class, 'edit'])->middleware(['auth', 'admin']);
Route::post('/admin/user/editsave', [AdminUserController::class, 'editsave'])->middleware(['auth', 'admin']);
Route::get('/admin/user/delete/{id}', [AdminUserController::class, 'delete'])->middleware(['auth', 'admin']);

