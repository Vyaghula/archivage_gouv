<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('archives', ArchiveController::class)->middleware('auth');

// Réception Dropzone : Traitement de l'upload
Route::post('/upload', [App\Http\Controllers\ArchiveController::class, 'upload'])->name('archives.upload');
