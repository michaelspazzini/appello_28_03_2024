<?php

use App\Http\Controllers\FilesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home: smista utenti dopo il login
Route::get('/', function () {
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('showLogin');
    }

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'consumer') {
        return redirect()->route('consumer.dashboard');
    }

    abort(403); // ruolo non valido
})->middleware('auth');

// Pagine protette per ruoli specifici
Route::get('/admin', [FilesController::class, 'indexAdmin'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');
Route::get('/consumer', [FilesController::class, 'indexConsumer'])->middleware(['auth', 'role:consumer'])->name('consumer.dashboard');

// Route per login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');

// Route per logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Gestione logica dei file
Route::post('/addFile', [FilesController::class, 'store'])->name('files.add');
Route::delete('/deleteFile', [FilesController::class, 'destroy'])->name('files.delete');
Route::get('/download/{filename}', [FilesController::class, 'download'])->name('files.download');



