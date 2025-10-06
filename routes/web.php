<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AutoBatController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\ParcelleController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('archives', ArchiveController::class)->middleware('auth');

// Réception Dropzone : Traitement de l'upload
Route::post('/upload', [App\Http\Controllers\ArchiveController::class, 'upload'])->name('archives.upload');

// Routes admin protégées par le middleware 'admin'


Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::put('/admin/user/{user}/role', [AdminController::class, 'updateRole'])->name('admin.updateRole');
});

Route::resource('personnes', PersonneController::class)->middleware('auth');
Route::resource('parcelles', ParcelleController::class)->middleware('auth');
Route::resource('autobats', AutoBatController::class)->middleware('auth');



