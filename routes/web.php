<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [ProfileController::class, 'index'])->name('perfil');
    Route::post('/perfil/update', [ProfileController::class, 'update'])->name('perfil.update');
});

Route::get('/dashboard', function () {
    return redirect('/perfil');
})->name('dashboard');

// Página inicial (ou dashboard)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


