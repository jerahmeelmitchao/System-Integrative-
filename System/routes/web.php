<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'checkUserRole'])->name('dashboard');


Route::get('admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'checkUserRole']); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::middleware('auth')->group(function () {
//     Route::get('admin/dashboard', [HomeController::class, 'index'])->
//     middleware((['auth','admin']));
// });


// Web routes file (routes/web.php)
Route::post('logout', [ProfileController::class, 'destroy'])->name('logout');


Route::get('/admin/register', [AdminAuthController::class, 'showAdminRegisterForm'])
    ->name('auth.adminregister');

Route::post('/admin/register', [AdminAuthController::class, 'registerAdmin'])
    ->name('auth.adminregister.submit');



require __DIR__.'/auth.php';
